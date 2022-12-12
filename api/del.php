<?php
include_once "base.php";
$file=find("upload",$_GET['id']);
unlink("../upload/".$file['file_name']); //刪除資料夾裡的檔案

/////////////base.php裡的函式//////////////////
del("upload",$_GET['id']);//刪除資料表裡的資料
to("../upload.php");//導向upload.php這個檔案

?>