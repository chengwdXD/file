<?php
include_once "base.php";
if($_FILES['file_name']['error']==0){
    $file_str_array=explode(".",$_FILES['file_name']['name']);//explode將字串分割成多個元素
$sub=array_pop($file_str_array);//將檔案的附檔名抓出來(因為array_pop可以彈出陣列裡最後的元素)
$file_name=date("Ymdhis").".".$sub;//改檔名
// move_uploaded_file($_FILES['file_name']['tmp_name'],"../upload/".$_FILES['file_name']['name']);
move_uploaded_file($_FILES['file_name']['tmp_name'],"../upload/".$file_name);//移動檔案到upload資料夾裡
// $description=$_POST['description'];
// echo $description;
// echo"<br>";
insert('upload',['description'=>$_POST['description'], //上傳的檔案增加到資料表裡
                 'size'=>$_FILES['file_name']['size'],
                 'type'=>$_FILES['file_name']['type'],
                 'file_name'=>$file_name]);



header('location:../upload.php?upload=success');

}else{
    echo "上傳失敗 請檢查檔案是否正確";
}

?>