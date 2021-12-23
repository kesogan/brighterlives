<?php

namespace App\Helpers;

use App\Association;
use App\Transaction;
use App\Helpers\Helper;

class TransactionLogger
{

    public static function log($user, $transaction_type, Association $association,$model_id = null,$transaction_amount,  $message)
    {
        $helper = new Helper();
        
        return Transaction::create([
            'transaction_code' => strtoupper(str_random(5)).''.$helper->randomDigits(10),
            'transaction_logger' => $user,
            'transaction_type' => $transaction_type,
            'association_id' => $association->id,
            'model_id' => $model_id,
            'transaction_amount' => $transaction_amount,
            'log_message' => $message,
        ]);
    }
}
