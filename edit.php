<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>学生信息管理</title>
</head>
<body>
	<center>
		<?php require 'menu.php'; //导入导航栏
		//1.导入配置文件
		require 'dbconfig.php';
		//2.连接数据库
		$link = @mysql_connect(HOST,USER,PASS) or die('数据库连接失败!');
		//选择数据库
		mysql_select_db(DBNAME,$link);
		mysql_query('set names utf8');//设置字符集避免乱码
		//3.组织sql语句查询出要修改的数据
		//获取需要修改的id
		$id = $_GET['id'];
		$sql = "SELECT * FROM stu WHERE id='{$id}'";
		//执行sql并保存到结果集
		$result = mysql_query($sql);
		//判断并解析出要修改的信息
		if($result && mysql_num_rows($result) > 0 ){
			$stu = mysql_fetch_assoc($result);
		}else{
			die('没有找到要修改的数据');
		}
		?>
		<h3>修改学生信息</h3>
		<form action="action.php?a=update" method="post">
		<input type="hidden" name="id" value="<?php echo $stu['id'];?>">
			<table>
				<tr>
					<td>姓名:</td>
					<td><input type="text" name="name" value="<?php echo $stu['name']?>"></td>
				</tr>
				<tr>
					<td>性别:</td>
					<td>
						<input type="radio" name="sex" value="0" <?php echo $stu['sex']==0 ? "checked":""?> />男
						<input type="radio" name="sex" value="1" <?php echo $stu['sex']==1 ? "checked":""?> /> 女
					</td>
				</tr>
				<tr>
					<td>年龄:</td>
					<td><input type="text" name="age" value="<?php echo $stu['age']?>"></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td><input type="submit" value="修改"><input type="reset" value="重置"></td>
				</tr>
			</table>
		</form>
	</center>
</body>
</html>