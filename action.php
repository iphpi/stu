<?php
//执行信息的增删改
//1.导入配置文件
require 'dbconfig.php';
//2.连接数据库,选着数据库
$link = @mysql_connect(HOST,USER,PASS) or die('数据库连接失败!');
mysql_select_db(DBNAME,$link);
mysql_query('set names utf8');
//3.根据动作参数a的值,做对应的增删改操作
switch ($_GET['a']) {
	case 'add'://添加
		//获取表单数据
		$name = $_POST['name'];
		$sex  = $_POST['sex'];
		$age  =	$_POST['age'];
		$addtime  =	time();
		//拼接sql语句
		$sql = "INSERT INTO stu VALUES(null,'{$name}','{$sex}','{$age}','{$addtime}')";
		//执行添加操作
		mysql_query($sql,$link);
		//判断是否成功
		if(mysql_affected_rows($link) > 0){
			echo '<p>添加成功</p>';
		}else{
			echo '添加失败';
		}
		break;

	case 'update'://修改
		//获取要修改的信息
		$name = $_POST['name'];
		$sex = $_POST['sex'];
		$age = $_POST['age'];
		$id = $_POST['id'];

		//拼接修改sql语句
		$sql = "UPDATE stu SET
				name='{$name}',
				sex='{$sex}',
				age='{$age}'
				WHERE
				id='{$id}'";
		//发送并执行修改操作

		mysql_query($sql,$link);
		//判断是否成功,跳转
		if(mysql_affected_rows($link)>0){
			echo '<h3>修改成功</h3>';
		}else{
			echo '<h3>修改失败</h3>';
		}
		break;

	case 'delete'://删除
		//获取要删除的id号
		$id = $_GET['id'];
		//执行删除
		$sql = "DELETE FROM stu WHERE id='{$id}'";
		//跳转查看信息页面
		mysql_query($sql);
		header('Location:index.php');
		exit;
		break;
}
//4.关闭数据库连接
mysql_close($link);
	echo "<a href='javascript:window.history.back();'>返回</a>";
	echo "&nbsp;&nbsp;&nbsp;";
	echo "<a href='index.php'>浏览学生信息</a>";