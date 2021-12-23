<?php

namespace App\Helpers;

use App\Activitylog;

class ActivityLogHelper
{

    public static function log($user, $action, $model_id = null, $message)
    {
        return Activitylog::create([
            'logger' => $user,
            'model_id' => $model_id,
            'log_action' => $action,
            'log_message' => $message,
        ]);
    }
}
