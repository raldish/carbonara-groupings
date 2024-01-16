<?php
@include('connection.php');
?>
<!doctype html>
<html lang="en">

<head>
    <title>CRUD OPERATION</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <style>
        * {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;

        }
        body{
            background-color: #e9ecef;
        }

        #btnNew {
            width: 180px;
            height: 40px;
            font-weight: 800;
            border: none;
            border-radius: 20px;
            background-color: #2ecc71;
        }

        form{
            display: flex;
        }

        #tablehead {
            height: 50px;
            background-color: #024B73;
            color: white;
        }
        td{
            padding-top: 30px;
            margin: 400px;
        }
        h3{
            color: #6c757d;
            font-size: 40px;
            text-align: center;
            font-family: Copperplate, fantasy;
        }

        #btnUpdate {

            height: 40px;
            width: 120px;
            border: none;
            border-radius: 20px;
            background-color: #f1c40f;
            color: white;
            font-weight: 700;
        }

        #btnDelete {
            height: 40px;
            width: 120px;
            border: none;
            border-radius: 20px;
            background-color: #e67e22;
            color: white;
            font-weight: 700;
        }
        .searchDes {
            width: 30%;
            display: flex;
            justify-content: flex-end;
            margin-left: auto;
            margin-right: 0;
            border: 3px solid #7f8c8d;
            padding: 5px;
            height: 40px;
            border-radius: 5px 0 0 5px;
            outline: none;
            color: #9DBFAF;
        }

        .searchDes:focus{
            color: #2ecc71;
        }
        input[type=submit]{
            height: 40px;
            width: 120px;
            border: none;
            border-radius: 0px 50px 50px 0px;
            background-color: #f1c40f;
            color: white;
            font-weight: 700;
        }
        label{ 
            align-content: center;
            height: 40px;
            width: 120px;
            border-radius: 50px 0px 0px 50px;
            font-size: 24px;
            background-color: #f1c40f;
            color: white;
            font-weight: 700;
        }
        .responsive {
          display: block;
          margin-left: auto;
          margin-right: auto;
          width: 50%;
          height: auto;
        }
        hr.horline{
          border: 3px solid black;
        }
    </style>
</head>
<br>
<body>
    <main>
        <div class="container">
            <img src="rtulogo.png" class="responsive" width="600" height="400">
            <hr class="horline">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <a href="insert.php" id="btnNew" class="btn btn-primary my-3"><i class="bi bi-plus-circle-fill"></i> NEW</a>
                <input class="searchDes" type="text" id="search" name="search" placeholder="Search">
                <input type="submit" value="SUBMIT">
            </form>
            <h3>Student Information</h3>
            <table class="table table-striped table-hover table-responsive">
                <thead id="tablehead">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Student No</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Action</th
>                    </tr>

                </thead>
                <tbody>
                    <?php

                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $searchTerm = mysqli_real_escape_string($conn, $_POST['search']);

                            $sql = "SELECT * FROM carbonarathings WHERE name LIKE '%$searchTerm%' OR studentno LIKE '%$searchTerm%' OR email LIKE '%$searchTerm%' OR phone LIKE '%$searchTerm%' OR address LIKE '%$searchTerm%'"; // Replace with your table and column name

                            $result = mysqli_query($conn, $sql);

                            
                            if (mysqli_num_rows($result) > 0) {

                            while ($row = mysqli_fetch_assoc($result)) {
                                    $id = $row['id'];
                                    $name = $row['name'];
                                    $studentno = $row['studentno'];
                                    $email = $row['email'];
                                    $phone = $row['phone'];
                                    $address = $row['address'];
                                    echo '
                                <tr>
                                <td>' . $id . '</td>
                                <td>' . $name . '</td>
                                <td>' . $studentno .'</td>
                                <td>' . $email . '</td>
                                <td>' . $phone . '</td>
                                <td>' . $address . '</td>
                                <td>
                                <a href="edit.php?editid=' . $id . '"><button id="btnUpdate" class="btn btn-warning text-light"><i class="bi bi-pencil-square"></i> EDIT</button></a>
                                <a href="delete.php?deleteid=' . $id . '"><button id="btnDelete" class="btn btn-danger text-light"><i class="bi bi-trash-fill"></i> DELETE</button></a>
                                </td>
                                </tr>
                                ';
                        }
                    }
                    else {
                        echo "No results found.";
                    }
                
                    mysqli_free_result($result);

                }

                    ?>
                </tbody>
            </table>

        </div>
    </main>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>