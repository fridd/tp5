<?php

$public="./Public";
$upload_time=date("Ymd",time());

$uploaddir = $public.'/temp/'.$upload_time."/";

if (!file_exists($public.'/temp/'.$upload_time)) {
    @mkdir($public.'/temp/'.$upload_time);
}

//修改上传的文件名
$tmp = explode(".",$_FILES['file']['name']);
$_FILES['file']['name'] = date("YmdHis",time()).rand(1000,9999).".".$tmp[count($tmp)-1];  

$uploadfile = $uploaddir.$_FILES['file']['name'];
$uploadfile2 = '/temp/'.$upload_time."/".$_FILES['file']['name'];
//var_dump($uploaddir);exit;

print "<pre>";
print_r($uploadfile);
if (move_uploaded_file($_FILES['file']['tmp_name'],$uploaddir.$_FILES['file']['name'])) {
    //print "File is valid, and was successfully uploaded.  Here's some more debugging info:\n";
    //print_r($_FILES);
	echo "<script>
	            var demo=document.getElementById('demo');
				var file_input=demo.getElementsByTagName('input')[0];
				file_input.value='".trim($uploadfile2,'.')."';
	      </script>";
} else {
    print "Possible file upload attack!  Here's some debugging info:\n";
    print_r($_FILES);
}
print "</pre>";

?>