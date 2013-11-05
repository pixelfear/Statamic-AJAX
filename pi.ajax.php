<?php
class Plugin_ajax extends Plugin {

	var $meta = array(
		'name'       => 'AJAX',
		'version'    => '1.0',
		'author'     => 'Jason Varga',
		'author_url' => 'http://pixelfear.com'
	);

	public function index()
	{
		return (
			!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && 
			strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'
		) ? '1' : '0';
	}

	public function json_encode()
	{
		return json_encode($this->content);
	}

}