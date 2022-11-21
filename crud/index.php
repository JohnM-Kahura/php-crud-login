<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>CRUD app</title>
</head>

<body>
    <?php require_once 'process.php';?>

    <?php
    
    
    $mysqli =new mysqli('localhost','root','','bank',) or die(mysqli_error($mysqli));
    $feedback=$mysqli->query('SELECT * FROM bank_details') or die(mysqli_error($mysqli));

    $feedback -> fetch_assoc();

    ?>

    <div class="container">

    <?php if(isset($_SESSION['message'])) :?>

<div class="alert alert-<?=$_SESSION['msg_type']?>">
<?php 
 echo $_SESSION['message']; 
 unset($_SESSION['message']);
 ?>


</div>
<?php endif?>
        <div class="row justify-content-center">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Bank</th>
                        <th>Branch</th>
                        <th>Savings</th>
                        <th>Loans</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <?php while($row =$feedback -> fetch_assoc()):?>
                    <tr>
                        <td><?php echo $row['name'];?></td>
                        <td><?php echo $row['bank'];?></td>
                        <td><?php echo $row['branch'];?></td>
                        <td><?php echo $row['savings'];?></td>
                        <td><?php echo $row['loans'];?></td>
                        <td>
                            <a href="index.php?edit=<?php echo $row['id'];?>" class="btn btn-info">Edit</a>
                            <a href="process.php?delete=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    <?php endwhile;?>
            </table>
        </div>
        <div class="row justify-content-center">
            <form action="process.php" method="post">
                <input type="hidden" name='id' value="<?php echo $id; ?>">
            <div class="form-group">
                
                <label > Name</label>
                <input type="text" name="name" class="form-control" value="<?php echo $name?>"  placeholder="Enter  name">
                <label > Bank</label>
                <input type="text" name="bank" class="form-control" value="<?php echo $bank?>"  placeholder="Enter  Bank name">
                <label > Branch</label>
                <input type="text" name="branch" class="form-control" value="<?php echo $branch?>"  placeholder="Enter  the Branch name">
                <label > Savings</label>
                <input type="text" name="savings" class="form-control" value="<?php echo $savings?>"  placeholder="Enter  the savings amount">
                <label > Loans</label>
                <input type="text" name="loans" class="form-control" value="<?php echo $loans?>"  placeholder="Enter  loan amount">
            </div>
           
           
            
<div class="form-group">
    <?php
    if($update==true):
        
        ?>
        <button type="submit" class="btn btn-info" name="update"> Update</button>
    <?php else :?>
            <button type="submit" class="btn btn-primary" name="save">Save</button>
<?php endif;?>
</div>
            </div>
        </form>
        </div>
    </div>
</body>

</html>