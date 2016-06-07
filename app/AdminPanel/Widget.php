<?php

namespace app\AdminPanel;

use ReflectionFunction;
use Pex;

class Widget {

    private $name;
    private $accept;
    private $view;

    public function __construct($name, $accept = null, $view = null) {
        $this->name = $name;
        $this->accept = $accept ?? true;
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

    public function getDisplayName() {
        return $this->getName();
    }
}