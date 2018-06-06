<?php
//取消前台报错
error_reporting(0);
//进行编码转化
header("Content-Type: text/html; charset=utf-8");
//包含自己定义的类文件
include_once('Mysql.class.php');
if($_POST['stunum']){
	$Mysql=new Mysql();
	$Mysql->connect();
	$code=$Mysql->find_all("cardmoney");
	$sta=0;
	for ($i=0; $i <count($code) ; $i++) { 
		if($_POST['stunum']==$code[$i]['stunum']){
			$return['Status']=200;
			$return['Message']=null;
			$return['Data']['daymin']=$code[$i]['daymin'];
			$return['Data']['daymax']=$code[$i]['daymax'];
			$return['Data']['daynum']=$code[$i]['daynum'];
			$return['Data']['stuname']=$code[$i]['stuname'];
			$return['Data']['amount']=$code[$i]['amount'];
			$return['Data']['number']=$code[$i]['number'];
			$sta=1;
			break;
		}
	}
	if($sta==0){
		$return['Status']=201;
		$return['Message']="查无此人";
	}
	echo json_encode($return);
}
elseif($_GET['stunum']){
	$Mysql=new Mysql();
	$Mysql->connect();
	$code=$Mysql->find_all("cardmoney");
	$sta=0;
	for ($i=0; $i <count($code) ; $i++) { 
		if($_GET['stunum']==$code[$i]['stunum']){
			$return['Status']=200;
			$return['Message']=null;
			$return['Data']['daymin']=$code[$i]['daymin'];
			$return['Data']['daymax']=$code[$i]['daymax'];
			$return['Data']['daynum']=$code[$i]['daynum'];
			$return['Data']['stuname']=$code[$i]['stuname'];
			$return['Data']['amount']=$code[$i]['amount'];
			$return['Data']['number']=$code[$i]['number'];
			$sta=1;
			break;
		}
	}
	if($sta==0){
		$return['Status']=201;
		$return['Message']="查无此人";
	}
	// print_r($return);
	echo json_encode($return);
}
else{
	$return['Status']=202;
	$return['Message']="无GET或POST数据传达";
	// print_r($return);
	echo json_encode($return);
}

?>