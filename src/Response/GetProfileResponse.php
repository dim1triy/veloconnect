<?php

// 
namespace Miechuliv\Veloconnect\Response;

/**
 * Class GetProfileResponse
 * 
 */
class GetProfileResponse extends AbstractResponse
{

    /*
     * 
     */
    public $implementedOperations = array();
    
    /*
     * 
     */
    public $implementedTransactions = array();

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
        $implements = $xml->getElementsByTagNameNS('*','Implements');
        // 
        if($implements->length)
        {
            // 
            foreach($implements as $implement)
            {
                // 
                $obj = $implement->getElementsByTagNameNS('*','Operation');
                // 
                $operation = is_object($obj->item(0)) ? $obj->item(0)->nodeValue : false;
                
                // 
                $obj = $implement->getElementsByTagNameNS('*','Transaction');
                // 
                $transaction = is_object($obj->item(0)) ? $obj->item(0)->nodeValue : false;

                // 
                $obj = $implement->getElementsByTagNameNS('*','Binding');
                // 
                $binding = is_object($obj->item(0)) ? $obj->item(0)->nodeValue : false;

                // 
                if ($operation && $binding)
                {
                    // 
                    $this->implementedOperations[] = array(
                        'operation' => $operation,
                        'binding' => $binding,
                    );
                }
                // 
                elseif ($transaction && $binding)
                {
                    // 
                    $this->implementedTransactions[] = array(
                        'transaction' => $transaction,
                        'binding' => $binding,
                    );
                }
            }
        }

    }

} 