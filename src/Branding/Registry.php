<?php

namespace Branding;

class Registry {
    private static $_components = array();

    public static function add($component) {
        self::$_components[] = $component;

        return count(self::$_components) -1;
    }

    public static function remove($index) {
        unset(self::$_components[$index]);
    }

    public static function css() {
        $css = '';
        foreach (self::$_components as $component) {
            $css .= $component->css();
        }

        return $css;
    }
}