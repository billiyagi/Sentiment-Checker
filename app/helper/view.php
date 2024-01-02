<?php
/*
|--------------------------------------------------------------------------
| Helper View
|--------------------------------------------------------------------------
|
| Kumpulan function untuk memudahkan dalam mengatur view
|
*/

/** 
 * Include partial html
 */
function includeHtml($path)
{
	require_once(__DIR__ . "/../../views/" . $path . ".php");
}
