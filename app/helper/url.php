<?php

/** 
 * Mengalihkan path ke halaman tertentu
 */
function redirect($path)
{
	return header("Location: " . $path);
}

/** 
 * Membuat sebuah format path ke halaman tertentu
 */
function pathTo($path)
{
	return ($path == '/') ? 'index.php' : 'index.php?page=' . $path;
}
