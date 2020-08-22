<?php

namespace Core;

class View
{
	private $__content;

    public function handle_file($file='') {
		$file = base_dir('views') . '/' . str_replace('.', '/', $file) . '.php';
		if (!file_exists($file)) {
			show404error('View'.$file);
		}
		return $file;
	}

	function section($title, $s) {
		$section[$title] = $s;
	}

	public function show() {
        foreach ($this->__content as $html){
            echo $html;
        }
    }

    public function pageLoad($page) {
    	ob_start();
	    require_once $this->handle_file($page);
	    $content = ob_get_contents();
        ob_end_clean();

        // Gán nội dung vào danh sách view đã load
        $this->__content[] = $content;

    }

	public function load($page, $data=[], $layout='layouts.app') {
		extract($data);
		
		ob_start();
	    require_once $this->handle_file($page);
	    $content = ob_get_contents();
        ob_end_clean();
         
        // Gán nội dung vào danh sách view đã load
        $this->__content[] = $content;

        ob_start();
	    require_once $this->handle_file($page);
	    $content = ob_get_contents();
        ob_end_clean();

        // Gán nội dung vào danh sách view đã load
        $this->__content[] = $content;
        
        $this->show();
	}
}