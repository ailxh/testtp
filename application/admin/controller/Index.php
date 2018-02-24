<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;

class Index extends Controller
{
    public function index()
    {
        return $this->fetch();
    }
    public function addUser()
    {
        if(request()->isPost()){
            $data = $_POST;
            $user['username'] = addslashes(trim($data['username']));
            $user['password'] = md5(addslashes(trim($data['password'])));
            $userId = Db::name('admin')->insertGetId($user);
            if($userId > 0){
                return $this->success('添加成功！','/admin/index/userList','',2);
            }else{
                return $this->error('添加失败！','/admin/index/addUser','',2);
            }
        }
        return $this->fetch();
    }
    public function userList()
    {
        return $this->fetch();
    }
    public function edit()
    {
        return $this->fetch();
    }

    public function login()
    {
        return $this->fetch();
    }
}
