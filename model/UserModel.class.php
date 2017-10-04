<?php
class UserModel extends Model{


	//用户表
	private $table = 'userinfo';

/***
userinfo表操作

***/

	//注册的方法
	public function reg($arr){
		$this->db->autoExecute($this->table,$arr);
	}

	//将激活码插入到activecode 表中
	public function insert($arr){
		$this->db->autoExecute('activecode',$arr);
	}

	public function verifyCode($code,$user){
		//验证激活码是否存在
		if(strlen($code) != 8){
			exit('激活码不存在');
		}
		$sql = "select * from activecode where code = '$code'";
		$data = $this->db->getOne($sql);
		if(empty($data)){
			exit("验证码不存在");
		}
		if(time()>$data['expire']){
			exit("验证码已过期");
		}

		//激活用户
		$sql = "update userinfo set status = 1 where user= '$user'";
		$this->db->query($sql);
		//并将过期时间设为0
		$sql = "update activecode set expire = 0 where code = '$code'";
		$this->db->query($sql);

	}

	//登录的方法
	//根据邮箱和密码来进行验证
	//认证数据库中此用户，密码是否正确
	public function login($email,$pwd){
		$data = array();
		$sql = 'select user,email,pwd from '.$this->table.' where email = "'.$email.'" and pwd= "'.$pwd.'"';
		$data = $this->db->getOne($sql);
		if($this->db->_affactRow() != 0){
			//验证正确，登录
			$_SESSION['user'] = $data['user'];
			$sql = 'update '.$this->table.' set flag = 1 where user = "'.$data['user'].'"';
			$this->db->query($sql);
			//并且跳转到index.php页面
			return true;
		}else {
			return false;
		}
	}

	//用户退出
	public function logout($user){
		$sql = 'update '.$this->table.' set flag = 0 where user = "'.$user.'"';
		$this->db->query($sql);
		
			$_SESSION['user'] = "";
			header('Location:./view/index.php');
		
		
	}
	
	//修改表中的数据
	//自动更新多条数据，更新传入的数组
	public function update($data,$user){
		foreach ($data as $key => $value) {
			$sql = "update ".$this->table." set ".$key." = '".$value."' where user= '".$user."'";
			$this->db->query($sql);
			if($key == 'user'){
				$_SESSION['user'] = $data['user'];
			}
			
		}
		if($this->db->_affactRow()!=0){
				return true;
			}
		
	}

