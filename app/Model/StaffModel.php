<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Staff extends Model
{
    public function GetStaffById($id)
    {
        $staff = DB::table('staff')->where('id', $id)->first();
        return $staff;
    }
    public function GetStaffByWechatid($wechatid)
    {
        $staff = DB::table('staff')->where('wechatid', $wechatid)->first();
        return $staff;
    }
    public function GetStaffByOpenId($openid)
    {
        $staff = DB::table('staff')->where('openid', $openid)->first();
        return $staff;
    }
    public function AddNewStaff($staffInfo)
    {
        DB::table('staff')->insert([$staffInfo]);
    }
}
