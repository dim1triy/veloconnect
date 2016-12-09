<?php

// 
namespace Miechuliv\Veloconnect\Response;

/**
 * Class CreateTextSearchResponse
 * 
 */
class CreateTextSearchResponse extends AbstractResponse
{
    /*
     * 
     */
    public $TotalCount;
    
    /*
     * 
     */
    public $TransactionID;

    /**
     * receive
     * 
     * @param type $data
     */
    public function receive($data)
    {
        // 
        $this->data = $data;
        // 
        $xml = new \DOMDocument();
        // 
        @$xml->loadXML($data);
        // 
        $this->extractBasicData($xml);
        // 
        $obj = $xml->getElementsByTagNameNS('*','TotalCount');
        // 
        $this->TotalCount = is_object($obj->item(0)) ? $obj->item(0)->nodeValue : false;
        // 
        $obj = $xml->getElementsByTagNameNS('*','TransactionID');
        // 
        $this->TransactionID = is_object($obj->item(0)) ? $obj->item(0)->nodeValue : false;
    }

} 