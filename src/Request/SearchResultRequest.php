<?php

// 
namespace Miechuliv\Veloconnect\Request;

// 
use Miechuliv\Veloconnect;

/**
 * Class SearchResultRequest
 * 
 */
class SearchResultRequest implements  RequestInterface
{
    /**
     * request
     * 
     * @param type $baseUrl
     * @param type $user_id
     * @param type $pass
     * @param type $params
     * @return \Miechuliv\Veloconnect\Response\SearchResultResponse
     */
    public function request($baseUrl,$user_id,$pass,$params = array())
    {
        // 
        $request = new Request();
        // 
        $response = new Veloconnect\Response\SearchResultResponse();
        // 
        $fullUrl = $baseUrl;
        // 
        $post = "BuyersID=" . $user_id . "&Password=" . $pass 
            . "&RequestName=SearchResultRequest&TransactionID=" . $params['TransactionID'] 
            . "&StartIndex=" . $params['StartIndex'] . "&Count=" . $params['Count'] 
            . "&ResultFormat=ITEM_DETAIL";
        // 
        $response->receive($request->execute($fullUrl,$post));
        // 
        $response->validateResponseCode($response,$request);
        // 
        return $response;
    }

} 