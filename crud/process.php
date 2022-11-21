<?php

session_start();
$name='';
$bank='';
$savings='';
$branch='';
$loans='';
$id =0;
$update =false;
$mysqli =new mysqli('localhost','root','','bank',) or die(mysqli_error($mysqli));

if(isset($_POST['save'])){
    $name=$_POST['name'];
    $bank=$_POST['bank'];
    $savings=$_POST['savings'];
    $loans=$_POST['loans'];
    $branch=$_POST['branch'];
$_SESSION['message']="Banking infomation saved";
$_SESSION['msg_type']='success';
    $mysqli->query("INSERT INTO bank_details (name,bank,savings,loans,branch) VALUES('$name','$bank','$savings','$loans','$branch')") or
     die($mysqli->error);

  header('location:index.php') ;  

}
if(isset($_GET['delete'])){
$id=$_GET['delete'];
$_SESSION['message']="Bank record deleted";
$_SESSION['msg_type']='danger';
$mysqli->query("DELETE FROM bank_details WHERE id= $id ") or die(mysqli_error($mysqli));
  header('location:index.php') ;  

}
if(isset($_GET['edit'])){
$id=$_GET['edit'];
$update =true;
$result = $mysqli -> query("SELECT * FROM bank_details WHERE id=$id")or die(mysqli_error($mysqli));
if(count(array($result))==1){
    $row=$result->fetch_array();
    $name=$row['name'];
    $bank=$row['bank'];
    $savings=$row['savings'];
    $branch=$row['branch'];
    $loans=$row['loans'];
}
}

if(isset($_POST['update'])){
    $id=$_POST['id'];
    $name=$_POST['name'];
    $bank=$_POST['bank'];
    $savings=$_POST['savings'];
    $loans=$_POST['loans'];
    $branch=$_POST['branch'];

    $mysqli -> query("UPDATE bank_details SET name='$name',bank='$bank',loans='$loans',savings='$savings' WHERE id=$id") or 
    die(mysqli_error($mysqli));
$_SESSION['message']='Bank data updated successfuly';
$_SESSION['msg_type']='success';
header('location: index.php');

}
