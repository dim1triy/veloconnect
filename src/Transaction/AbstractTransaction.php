<?php

// 
namespace Miechuliv\Veloconnect\Transaction;

/**
 * Abstract class AbstractTransaction
 * 
 */
abstract class AbstractTransaction 
{
    /*
     * 
     */
    public $currentStep;
    
    /*
     * 
     */
    public $TransactionID;

    /**
     * execute
     * 
     */
    abstract public function execute($baseUrl,$user_id,$pass,$params);
} 