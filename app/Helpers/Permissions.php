<?php


namespace app\Helpers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Permissions
{
    static public function hasPermission($project_id)
    {
        $uid = Auth::user()->id;
        if(DB::table('project_user')->where('user_id', $uid)->where('project_id', $project_id)->first())
        {
            return true;
        }
        else
        {
            return false;
        }

    }
}