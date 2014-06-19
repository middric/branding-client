<?php

namespace Branding;


class Component {
    private $_markup;
    private $_styles;

    public function __construct($component) {
        $this->_markup = $component['markup'];
        $this->_styles = $component['styles'];
    }

    public function css() {
        return $this->_styles;
    }

    public function html($arguments = array()) {
        return $this->_markup;
    }
}