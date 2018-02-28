<?php
namespace app\admin\controller;
use app\admin\model\Admin as AdminModel;
use think\Controller;
use think\Db;
use think\Validate;

class Index extends Controller
{
    public function index()
    {
        return $this->fetch();
    }
    public function addUser()
    {
        if(request()->isPost()){
            $data = input('post.');
            $validate = \think\loader::validate('Admin');
            $user['username'] = addslashes(trim($data['username']));
            $user['password'] = md5(addslashes(trim($data['password'])));
            if($validate->scene('add')->check($user)){
                $userId = db('admin')->insertGetId($user);
                if($userId > 0){
                    return $this->success('添加成功！','/admin/index/userList','',2);
                }else{
                    return $this->error('添加失败！','/admin/index/addUser','',2);
                }
            }else{
                return $this->error($validate->getError(),'/admin/index/addUser','',2);
            }

        }
        return $this->fetch();
    }
    public function userList()
    {
        $aa = new AdminModel();
        $list = $aa->UserList();
        $this->assign('list',$list);
        return $this->fetch();
    }
    public function editUser()
    {
        if(request()->isPost()){
            $data = input('post.');
            $user['username'] = $data['username'];
            $str = db('admin')->where('id = '.$data['userId'])->update($user);
            if($str){
                return $this->success('修改成功！','/admin/index/userList','',2);
            }else{
                return $this->error('修改失败！','/admin/index/userList','',2);
            }
        }else{
            $userId = input('get.id');
            $data = db('admin')->where('id = '.$userId)->find();
            $this->assign('data',$data);
        }

        return $this->fetch();
    }
    public function login()
    {
        return $this->fetch();
    }
}
