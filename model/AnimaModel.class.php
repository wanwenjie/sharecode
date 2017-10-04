<?php

class AnimaModel extends Model{

	private $table = "animation";


/***

操作animation表

***/


	//提交到animation表中
	public function submit($arr){
		$this->db->autoExecute($this->table,$arr);
	}


	//修改表中的数据
	//自动更新多条数据，更新传入的数组
	public function update($data,$id){
		foreach ($data as $key => $value) {
			$sql = "update ".$this->table." set ".$key." = '".$value."' where id= '".$id."'";
			$this->db->query($sql);
			if($this->db->_affactRow()!=0){
				return true;
			}
		}
		
	}

	//search搜索功能
	public function search($search,$offset,$perpage){
		$data = array();
		$sql = "select * from ".$this->table." where title like '%".$search."%' or content like '%".$search."%' and _check=1 limit ".$offset.",".$perpage;
		$data = $this->db->getAll($sql);
		if($this->db->_affactRow() !=0){
			return $data;
		}else{
			return false;
		}
		
	}

	//获取搜索的全部
	public function searchAll($search){
		$data = array();
		$sql = "select * from ".$this->table." where title like '%".$search."%' or content like '%".$search."%' and _check=1";
		$data = $this->db->getAll($sql);
		if($this->db->_affactRow() !=0){
			return count($data);
		}else{
			return 0;
		}
	}

	//获取数据库本表中的最后id
	public function getId(){
		$data = array();
		$sql = 'select id from '.$this->table.' order by id asc';
		$data = $this->db->getAll($sql);
		if(!empty($data)){
			return $data[count($data)-1]['id'];
		}else{
			return 0;
		}	
	}

	//获取插件的访问量
	public function getSkim($id){
		$data = array();
		$sql = "select skim from ".$this->table." where id =".$id;
		$data = $this->db->getAll($sql);
		if($this->db->_affactRow() !=0){
			return count($data);
		}else{
			return 0;
		}
	}

	//按顺序获取全部的id
	public function getAllId(){
		$data = array();
		$sql = "select id from ".$this->table." order by id asc";
		$data = $this->db->getAll($sql);
		return $data;
	}


	//获取当前用户上传记录数量
	public function getNum($user){
		$data = array();
		$sql = "select id from ".$this->table." where _check=1 and user = '".$user."'";
		$data = $this->db->getAll($sql);
		if($this->db->_affactRow() !=0){
			return count($data);
		}else{
			return 0;
		}	
	}

	//获取用户未审核的数量
	public function getNumUncheck($user){
		$data = array();
		$sql = "select id from ".$this->table." where _check=0 and user = '".$user."'";
		$data = $this->db->getAll($sql);
		if($this->db->_affactRow() !=0){
			return count($data);
		}else{
			return 0;
		}
	}


	//获取数据库中的总数量
	public function total(){
		$data = array();
		$sql = "select id from ".$this->table;
		$data = $this->db->getAll($sql);
		if($this->db->_affactRow() !=0){
			return count($data);
		}else{
			return 0;
		}
	}

	//删除插件通过id
	public function delAnimById($id){
		$sql = "select * from ".$this->table." where id = ".$id;
		$data = array();
		$data = $this->db->getAll($sql);
		if(!empty($data)){
			if(file_exists($data[0]['file_path'])){
				unlink($data[0]['file_path']);
                if($data[0]['url'] != '..' && is_dir($data[0]['url'])){
					$this->deldir($data[0]['url']);
			    }
			}
			if(file_exists($data[0]['pic'])){
				unlink($data[0]['pic']);		
			}
				
			
		}
		$sql = "delete from ".$this->table." where id=".$id;
		$this->db->query($sql);
		if($this->db->_affactRow() != 0){
			return true;
		}else{
			return false;
		}
	}

	//删除一个目录
	public function deldir($path){
		//要先删除一个目录，必须先打开一个目录
		$dh=opendir($path);
		while(($raw=readdir($dh))!==false){
			//如果不是目录的话，就直接删除文件
			if($raw=='.'or $raw=='..'){
				continue;
			}else{

				if(is_dir($path.'/'.$raw) == false){
					unlink($path.'/'.$raw);
				}else{
					$this->deldir($path.'/'.$raw);
				}
			}
				
		}
		//删除一个目录 先关掉一个目录
		closedir($dh);
		rmdir($path);
		
	}

