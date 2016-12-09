<?php

// 
namespace Miechuliv\Veloconnect\Transaction;

// 
use Miechuliv\Veloconnect;

/**
 * Class TextSearchTransaction
 * 
 */
class TextSearchTransaction extends AbstractTransaction
{

    /**
     * execute
     * 
     * @param type $baseUrl
     * @param type $user_id
     * @param type $pass
     * @param type $params
     * @return type
     */
    public function execute($baseUrl,$user_id,$pass,$params = array())
    {
        // 
        $this->currentStep = 1;
        // 
        $req = new Veloconnect\Request\CreateTextSearchRequest();
        // 
        $response = $req->request($baseUrl,$user_id,$pass);
        // 
        $this->currentStep = 2;
        // 
        $this->TransactionID = $response->TransactionID;
        // 
        $req = new Veloconnect\Request\SearchResultRequest();
        // 
        $response = $req->request(
            $baseUrl,
            $user_id,
            $pass,
            array(
                'transaction_id' => $this->TransactionID,
                'count' => isset($params['count']) ? $params['count'] : $response->TotalCount
            )
        );
        // 
        return $response;
    }
} 