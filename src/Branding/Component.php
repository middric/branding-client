<?php

namespace Branding;

class Component {
    private $_template;
    private $_styles;

    private $_html;

    public function __construct($component) {
        $this->_template = $component['template'];
        $this->_styles = $component['styles'];
    }

    public function css() {
        return $this->_styles;
    }

    public function html($arguments = array()) {
        if (!$this->_html) {
            $m = new Mustache_Engine;
            $this->_html = $m->render($this->_template, $arguments);
        }

        return $this->_html;
    }
}