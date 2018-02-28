<?php
namespace app\admin\validate;
use think\Validate;

class Admin extends Validate
{
    protected $rule=[
        'username'=>'require|max:25',
        'password'=>'require',
    ];

    protected $message = [
        'password.require' =>'1不能为空',
        'username.require' =>'2不能为空',
        'username.max' =>'username不能小于25',
    ];

    protected $scene = [
        'add' => ['username','password'],
    ];
}
