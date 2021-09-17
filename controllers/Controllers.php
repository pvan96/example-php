<?php

require_once 'models/Model.php';

class Controllers extends Model
{
    public $vars = array();
    public $content = null;
    public $layout = null;
    public $viewDir = 'views/';
    public $extension = '.blade.php';

    public function view($file, $compact = [])
    {
        $templateView = $this->viewDir . $file . $this->extension;
        if (!file_exists($templateView)) {
            die(sprintf('The template file %s can not found!', $templateView));
        }

        if (!empty($compact)) {
            extract($compact);
        }
        ob_start();
        include $templateView;
        $this->content = ob_get_clean();

        ob_start();
        include $templateView;
        ob_get_clean();
        $this->render();
    }

    public function content()
    {
        echo $this->content;
    }

    public function layout($file)
    {
        $templateView = $this->viewDir . $file . $this->extension;
        if (!file_exists($templateView)) {
            die(sprintf('The template file %s can not found!', $templateView));
        }
        extract($this->vars);
        ob_start();
        include $templateView;
        $this->layout = ob_get_clean();
    }

    public function set($key, $value)
    {
        $this->vars[$key] = $value;
    }

    public function get($key)
    {
        if (isset($this->vars[$key])) {
            return $this->vars[$key];
        }
    }

    public function render()
    {
        echo $this->layout;
    }
}