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
echo '<form action="/json.php" method="POST">
      <input type="text" name="id" value="1" />
      <input type="submit" value="Submit request" />
    </form>';
$data=file_get_contents('php://input');
$json_data=json_decode($data);
if($json_data){
    $id=$json_data->id;
    echo $id;
}
else{
    $id=$_REQUEST['id'];
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
