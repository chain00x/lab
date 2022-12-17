<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "test";
 
// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

$data=file_get_contents('php://input');
$json_data=json_decode($data);
if($json_data){
    $id=$json_data->id;
    $sql = "SELECT id, username FROM user where id='".$id."'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // 输出数据
        while($row = $result->fetch_assoc()) {
            header('Content-Type:application/json; charset=utf-8');
            $arr = array('id'=>$row["id"],'username'=>$row["username"]);
            exit(json_encode($arr));
        }
    } else {
        echo "0 结果";
    }
    $conn->close();
}
else{
    echo '<form action="str.php" method="POST">
      <input type="hidden" name="id" value="1" />
      <input type="submit" value="POST注入" />
    </form><br>
      <input type="submit" value="JSON注入" onclick="sendjson()"/><script>
    function sendjson(){
    var req = new XMLHttpRequest();
    req.onload = reqListener;
    req.open("POST","str.php",true);
    req.withCredentials = true;
    req.setRequestHeader("Content-type","application/json");
    req.send(\'{"id":"1"}\');
    function reqListener(){
        }
    }
    </script>';
    if($_REQUEST['id']){
        $id=$_REQUEST['id'];
    }
    else{
        $id=$_COOKIE['id'];
    }
    
}

$sql = "SELECT id, username FROM user where id='".$id."'";
$result = $conn->query($sql);
 
if ($result->num_rows > 0) {
    // 输出数据
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]."</br>". "username: " . $row["username"]."<br></br>";
    }
} else {
    echo "0 结果";
}
$conn->close();
?>
