<?php

namespace Branding;

use \Guzzle\Http\Client as Guzzle;

class Client {
    private $_host;
    private $_theme;

    public function __construct($host, $theme = null) {
        $this->_host = $host;
        $this->_theme = $theme;
    }

    public function get($component, $config) {
        if ($this->_theme) {
            $config['theme'] = $this->_theme;
        }
        $guzzle = new Guzzle($this->_host);
        $request = $guzzle->post(
            '/component/' . $component,
            array('content-type' => 'application/json'),
            json_encode($config)
        );
        $response = $request->send()->json();

        return $response;
    }
}