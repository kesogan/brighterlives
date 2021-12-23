<?php

Route::get('activitylog', 'Escarter\activitylog\ActivitylogController@getIndex');
Route::get('datatables/data', 'Escarter\activitylog\ActivitylogController@anyData')->name('datatables.activitylog');

Route::post('activitylog','Escarter\activitylog\ActivitylogController@log');