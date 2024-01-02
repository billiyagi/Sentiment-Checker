<?php

namespace App\Modules;

class PDOModule
{
	public $dbh;

	/** 
	 * Membuat koneksi ke database
	 */
	public function __construct($dbHost, $dbName, $dbUsername, $dbPassword)
	{
		// Koneksi ke database
		try {
			$dbh = new \PDO('mysql:host=' . $dbHost . ';dbname=' . $dbName, $dbUsername, $dbPassword);
			$dbh->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
			$this->dbh = $dbh;
		} catch (\PDOException $e) {
			echo 'Database Connection Failed: ' . $e->getMessage();
		}
	}

	/** 
	 * Get PDO Connection
	 * @return PDOStatement
	 */
	public function getConnection()
	{
		return $this->dbh;
	}

	/** 
	 * Insert data database
	 * @return PDOStatement
	 * @param array $querys
	 * @example $querys = [$tableName, $whereCondition = 'id=?', $column = ['id', 'name']]
	 */
	public function insertQuery($querys)
	{
		$columns = count($querys['column']);

		// Build column values from array column index
		$values = '';
		for ($i = 0; $i < $columns; $i++) {
			if ($i == 0) {
				$values .= '?';
			} else {
				$values .= ',?';
			}
		}

		// Build Query
		return $this->dbh->prepare("INSERT INTO " . $querys['table'] . " (" . implode(',', $querys['column']) . ") VALUES (" . $values . ")");
	}

	/** 
	 * Mengupdate data database
	 * @return PDOStatement
	 * @param array $querys
	 * @example $querys = [$tableName, $whereCondition = 'id=?', $column = ['id', 'name']]
	 */
	public function updateQuery($querys)
	{
		$columns = count($querys['column']);

		// Build column from array column index
		$values = '';
		for ($i = 0; $i < $columns; $i++) {
			if ($i == 0) {
				$values .= $querys['column'][$i] . '=?';
			} else {
				$values .= ',' . $querys['column'][$i] . '=?';
			}
		}

		// Build Query
		return $this->dbh->prepare("UPDATE " . $querys['table'] . " SET " . $values . " WHERE " . $querys['where']);
	}

	/** 
	 * Menghapus data database
	 * @return PDOStatement
	 * @param array $querys
	 * @example $querys = [$tableName, $whereCondition = 'id=?']
	 */
	public function deleteQuery($querys)
	{
		return $this->dbh->prepare("DELETE FROM " . $querys['table'] . " WHERE " . $querys['where']);
	}


	/** 
	 * Mengambil data database
	 * @return PDOStatement
	 * @param array $querys
	 * @param bool $whereCondition
	 * @example $querys = [$tableName, $whereCondition = 'id=?', $column = ['id', 'name']]
	 */
	public function selectQuery($querys, $whereCondition = true)
	{
		if ($whereCondition) {
			return $this->dbh->prepare("SELECT " . implode(',', $querys['column']) . " FROM " . $querys['table'] . " WHERE " . $querys['where']);
		}
		return $this->dbh->prepare("SELECT * FROM " . $querys['table']);
	}
}
