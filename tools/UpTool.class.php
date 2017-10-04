<?php

/*
	一个单文件上传类
	一个好的类，应该包括报错设置
	有利于测试
 */

class upTool{

	//设置上传文件最大大小,单位是m
	protected $maxSize = 50;

	//设置上传文件支持的文件类型
	protected $allowType = 'jpg,jpeg,png,gif,bmp,zip,rar';

	//设置上传文件数组
	protected $file = null;

	//根据用户名上传
	protected $user = '';

	//根据时间存储的路径
	protected $pathByTime = '';

	//上传的图片路径
	protected $pathPic = '';

	//上传的文件路径
	protected $pathFile = '';



	public function __construct($key,$user=''){

		//设置http上传变量数组
		$this->file = $_FILES[$key];
		$this->user = $user;
		$this->pathPic = $this->setDirByUser().'/'.$this->getRandName().'.'.$this->getSuffix($this->file['name']);
		$this->pathFile = $this->setDirByUser().'/'.$this->file['name'];
		$this->pathByTime = $this->setDirByTime().'/'.$this->file['name'];
	}
	
	//返回文件的大小
	public function getSize(){
		return $this->file['size'];
	}

	//获取设置之后的文件名及路径根据用户名
	public function getPathPic(){
		$start = stripos($this->pathPic,"/uploads");
		$end = strlen($this->pathPic)-$start;
		return "..".substr($this->pathPic,$start,$end);
	}

	//获取上传文件的路径
	public function getPathFile(){
		$start = stripos($this->pathFile,"/uploads");
		$end = strlen($this->pathFile)-$start;
		return "..".substr($this->pathFile,$start,$end);
	}

	//获取设置之后的文件名及路径根据时间的
	public function getPathByTime(){
		$start = stripos($this->pathByTime,"/demo");
		$end = strlen($this->pathByTime)-$start;
		return "..".substr($this->pathByTime,$start,$end);
	}

	//获取返回的文件名
	public function getName(){
		return $this->file['name'];
	}

	//上传图片
	public function upPic(){

		if(!$this->isAllowType($this->getSuffix($this->file['name']))){
			echo "不是允许的类型";
			return false;
		}

		if(!$this->isAllowSize($this->file['size'])){
			echo "不是允许的大小";
			return false;
		}
		move_uploaded_file($this->file['tmp_name'],$this->pathPic);
	}

	public function upFile(){

		if(!$this->isAllowType($this->getSuffix($this->file['name']))){
			echo "不是允许的类型";
			return false;
		}

		if(!$this->isAllowSize($this->file['size'])){
			echo "不是允许的大小";
			return false;
		}
		move_uploaded_file($this->file['tmp_name'],$this->pathFile);
	}

	//根据时间目录上传文件
	public function upFileByTime(){
		if(!$this->isAllowType($this->getSuffix($this->file['name']))){
			echo "不是允许的类型";
			return false;
		}

		if(!$this->isAllowSize($this->file['size'])){
			echo "不是允许的大小";
			return false;
		}
		move_uploaded_file($this->file['tmp_name'],$this->pathByTime);
	}

	//解压缩
	public function unzip(){
		$zip = new ZipArchive();
		$res = $zip->open($this->pathFile);
		if($res == true){
			$zip->extractTo($this->setDirByUser());
			$zip->close();
			//返回解压后的路径
			$path = array();
			$res = zip_open($this->pathFile);
			while($dir_res = zip_read($res)){
				if(zip_entry_open($res,$dir_res)){
					$file_name = $this->setDirByUser().'/'.zip_entry_name($dir_res);
					if(is_dir($file_name)){
						$path[] = $file_name;
					}
				}
			}
			$start = stripos($path[0],'/uploads');
			return '..'.substr($path[0],$start);	
		}

	}

	//解压缩
	public function unzipByTime(){
		$zip = new ZipArchive();
		$res = $zip->open($this->pathByTime);
		if($res == true){
			$zip->extractTo($this->setDirByTime());
			$zip->close();
			//返回解压后的路径
			$path = array();
			$res = zip_open($this->pathByTime);
			while($dir_res = zip_read($res)){
				if(zip_entry_open($res,$dir_res)){
					$file_name = $this->setDirByTime().'/'.zip_entry_name($dir_res);
					if(is_dir($file_name)){
						$path[] = $file_name;
					}
				}
			}
			$start = stripos($path[0],'/demo');
			return '..'.substr($path[0],$start);	
		}

	}


	//获得后缀的文件类型
	public function getSuffix($name){

		//将文件名拆开，形成数组
		$tmpName = explode('.',$name);
		$suffixName = end($tmpName);
		return $suffixName;

	}

	//根据日期形成目录
	public function setDirByTime(){

		//根据时间，每天形成一个目录
		$dir = date('Ymd',time());
		$path = ROOT.'demo/'.$dir;
		if(!is_dir($path)){
			//级联创建目录
			mkdir($path,0777,true);
		}
		return $path;
	}

	//根据用户名称形成目录
	public function setDirByUser(){
		$dir = $this->user;
		$path = ROOT.'uploads/'.$dir;
		if(!is_dir($path)){
			//级联创建目录
			mkdir($path,0777,true);
		}
		return $path;
	}	

	//生成随机名称
	public function getRandName(){
		$str = 'abcdefghigklmnopqrstuvwxyz0123456789';
		//将字符串打乱后重新截取
		$newName = substr(str_shuffle($str),0,8);
		return $newName;
	}



	



	/*
		判断文件上传是否符合规范
		包括文件大小是否符合
		文件类型是否允许

	 */
	
	//判断文件类型是否允许
	public function isAllowType($type){
		$arr = explode(',',strtolower($this->allowType));
		if(in_array(strtolower($type),$arr)){
			return true;
		}else return false;

	}

	//判断文件的大小是否符合
	public function isAllowSize($size){

		if($size > $this->maxSize*1024*1024){
			return false;
		}else return true;
		
	}



}