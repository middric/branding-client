<?php

namespace Branding;

class Factory {
    private static $_host;
    private static $_client;

    public static function setHost($host) {
        self::$_host = $host;
    }

    public static function createComponent($component) {
        if (!self::$_client) {
            self::$_client = new Client(self::$_host);
        }

        $rawComponent = self::$_client->get($component);
        return new Component($rawComponent);
    }
}