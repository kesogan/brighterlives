<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Activitylog;

class ActivitylogController extends Controller
{
    /**
     * Displays datatables front end view.
     *
     * @return \Illuminate\View\View
     */
    public function getIndex()
    {
        return view('admin.activitylog.index');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData(Request $request)
    {
        if(auth()->user()->hasRole('admin') ){
                $activity_log = Activitylog::orderBy('created_at', 'ASC');
        }else{

            $activity_log = Activitylog::where('model_id', auth()->user()->id)->orderBy('created_at', 'ASC');
        }

        $datatables = app('datatables')->of($activity_log)->editColumn('log_message', function ($activity_log) {
            return $activity_log->log_message;
        })->editColumn('model_id', function ($activity_log) {
            return $activity_log->association->association_name;
        })->rawColumns(['action', 'log_message','model_id']);

        return $datatables->make(true);
    }

}
