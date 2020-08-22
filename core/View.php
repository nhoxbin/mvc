<?php

namespace Core;

class View
{
	private $layout = 'layouts.app';

    public function handle_file($file='') {
		$file = base_dir('views') . '/' . str_replace('.', '/', $file) . '.php';
		if (!file_exists($file)) {
			return '';
		}
		return $file;
	}

	public function load($page, $data=[], $layout='layouts.app') {
		$this->layout = $layout;
		extract($data);

        // load page first
        ob_start();
	    require_once $this->handle_file($page);
	    $page = ob_get_contents();
        ob_end_clean();

        // after load page, load master layout and read what page have
    	ob_start(function($buffer) use ($page) {
    		preg_match_all('/\@yield\(\'(.+)\'\)/', $buffer, $type);
    		for ($i = 0; $i < count($type[1]); $i++) {
	    		preg_match("/\@section\(\'{$type[1][$i]}\'\)(.+?)\@endsection/s", $page, $section);
	    		$buffer = str_replace($type[0][$i], $section[1], $buffer);
    		}
			return $buffer;
		});
	    require_once $this->handle_file($this->layout);
	    // $master_layouts = ob_get_contents();
        ob_end_flush();
	}
}