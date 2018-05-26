<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>学生信息管理首页</title>
	<script>
		function doDel(id){
			if(confirm("确定要删除吗?")){
				window.location="action.php?a=delete&id="+id;
			}
		}
	</script>
	<link rel="stylesheet" type="text/css" href="./layui/css/layui.css" media="all">
	<script src="../layui/layui.all.js"></script>
</head>
<body>
	<center>
	<?php require('menu.php');?>
		<h3>浏览学生信息</h3>
		<table class="layui-table" border="1">
			<tr>
				<th>姓名</th>
				<th>性别</th>
				<th>年龄</th>
				<th>添加时间</th>
				<th>操作</th>
			</tr>
			<?php
			//浏览学生信息
			//1.导入数据库配置文件
			require 'dbconfig.php';
			//2.连接数据库
			$link = @mysql_connect(HOST,USER,PASS) or die('数据库连接失败!');
			mysql_query("SET NAMES UTF8");
			mysql_select_db(DBNAME,$link);
			//3.组织sql查询语句查出结果
			$sql = "SELECT * FROM stu";
			$result = mysql_query($sql);
			//4.解析结果集,输出显示结果到页面
			while ($row = mysql_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td>{$row['name']}</td>";
				echo "<td>{$row['sex']}</td>";
				echo "<td>{$row['age']}</td>";
				echo "<td>".date('Y-m-d H:i:s',$row['addtime'])."</td>";
				echo "<td>
						<a href='javascript:doDel({$row['id']})' class='layui-btn layui-btn-normal'>删除</a>
						<a href='edit.php?a=edit&id={$row['id']}' class='layui-btn layui-btn-normal'>修改</a>
					</td>";
				echo "</tr>";
			}

			?>
		</table>
	</center>
</body>
</html>