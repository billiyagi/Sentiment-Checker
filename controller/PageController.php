<?php

namespace Controller;

class PageController extends Controller
{
	public function notFound()
	{
		return $this->view("errors/404");
	}
	public function index()
	{
		return $this->view("pages/home");
	}

	public function about()
	{
		$hello = [
			'hello' => 'world',
			'foo' => 'bar',
			'another' => 'value'
		];
		return $this->view("pages/about", $hello);
	}
}
