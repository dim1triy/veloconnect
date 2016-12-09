<?php

//
namespace Miechuliv\Veloconnect\Response;

// 
use Miechuliv\Veloconnect;

/**
 * Class GetClassificationSchemeResponse
 * 
 */
class GetClassificationSchemeResponse extends AbstractResponse
{
    /*
     * 
     */
    public $groups = array();

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
        $groups = $xml->getElementsByTagNameNS('*','ClassificationSchemeGroup');
        // 
        if ($groups->length)
        {
            // 
            foreach($groups as $group)
            {
                // 
                $groupObj = new Veloconnect\ComplexTypes\ClassificationSchemeGroup();
                // 
                $this->groups[] = $groupObj;
                
                // 
                $obj = $group->getElementsByTagNameNS('*','ID');
                // 
                $groupObj->ID = is_object($obj->item(0)) ? $obj->item(0)->nodeValue : false;
                
                // 
                $obj = $group->getElementsByTagNameNS('*','ParentID');
                // 
                $groupObj->ParentID = is_object($obj->item(0)) ? $obj->item(0)->nodeValue : false;
                
                // 
                $obj = $group->getElementsByTagNameNS('*','Description');
                // 
                $groupObj->Description = is_object($obj->item(0)) ? $obj->item(0)->nodeValue : false;
            }
        }

    }

} 