	//往数据库里插入数据
	public function add($data){
		$this->db->autoExecute($this->table,$data);
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

	//获取数据库中的图片地址
	public function getPic($user){
		$sql = "select pic from ".$this->table." where user= '".$user."'";
		$data =  $this->db->getRow($sql);
		return $data[0];
	}

	//修改数据库中图片的地址
	public function setPic($user,$path){
		$pic = $this->getPic($user);
		$pic = substr($pic,1);
		if($pic != '../uploads/headPic/default.png'){
			unlink($pic);
		}
		$sql = "update ".$this->table." set pic ='".$path."' where user ='".$user."'";
		$this->db->query($sql);
	}

	//获取数据中数据总数
	public function getNum(){
		$data = array();
		$sql = 'select id from '.$this->table;
		$data = $this->db->getAll($sql);
		if($this->db->_affactRow() !=0){
			return count($data);
		}else{
			return 0;
		}
	}

	//获取全部的数据
	public function getAll($offset,$perpage){
		$data=array();
		$sql = 'select * from '.$this->table.' limit '.$offset.','.$perpage;
		$data = $this->db->getAll($sql);
		return $data;
	}


	//验证数据库中是否存在user
	public function isUser($user){
		$sql = "select user from ".$this->table;
		$data = $this->db->getAll($sql);
		$list = array();
		foreach ($data as $key => $value) {
			$list[] = $value['user'];
		}
		if(in_array($user,$list)){
			return true;
		}else{
			return false;
		}
	}

	//验证数据库中是否存在email(账号)
	public function isEmail($email){
		$sql = "select email from ".$this->table;
		$data = $this->db->getAll($sql);
		$list = array();
		foreach ($data as $key => $value) {
			$list[] = $value['email'];
		}
		if(in_array($email,$list)){
			return true;
		}else{
			return false;
		}
	}

	//删除此用户
	public function delUserById($id){
		$sql = "delete from ".$this->table." where id=".$id;
		$this->db->query($sql);
		if($this->db->_affactRow() != 0){
			return true;
		}else{
			return false;
		}
	}



/***
follows表操作

***/

	//获取follows表最后的id
	public function getLastId(){
		$data = array();
		$sql = 'select id from follows order by id asc';
		$data = $this->db->getAll($sql);
		if(!empty($data)){
			return $data[count($data)-1]['id'];
		}else{
			return 0;
		}
	}

	//判断follows表中是否有这个用户，作者
	public function isfollow($user,$author){
		$data = array();
		$sql = "select user,author from follows where user='".$user."' and author='".$author."'";
		$data = $this->db->query($sql);
		if($this->db->_affactRow()!=0){
			return true;
		}else{
			return false;
		}
	}

	//删除这条数据
	public function delFollow($user,$author){
		$sql = "delete from follows where user='".$user."' and author='".$author."'";
		$this->db->query($sql);
	}

	//通过id删除
	public function delFollowById($id){
		$sql = "delete from follows where id=".$id;
		$this->db->query($sql);
		if($this->db->_affactRow() != 0){
			return true;
		}else{
			return false;
		}
	}


	//获取关注人数
	public function getFollows($user){
		$sql = "select follows from ".$this->table." where user='".$user."'";
		$data = $this->db->getRow($sql);
		return $data[0];
	}


	//在follows表中添加相应的信息
	public function addFollow($data){
		$this->db->autoExecute('follows',$data);
	}

	//获取follows中记录个数
	public function getTotalFollow(){
		$data = array();
		$sql = 'select id from follows';
		$data = $this->db->getAll($sql);
		if($this->db->_affactRow() !=0){
			return count($data);
		}else{
			return 0;
		}
	}

	//获取follows全部数据
	public function getAllFollow($offset,$perpage){
		$data = array();
		$sql = 'select * from follows limit '.$offset.','.$perpage;
		$data = $this->db->getAll($sql);
		return $data;
	}


/***

admin表的操作

***/

	//获取全部数据
	public function getAllAdmin($offset,$perpage){
		$data = array();
		$sql = 'select * from admin limit '.$offset.','.$perpage;
		$data = $this->db->getAll($sql);
		return $data;
	}

	//通过id删除
	public function delAdminById($id){
		$sql = "delete from admin where id=".$id;
		$this->db->query($sql);
		if($this->db->_affactRow() != 0){
			return true;
		}else{
			return false;
		}
	}

	//获取总数量
	public function getTotalAdmin(){
		$data = array();
		$sql = 'select id from admin';
		$data = $this->db->getAll($sql);
		if($this->db->_affactRow() !=0){
			return count($data);
		}else{
			return 0;
		}
	}


	/***
		操作admin表

	***/

		//验证数据库中是否存在user
	public function isUserAdmin($user){
		$sql = "select user from admin";
		$data = $this->db->getAll($sql);
		$list = array();
		foreach ($data as $key => $value) {
			$list[] = $value['user'];
		}
		if(in_array($user,$list)){
			return true;
		}else{
			return false;
		}
	}

	//验证数据库中是否存在email(账号)
	public function isEmailAdmin($email){
		$sql = "select email from admin";
		$data = $this->db->getAll($sql);
		$list = array();
		foreach ($data as $key => $value) {
			$list[] = $value['email'];
		}
		if(in_array($email,$list)){
			return true;
		}else{
			return false;
		}
	}



	//注册admin
	public function regAdmin($data){
		$this->db->autoExecute('admin',$data);
	}


	//获取最后一个id
	public function getIdAdmin(){
		$data = array();
		$sql = 'select id from admin order by id asc';
		$data = $this->db->getAll($sql);
		if(!empty($data)){
			return $data[count($data)-1]['id'];
		}else{
			return 0;
		}
	}

	//验证原密码是否正确
	public function verify($opwd,$user){
		$sql = 'select pwd,user from admin where user ="'.$user.'" and pwd = "'.$opwd.'"';
		$this->db->query($sql);
		if($this->db->_affactRow()!=0){
			return true;
		}else{
			return false;
		}
	}
	
	//更新
	//自动更新多条数据，更新传入的数组
	public function updateAdmin($data,$user){
		foreach ($data as $key => $value) {
			$sql = "update admin set ".$key." = '".$value."' where user= '".$user."'";
			$this->db->query($sql);
			if($key == 'user'){
				$_SESSION['user'] = $data['user'];
				return true;
			}
			if($this->db->_affactRow()!=0){
				return true;
			}
		}
		
	}

	//认证数据库中此用户，密码是否正确
	public function loginAdmin($user,$pwd){
		$data = array();
		$sql = 'select user,pwd from admin where user = "'.$user.'" and pwd= "'.$pwd.'"';
		$data = $this->db->getOne($sql);
		if($this->db->_affactRow() != 0){
			//验证正确，登录
			$_SESSION['admin'] = $data['user'];
			$sql = 'update admin set flag = 1 where user = "'.$data['user'].'"';
			$this->db->query($sql);
			//并且跳转到index.php页面
			return true;
		}else {
			return false;
		}
	}


	//用户退出
	public function logoutAdmin($user){
		$sql = 'update admin set flag = 0 where user = "'.$user.'"';
		$this->db->query($sql);
		if($this->db->_affactRow() != 0){
			$_SESSION['admin'] = "";
			header('Location:login.html');
		}
		
	}

}