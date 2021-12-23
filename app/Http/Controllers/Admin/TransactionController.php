<?php

namespace App\Http\Controllers\Admin;

use App\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    /**
     * Displays datatables front end view.
     *
     * @return \Illuminate\View\View
     */
    public function getIndex()
    {
        return view('admin.transactions.index');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData(Request $request)
    {
        if(auth()->user()->hasRole('admin') ){
                $transaction_log= Transaction::orderBy('created_at', 'ASC');
        }else{

            $transaction_log= Transaction::where('association_id', auth()->user()->association->id)->orderBy('created_at', 'ASC');
        }

        $datatables = app('datatables')->of($transaction_log)->editColumn('log_message', function ($transaction_log) {
            return $transaction_log->log_message;
        })->editColumn('association_id', function ($transaction_log) {
            return $transaction_log->association->association_name;
        })->editColumn('transaction_type', function ($transaction_log) {
             if($transaction_log->transaction_type == 'donation'){
                return '<span class="badge badge-info">'.$transaction_log->transaction_type.'</span>';
             }else{
                return '<span class="badge badge-dark">'.$transaction_log->transaction_type.'</span>';
             }
        })->rawColumns(['transaction_type','log_message','association_id']);

        return $datatables->make(true);
    }
}
