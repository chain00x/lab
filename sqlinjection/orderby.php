<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}
$orderby=$_GET["orderby"];
$sql = "SELECT id, username FROM user order by id ".$orderby;

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // 输出数据
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]."</br>". "username: " . $row["username"]."<br></br>";
    }
} else {
    echo "0 结果";
}
?>
