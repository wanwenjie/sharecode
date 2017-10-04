<?php

class FeedTool{

	//xml 操作对象
	private $dom      = null;

	//xml 中的rss节点
	private $rss      = null;

	//应用rss模板
	private $template = '';

	//标题
	private $title    = '';

	//链接
	private $link     = '';

	//描述
	private $des 	  = '';


	public function __construct($title,$link,$des){
		$this->title = $title;
		$this->link  = $link;
		$this->des 	 = $des;
		$this->template = '../view/feed.xml';
		//创建xml对象
		$this->dom   = new DOMDocument('1.0','utf-8');
		$this->dom->load($this->template);
		$this->rss   = $this->dom->getElementsByTagName('rss')->item(0);
	}


	//创建节点的方法
	public function create_ele($name, $value){
		//创建元素
		$ele = $this->dom->createElement($name);

		//创建文本节点
		$txt = $this->dom->createTextNode($value);

		//将文本节点添加到元素上
		$ele->appendChild($txt);

		//返回元素节点
		return $ele;
	}


	//创建项目
	public function create_item($list){
		//创建item节点
		$item = $this->dom->createElement('item');
		foreach ($list as $key => $value) {
			$item->appendChild($this->create_ele($key,$value));
		}

		return $item;

	}


	//显示生成xml
	public function display($data){
		//创建channel节点
		$chn = $this->dom->createElement('channel');

		//创建title,link,description
		$title = $this->create_ele('title',$this->title);
		$link = $this->create_ele('link',$this->link);
		$des = $this->create_ele('description',$this->des);

		//将三个节点添加到channel中
		$chn->appendChild($title);
		$chn->appendChild($link);
		$chn->appendChild($des);

		foreach ($data as $key => $value) {

			$chn->appendChild($this->create_item($value));
		}

		//将节点添加到rss节点上
		$this->rss->appendChild($chn);

		//输出xml
		$this->dom->save($this->template);
		echo $this->dom->savexml();
	}



}

$title = 'ShareCode-Rss';
$link  = 'http://sn.sv77.net/view/feed.xml';
$des   = '订阅即可享受网站最新插件';

$feed = new FeedTool($title, $link, $des);
$data = array(
	0=>array('title'=>'html5创意应用','link'=>'http://sn.sv77.net/view/','description'=>'这是一个测试用例'),
	1=>array('title'=>'html5','link'=>'http://sn.sv77.net/view/','description'=>'这是一个测试用例')
);
$feed->display($data);
