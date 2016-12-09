<?php

// 
namespace Miechuliv\Veloconnect\Request;

// 
use Miechuliv\Veloconnect;

/**
 * Class GetClassificationSchemeRequest
 * 
 */
class GetClassificationSchemeRequest implements RequestInterface
{
    
    /**
     * request
     * 
     * @param type $baseUrl
     * @param type $user_id
     * @param type $pass
     * @param type $params
     * @return \Miechuliv\Veloconnect\Response\GetClassificationSchemeResponse
     */
    public function request($baseUrl,$user_id,$pass,$params = array())
    {
        // 
        $request = new Request();
        // 
        $response = new Veloconnect\Response\GetClassificationSchemeResponse();
        // 
        $fullUrl = $baseUrl;
        // 
        $post = "BuyersID=".$user_id."&Password=".$pass."&RequestName=GetClassificationSchemeRequest";
        // 
        $response->receive($request->execute($fullUrl,$post));
        // 
        $response->validateResponseCode($response,$request);
        // 
        return $response;
    }

} 