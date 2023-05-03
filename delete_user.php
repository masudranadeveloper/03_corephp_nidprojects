<?php 
include_once('function.php');
$obj=new DB_con();
$id = $_GET['id'];
$result = $obj->delete_user($id);
if($result){
 echo "<script>alert('Data deleted');</script>"; 
echo "<script>window.location.href = 'users.php'</script>";     
}

?>