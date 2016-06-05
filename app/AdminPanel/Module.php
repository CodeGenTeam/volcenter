<?php

namespace app\AdminPanel;


class Module {

    private $name;
    private $accept;
    private $view;

    public function __construct($name, $accept, $view) {
        $this->name = $name;
        $this->accept = $accept;
        $this->view = $view;
    }

    public function getName() {
        return $this->name;
    }

    public function can() {
        return is_callable($this->accept) ? (new ReflectionFunction($this->accept))->invoke() : (is_string($this->accept) ? Pex::can($this->accept) : $this->accept);
    }

    public function getView() {
        return is_callable($this->view) ? (new ReflectionFunction($this->view))->invoke() : (is_string($this->view) ? view($this->view) : $this->view);
    }
}