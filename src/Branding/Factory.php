<?php

namespace Branding;

class Factory {
    private static $_host;
    private static $_client;
    private static $_theme;

    public static function setHost($host) {
        self::$_host = $host;
    }

    public static function setTheme($theme) {
        self::$_theme = $theme;
    }

    public static function createComponent($component, $config) {
        if (!self::$_client) {
            self::$_client = new Client(self::$_host, self::$_theme);
        }

        $component = new Component(self::$_client->get($component, $config));

        Registry::add($component);
        return $component;
    }
}