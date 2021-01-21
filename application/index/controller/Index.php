<?php
namespace app\index\controller;
use think\Db;
use think\Controller;
use think\Config;
use think\Cookie;
use think\Common;
class Index extends Controller
{
    public function index()
    {
    	$where['deadline'] = ['egt',time()];
    	$where['headhunting'] = '1';
    	$list = Db::table('hr_jobs')->where($where)->select();
    	$arr1 = array();
    	$arr2 = array();
    	foreach ($list as $key => $value) {
    		$key_r = is_numeric($key)&($key&1);
    		if ($key_r == 0) {
    			$arr1[] = $value;
    		}else{
    			$arr2[] = $value;
    		}
    	}
    	// var_dump($list);die;
    	$this->assign('list1',$arr1);
    	$this->assign('list2',$arr2);
    	return view('Index/Oficiona');
    }

    public function Oficiona()
    {
    	return view('Index/Oficiona');
    }
}
