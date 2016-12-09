<?php

// 
namespace Miechuliv\Veloconnect\Request;

/**
 * interface RequestInterface
 * 
 */
interface RequestInterface
{
    /**
     * request
     * 
     * @param type $baseUrl
     * @param type $user_id
     * @param type $pass
     * @param type $params
     */
    function request($baseUrl,$user_id,$pass,$params);
}