	//获取全部数据
	public function getAll($offset,$perpage){
		$data=array();
		$sql = 'select * from '.$this->table.' order by date desc limit '.$offset.','.$perpage;
		$data = $this->db->getAll($sql);
		return $data;
	}

	//获取当前用户的数据
	public function getAllByUser($user,$offset,$perpage){
		$sql = "select * from ".$this->table." where _check=1 and user='".$user."' limit ".$offset.",".$perpage;
		$data = array();
		$data = $this->db->getAll($sql);
		return $data;
	}

	//获取用户的空间大小
	public function getSize($user){
		$sql = "select sum(size) from ".$this->table." group by user having user='".$user."'";
		$data = array();
		$data = $this->db->getRow($sql);
		return round($data[0]/(1024*1024),2);

	}

	//根据cat_id 取出数据
	public function getDataByCatId($cat_id,$offset,$perpage){
		$sql = "select * from ".$this->table." where _check=1 and cat_id = ".$cat_id." order by date desc limit ".$offset.",".$perpage;
		$data = array();
		$data = $this->db->getAll($sql);
		return $data;
	}

	//根据cat_id 取出的总数
	public function getNumByCatId($cat_id){
		$data = array();
		$sql = "select id from ".$this->table." where _check=1 and cat_id = ".$cat_id;
		$data = $this->db->getAll($sql);
		if($this->db->_affactRow() !=0){
			return count($data);
		}else{
			return 0;
		}
	}

	//根据id取出每一条插件
	public function getDataById($id){
		$sql = "select * from ".$this->table." where id = ".$id;
		$data = array();
		$data = $this->db->getAll($sql);
		return $data[0];
	}

	//根据id获取下载次数
	public function getDownById($id){
		$sql = "select down from ".$this->table." where id=".$id;
		$data = $this->db->getRow($sql);
		return $data[0];
	}

	//根据一些方式获取插件
	public function getWayBy($order,$offset,$perpage){
		$sql = "select * from ".$this->table." where _check=1 order by ".$order." desc limit ".$offset.",".$perpage;
		$data = array();
		$data = $this->db->getAll($sql);
		return $data;
	}

	//获取收藏通过用户
	public function getCollectByUser($user,$offset,$perpage){
		$data=array();
		$sql = 'select * from '.$this->table.' where id in (select collect_id from collect where user="'.$user.'") limit '.$offset.','.$perpage;
		$data = $this->db->getAll($sql);
		return $data;
	}

	//获取收藏人数
	public function getCollect($collect_id){
		$sql = "select collect from ".$this->table." where id='".$collect_id."'";
		$data = $this->db->getRow($sql);
		return $data[0];	
	}


/***

操作demo表开始

***/

	//提交到demo表中
	public function submitDemo($data){
		$this->db->autoExecute('demo',$data);
	}


	//获取demo表中最后一个id
	public function getDemoId(){
		$data = array();
		$sql = 'select id from demo order by id asc';
		$data = $this->db->getAll($sql);
		if(!empty($data)){
			return $data[count($data)-1]['id'];
		}else{
			return 0;
		}
	}

	//获取demo中所有的数据
	public function getDemoAll($offset,$perpage){
		$data=array();
		$sql = 'select * from demo limit '.$offset.','.$perpage;
		$data = $this->db->getAll($sql);
		return $data;
	}

	//获取demo中个数
	public function getNumByDemo(){
		$data = array();
		$sql = "select id from demo";
		$data = $this->db->getAll($sql);
		if($this->db->_affactRow() !=0){
			return count($data);
		}else{
			return 0;
		}
	}

	//根据id获取数据
	public function getDemoById($id){
		$sql = "select * from demo where id = ".$id;
		$data = array();
		$data = $this->db->getAll($sql);
		return $data[0];
	}

