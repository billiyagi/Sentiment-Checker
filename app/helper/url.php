<?php

function redirect($path)
{
	return header("Location: " . $path);
}

function pathTo($path)
{
	return ($path == '/') ? 'index.php' : 'index.php?page=' . $path;
}
