<?php
include_once "base.php";
$file=find("upload",$_POST['id']);
$_POST['description'];
if($_FILES['file_name']['error']==0){
    $file_str_array=explode(".",$_FILES['file_name']['name']);//explode將字串分割成多個元素
$sub=array_pop($file_str_array);//將檔案的附檔名抓出來(因為array_pop可以彈出陣列裡最後的元素)
$file_name_array=explode(".",$file['file_name']);
$file_name=array_shift($file_name_array).".".$sub;//改檔名
// move_uploaded_file($_FILES['file_name']['tmp_name'],"../upload/".$_FILES['file_name']['name']);
if($file['file_name']!==$file_name){
    unlink("../upload/".$file['file_name']);   //刪除舊的檔案
}
move_uploaded_file($_FILES['file_name']['tmp_name'],"../upload/".$file_name);//移動檔案到upload資料夾裡
// $description=$_POST['description'];
// echo $description;
// echo"<br>";
update('upload',['description'=>$_POST['description'], //更新upload資料表裡面的項目資料
                 'file_name' =>$file_name,
                 'size'=>$_FILES['file_name']['size'],
                 'type'=>$_FILES['file_name']['type'],
],$_POST['id']);



header('location:../upload.php?upload=success');

}else{
update('upload',['description'=>$_POST['description']],$_POST['id']);
}
header('location:../upload.php?upload=success');

?>