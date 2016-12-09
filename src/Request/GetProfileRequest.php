<?php

// 
namespace Miechuliv\Veloconnect\Request;

// 
use Miechuliv\Veloconnect;

/**
 * Class GetProfileRequest
 * 
 */
class GetProfileRequest implements RequestInterface
{
    /**
     * request
     * 
     * @param type $baseUrl
     * @param type $user_id
     * @param type $pass
     * @param type $params
     * @return \Miechuliv\Veloconnect\Response\GetProfileResponse
     */
    public function request($baseUrl,$user_id,$pass,$params = array())
    {
        // 
        $request = new Request();
        // 
        $response = new Veloconnect\Response\GetProfileResponse();
        // 
        $fullUrl = $baseUrl . '?BuyersID=' . $user_id . '&Password=' . $pass . '&RequestName=GetProfileRequest';
        // 
        $response->receive($request->execute($fullUrl));
        // 
        $response->validateResponseCode($response,$request);
        // 
        return $response;
    }
    
} 