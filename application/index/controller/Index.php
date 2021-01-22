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
    	//获取职位列表
    	$where['deadline'] = ['egt',time()];
    	$where['headhunting'] = '1';
    	$list = Db::table('hr_jobs')->where($where)->select();
    	//前端需两列显示
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
    	$this->assign('job_list1',$arr1);
    	$this->assign('job_list2',$arr2);

    	//获取简历列表
    	$where_resume['headhunting'] = '1';
    	$list_resume = Db::table('hr_resume')->where($where_resume)->select();
    	//前端需两列显示
    	$arr_resume1 = array();
    	$arr_resume2 = array();
    	foreach ($list_resume as $key => $value) {
    		$key_r = is_numeric($key)&($key&1);
    		if ($key_r == 0) {
    			$arr_resume1[] = $value;
    		}else{
    			$arr_resume2[] = $value;
    		}
    	}
    	// var_dump($list);die;
    	$this->assign('resume_list1',$arr_resume1);
    	$this->assign('resume_list2',$arr_resume2);

    	return view('Index/Oficiona');
    }

    public function Oficiona()
    {
    	return view('Index/Oficiona');
    }
}
