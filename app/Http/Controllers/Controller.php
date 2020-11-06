<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Http\Controllers\Service\ReferrerService;
use App\Events\ReferralLinkLoadedEvent;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    //Note: named endpoints will override path endpoints
    // 
    //static protected $referralEndpointName = 'landing';
    //static protected $referralEndpointPath = '/';
    
    public function redirectReferredUser(Request $request, ReferrerService $service, $username){
        $service->rememberReferrer($username);
        ReferralLinkLoadedEvent::dispatch($username);
        return $this->redirectRoute( $request );
    }

    /**
     * The $request is not used in this implementation, but this system is designed 
     * to be a base from which to alter the system. Depending upon the request, 
     * the user may wish to base the redirect on data contained within the request.
     * 
     * @param Request $request
     * @return redirect()
     */
    private function redirectRoute(Request $request) {
        //default to homescreen
        $endpoint = redirect('/');
        
        if( isset( self::$referralEndpointName ) && self::$referralEndpointName != null ){
            //if a named route is provided in the controller variable, then route to the named route.
            $endpoint = redirect()->route(self::$referralEndpointName);
        }else if(isset( self::$referralEndpointPath ) && self::$referralEndpointPath != null){
            //if a named route is not provided but a static route is, then route to that endpoint.
            $endpoint = redirect(self::$referralEndpointPath);
        }
        return $endpoint;
    }

}
