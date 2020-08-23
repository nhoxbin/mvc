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

	public function load($page, $data=[]) {
		extract($data);

        // load page first
        ob_start();
	    require_once $this->handle_file($page);
	    $page = ob_get_contents();
        ob_end_clean();

        // get the master layout
        preg_match("/@extends\((.+)\)/", $page, $layout);
        $layout = $layout[1] ? trim($layout[1], '\'"') : '';

        // after load page, load master layout. read and put page into masterlayout
    	ob_start(function($buffer) use ($page) {
    		preg_match_all('/@yield\((.+)\)/', $buffer, $type);
    		for ($i = 0; $i < count($type[1]); $i++) {
	    		preg_match("/@section\({$type[1][$i]}\)(.+?)@endsection/s", $page, $section);
	    		$buffer = str_replace($type[0][$i], $section[1], $buffer);
    		}
			return $buffer;
		});
	    require_once $this->handle_file($layout);
	    // $master_layouts = ob_get_contents();
        ob_end_flush();
	}
}