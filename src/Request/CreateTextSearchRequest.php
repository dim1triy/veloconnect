<?php

// 
namespace Miechuliv\Veloconnect\Request;

// 
use Miechuliv\Veloconnect;

/**
 * Class CreateTextSearchRequest
 */
class CreateTextSearchRequest implements RequestInterface
{
    
    /**
     * request
     * 
     * @param type $baseUrl
     * @param type $user_id
     * @param type $pass
     * @param type $params
     * @return \Miechuliv\Veloconnect\Response\CreateTextSearchResponse
     */
    public function request($baseUrl, $user_id, $pass, $params = array())
    {
        // 
        $request = new Request();
        // 
        $response = new Veloconnect\Response\CreateTextSearchResponse();
        // 
        $fullUrl = $baseUrl;
        // 
        $post = "BuyersID=" . $user_id . "&Password=" . $pass 
            . "&SearchString=" . $params['SearchString'] 
            . "&RequestName=CreateTextSearchRequest";
        // 
        $response->receive($request->execute($fullUrl,$post));
        // 
        $response->validateResponseCode($response,$request);
        // 
        return $response;
    }
} 