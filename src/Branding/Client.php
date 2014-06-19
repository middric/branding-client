<?php

namespace Branding;

use \Guzzle\Http\Client as Guzzle;

class Client {
    private $_host;

    public function __construct($host) {
        $this->_host = $host;
    }

    public function get($component) {
        $guzzle = new Guzzle($this->_host);
        $request = $guzzle->get('/component/' . $component);
        $response = $request->send()->json();

        return $response;
    }
}