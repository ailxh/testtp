<?php
namespace app\admin\model;
use think\Model;

class Admin extends Model
{
    public function UserList(){
        return $this->paginate(3);
    }
}
