<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Routers;
use Illuminate\Http\Request;
use ErrorException;

/**
 * Description of ConditionalRouteRedirect
 *
 * @author jaredclemence
 */
abstract class ConditionalRouteRedirect {
    /* @var Request */
    protected $request;
    
    public function test(){
        $this->assertRequest();
        return $this->shouldRedirect();
    }
    public function redirect(){
        return $this->getRedirectRoute();
    }

    public function read($request) {
        $this->request = $request;
    }

    private function assertRequest() {
        if( $this->request == null ){
            throw new ErrorException("Please read the request before using a ConditionalRouteRedirect.");
        }
    }
    
    /**
     * @return Request
     */
    protected function getRequest(){
        return $this->request;
    }

    /**
     * @return bool
     */
    abstract protected function shouldRedirect();
    /**
     * @return Redirect
     */
    abstract protected function getRedirectRoute();
}
