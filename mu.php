<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/1
 * Time: 14:01
 */
$dir = '../stu';
function dirList($dir){
    $arr = scandir($dir);
    foreach($arr as $v){
        if($v != '.' && $v != '..'){
            $path = $dir . '/' . $v;
            if(is_dir($path)){
                dirList($path);
            }else{
                echo "{$path}<br>";
            }
        }
    }
}
dirList($dir);