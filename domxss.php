<?php 
$name=htmlentities($_GET['name'],ENT_QUOTES);
$age=htmlentities($_GET['age'],ENT_QUOTES);

echo "<script>var name='".$name."'\nvar age=".$age."</script>"
?>
