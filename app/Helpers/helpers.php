<?php

use Illuminate\Support\Facades\DB;

if (! function_exists('unreadMessageCount')) {
    function unreadMessageCount()
    {
        $unreadMessageCount=DB::table('ch_messages')->where('to_id',auth()->user()->id)->where('seen',false)->count();
        
        return $unreadMessageCount;
    }
}