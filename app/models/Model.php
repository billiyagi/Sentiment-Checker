<?php

namespace App\Models;

interface ModelInterface
{
	public function get($id);
	public function getAll();
}


use App\Modules\PDOModule;

class Model implements ModelInterface
{
	protected $pdoModule, $table, $primaryKey;


	public function __construct()
	{
		// Get PDO Connection from PDO Module
		$this->pdoModule = new PDOModule($_ENV['DB_HOST'], $_ENV['DB_NAME'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
	}

	/** 
	 * Get data by id
	 */
	public function get($id)
	{
		$results = $this->pdoModule->selectQuery([
			'table'	=>	$this->table,
			'column'	=>	['*'],
			'where'	=>	$this->primaryKey . "=$id"
		]);

		$results->execute();

		return $results->fetch(\PDO::FETCH_BOTH);
	}

	/** 
	 * Get all data
	 */
	public function getAll()
	{
		$results = $this->pdoModule->selectQuery([
			'table'	=>	$this->table,
			'column'	=>	['*'],
		], false);
		$results->execute();

		return $results->fetchAll(\PDO::FETCH_OBJ);
	}
}
