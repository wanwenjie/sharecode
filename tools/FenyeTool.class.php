<?php
// defined('ACC')||exit("sorry!you dont have permission access this page!");


/*
	数据总条数    $total
	每页显示条数  $perpage   默认为30条
	总页数        $cnt=ceil($total/$perpage);
	当前页数      $page  之前有 $page-1 页，显示从 ($page-1)*$perage+1 到 $page*$perpage 数据
*/

class FenyeModel{
	protected $total=0;
	protected $perpage = 30;
	protected $page = 2;

	//初始化页面数据
	public function __construct($t,$per,$page){
		$this->total = $t;
		$this->perpage = $per;
		$this->page = $page;
	}
	//初始化分页导航代码
	public function show(){
		$cnt = ceil($this->total/$this->perpage);
		//获得当前页面的URL，超全局变量
		$url = $_SERVER['REQUEST_URI'];
		//对URL进行解析
		$parse = parse_url($url);
		//如果存在 ?page=3
		$param = array();
		if(isset($parse['query'])){
			parse_str($parse['query'],$param);
			unset($param['page']);
			//拼接URL query参数
			if(!empty($param)){
				$query = http_build_query($param);
				//目的是向拼接一个URL自带query的  
				$url = $parse['path'].'?'.$query.'&page=';
			}else{
				$url = $parse['path'].'?page=';
			}	
		}else{
			$url = $parse['path'].'?page=';
		}
	
		//当前页面page
		$nav = array();
		$total = '<span>总共&nbsp;'.$cnt.'&nbsp;页</span>&nbsp;&nbsp;';
		$nav[0] = '&nbsp;&nbsp;<span><a href="'.$url.$this->page.'">'.$this->page.'</a></span>&nbsp;&nbsp;';
		if($this->page-1 == 0){
			$strUp = '<li class="disabled"><a href="'.$url.($this->page-1).'">上一页</a></li>';
		}else{
			$strUp = '<li><a href="'.$url.($this->page-1).'">上一页</a></li>';
		}
		if($this->page+1 > $cnt){
			$strDown = '<li class="disabled"><a href="'.$url.($this->page+1).'">下一页</a></li>';
		}else{
			$strDown = '<li><a href="'.$url.($this->page+1).'">下一页</a></li>';
		}
		$tail = '<li><a href="'.$url.$cnt.'">末页</a></li>';
		array_unshift($nav,$strUp);
		array_unshift($nav,$total);
		array_push($nav,$strDown);
		array_push($nav,$tail);
		return $nav = implode('',$nav);
	

	}


}


