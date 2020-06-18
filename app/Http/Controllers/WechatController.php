<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Staff;
class WechatController extends Controller
{

    public function Login(Request $request)
    {
       
        if( $request->has('code') && $request->filled('code'))
        {
            $code = $request->code;
            $appid = config('wechat.appid');
            //配置appscret
            $secret = config('wechat.secret');
            //api接口
            $api = "https://api.weixin.qq.com/sns/jscode2session?appid={$appid}&secret={$secret}&js_code={$code}&grant_type=authorization_code";
            //获取GET请求
            $str = httpGet($api);
            echo($str);
            $str_object = json_decode($str,true);
            if(isset($str_object['errcode']))
            {
                echo($str_object['errcode']);
            }
            else 
            {
                $staffModel = new Staff;
                $staff = $staffModel->GetStaffByOpenId($str_object['openid']);
                if(empty($staff))
                {
                    echo("new staff or user");
                    $staffInfo = ['openid'=>$str_object['openid']];
                    $staffModel->AddNewStaff($staffInfo);   
                }            
            }
            return $str;
        }
       
    }
}