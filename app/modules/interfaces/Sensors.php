<?php 

namespace App\Modules;

interface Sensors
{
    public function get();
    public function post();
    public function getOnSubmit(String $submitName, $callback);
    public function postOnSubmit(String $submitName, $callback);
}


?>