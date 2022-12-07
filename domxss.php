<?php 
$name=htmlentities($_GET['name'],ENT_QUOTES);
$age=htmlentities($_GET['age'],ENT_QUOTES);
$url=htmlentities($_GET['url'],ENT_QUOTES);
$iframeurl=htmlentities($_GET['iframe'],ENT_QUOTES);
echo "参数为name，age，a标签：url，iframe标签：iframe</br>";
if($url){
    echo "<a href=\"$url\">test</a>";
}
elseif($iframeurl){
    echo "<iframe src=\"$iframeurl\">test</a>";
}
else{
    echo "<script>var name='$name';var age='$age';</script>";
}
?>
