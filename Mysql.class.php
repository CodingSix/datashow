<?php 

class mysql{
	//函数作用连接数据库
	public function connect()
	{
		include_once('config.php');
		$conn = mysql_connect($config['host'], $config['user'], $config['pass']) or die("数据库链接错误");//连接数据库s
		mysql_select_db($config['name'], $conn);//选择叫data的数据库进行操作
		mysql_query("SET NAMES 'UTF8'");//告诉服务器编码格式为UTF8
	}
	//传参为表名，函数作用为将这个表的数据压缩进数组中，然后返回
	public function find_all($value)
	{
		$sql = mysql_query("SELECT * FROM  `".$value."` "); 
		$code = array();
		while($row = mysql_fetch_array($sql,0) )
		{
		    array_push($code,$row);
		}
		return $code;
	}
}
 ?>