	//删除demo通过id
	public function delDemoById($id){
		$sql = "select * from demo where id = ".$id;
		$data = array();
		$data = $this->db->getAll($sql);
		if(!empty($data)){
            if(file_exists($data[0]['file_path'])){
      			unlink($data[0]['file_path']);
              	if(is_dir($data[0]['url'])){
                 	$this->deldir($data[0]['url']);
                }
            }	
		}
		$sql = "delete from demo where id=".$id;
		$this->db->query($sql);
		if($this->db->_affactRow() != 0){
			return true;
		}else{
			return false;
		}
	}

	//修改表中的数据
	//自动更新多条数据，更新传入的数组
	public function updateDemo($data,$id){
		foreach ($data as $key => $value) {
			$sql = "update demo set ".$key." = '".$value."' where id= '".$id."'";
			$this->db->query($sql);
			if($this->db->_affactRow()!=0){
				return true;
			}
		}
		
	}


/***

操作collect表

***/

	//获取数据库本表中的最后id
	public function getLastId(){
		$data = array();
		$sql = 'select id from collect order by id asc';
		$data = $this->db->getAll($sql);
		if(!empty($data)){
			return $data[count($data)-1]['id'];
		}else{
			return 0;
		}	
	}


	//判断collect表中是否有这个插件
	public function iscollect($user,$collect_id){
		$data = array();
		$sql = "select user,collect_id from collect where user='".$user."' and collect_id='".$collect_id."'";
		$data = $this->db->query($sql);
		if($this->db->_affactRow()!=0){
			return true;
		}else{
			return false;
		}
	}


	//向collect表中添加记录
	public function addCollect($data){
		$sql = "select user,collect_id from collect where user='".$data['user']."' and collect_id=".$data['collect_id'];
		$this->db->query($sql);
		if($this->db->_affactRow()==0){
			$this->db->autoExecute('collect',$data);
		} 
		
	}


	//删除此记录
	public function delCollect($user,$collect_id){
		$sql = "delete from collect where user='".$user."' and collect_id='".$collect_id."'";
		$this->db->query($sql);
	}

	//根据id删除记录
	public function delCollectById($id){
		$sql = "delete from collect where id=".$id;
		$this->db->query($sql);
		if($this->db->_affactRow() != 0){
			return true;
		}else{
			return false;
		}
	}

	//获取用户收藏的个数
	public function getNumByCollect($user){
		$data = array();
		$sql = "select id from collect where user = '".$user."'";
		$data = $this->db->getAll($sql);
		if($this->db->_affactRow() !=0){
			return count($data);
		}else{
			return 0;
		}
	}

	//获取全部收藏记录
	public function getAllCollect($offset,$perpage){
		$data=array();
		$sql = 'select * from collect limit '.$offset.','.$perpage;;
		$data = $this->db->getAll($sql);
		return $data;
	}

	//获取收藏记录总个数
	public function getTotalCollect(){
		$data = array();
		$sql = "select id from collect";
		$data = $this->db->getAll($sql);
		if(empty($data)){
			return 0;
		}else{
			return count($data);
		}
		
	}




/***

操作cat表

***/

	//获取分类名称
	public function getCatName($cat_id){
		$sql = "select cat_name from cat where cat_id = ".$cat_id;
		$data = array();
		$data = $this->db->getRow($sql);
		return $data[0];
	}


	//获取全部分类
	public function getAllCat($offset=0,$perpage=8){
		$data=array();
		$sql = 'select * from cat limit '.$offset.','.$perpage;;
		$data = $this->db->getAll($sql);
		return $data;
	}

	//获取分类总数
	public function getTotalCat(){
		$data = array();
		$sql = "select cat_id from cat";
		$data = $this->db->getAll($sql);
		return count($data);
	}

	//删除分类根据id
	public function delCatById($id){
		$sql = "delete from cat where cat_id=".$id;
		$this->db->query($sql);
		if($this->db->_affactRow() != 0){
			return true;
		}else{
			return false;
		}
	}

	//添加分类
	public function addCat($data){
		$this->db->autoExecute('cat',$data);
		if($this->db->_affactRow()!=0){
			return true;
		}else{
			return false;
		}
	}

	//更新分类
	public function updateCat($data,$id){
		foreach ($data as $key => $value) {
			$sql = "update cat set ".$key." = '".$value."' where cat_id= '".$id."'";
			$this->db->query($sql);
			if($this->db->_affactRow()!=0){
				return true;
			}
		}
	}

}