<?php
@include('connection.php');

$id=$_GET['editid'];
$sql = "SELECT * FROM `carbonarathings` WHERE `id`='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$name=$row['name'];
$studentno=$row['studentno'];
$email=$row['email'];
$phone=$row['phone'];
$address=$row['address'];

if(isset($_POST['submit'])){
$name=$_POST['name'];
$studentno=$_POST['studentno'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$address=$_POST['address'];

$sql="UPDATE `carbonarathings` SET `name`='$name',`studentno`='$studentno',`email`='$email',`phone`='$phone',`address`='$address' WHERE `id`='$id'";
$result=mysqli_query($conn,$sql);
if($result){
    header('location:index.php');
}else{
    die(mysqli_error($conn, $sql)) ;
}
header('location:index.php');
}
?>


<!doctype html>
<html lang="en">

<head>
    <title>Update</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <style>
    body{
        font-family: Segoe UI;
        background-color: #e9ecef;
    }h3{
        text-align: center;
        margin: 8% auto;
        text-transform: uppercase;
        letter-spacing: 5px;
    }
    .container{
        font-family: Segoe UI;
        margin: 5% auto;
        width: 40%;
    }.container .form-control{
        border-radius: 40px;
        height: 50px;
    }.container .input-group-text{
        border-radius: 40px;
        width: 50px;
        background-color: #f39c12;
        justify-content: center;
        color: white;
    }.container .btn{
        width: 49%;
        height: 50px;
        margin: 20px auto;
        justify-content: center;
        text-align: center;
        border-radius: 40px;
    }#savebtn{
        border: none;
        background-color: #2ecc71;
    }#cancelbtn{
        border: none;
        background-color: #f1c40f;
        padding: 10px;
    }
</style>
</head>

<body>
    <main>
        <div class="container">
        <h3>Update Users</h3>
        <form action="" method="post">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
                    <input type="text" class="form-control" placeholder="Name" name="name" value="<?php echo $name;?>" aria-label="name" aria-describedby="basic-addon1" autocomplete="off" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-badge-fill"></i></span>
                    <input type="text" class="form-control" placeholder="Student Number" name="studentno" value="<?php echo $studentno;?>" aria-label="name" aria-describedby="basic-addon1" autocomplete="off" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-envelope-at-fill"></i></span>
                    <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo $email;?>" aria-label="email" aria-describedby="basic-addon1" autocomplete="off" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-telephone-fill"></i></span>
                    <input type="text" class="form-control" placeholder="Phone No" name="phone" value="<?php echo $phone;?>" aria-label="phone" aria-describedby="basic-addon1" autocomplete="off" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-journal"></i></span>
                    <input type="text" class="form-control" placeholder="Address" name="address" value="<?php echo $address;?>" aria-label="address" aria-describedby="basic-addon1" autocomplete="off" required>
                </div>
                <button id="savebtn" class="btn btn-success" type="submit" name="submit"><i class="bi bi-pencil-fill"></i> Update</button>
                <a href="index.php" id="cancelbtn" class="btn btn-warning text-light"><i class="bi bi-box-arrow-left"></i> Cancel</a>

                </form>
            </div>
        </div>

    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>