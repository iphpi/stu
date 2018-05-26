<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>学生信息管理</title>
	<link rel="stylesheet" type="text/css" href="./layui/css/layui.css" media="all">
	<script src="../layui/layui.all.js"></script>
</head>
<body>
	<center>
		<?php require 'menu.php'; //导入导航栏?>
		<h3>添加学生信息</h3>
		<form action="action.php?a=add" method="post">
			<table class='layui-table'>
				<tr>
					<td>姓名:</td>
					<td><input type="text" name="name"></td>
				</tr>
				<tr>
					<td>性别:</td>
					<td>
					  <input type="radio" name="sex" value="0" >男
					  <input type="radio" name="sex" value="1" >女
					</td>
				</tr>
				<tr>
					<td>年龄:</td>
					<td>
					<div class="layui-input-inline">
					<input class="layui-input" type="text" name="age">
					</div>
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td><input type="submit" value="提交" class='layui-btn'><input type="reset" value="重置" class='layui-btn'></td>
				</tr>
			</table>
		</form>
	</center>
</body>
</html>