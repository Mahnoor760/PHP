<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "aptech";

$insert = false;
$update = false;
$delete = false;


$con = mysqli_connect($server, $username, $password, $database);
if (!$con) {
    die("connection is failed" . mysqli_connect_error());
}


if (isset($_GET["delete"])) {
    $id = $_GET["delete"];
$sql = "DELETE FROM std WHERE id = '$id' ";

if (mysqli_query($con, $sql)) {
    echo "Record deleted successfully.";
} else {
    echo " deleting record: " . mysqli_error($con);
}

header("Location: index.php");
exit();
}



if (isset($_POST['submit'])) {
    $fname = $_POST['firstname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $conpassword = $_POST['conpassword'];
    $gender = $_POST['gender'];
    $dob = $_POST['dateofbirth'];
    $address = $_POST['address'];

    if ($password === $conpassword) {
        $sql = "INSERT INTO `std` (`Fullname`, `Email`, `Password`, `Conpassword`, `Gender`, `dob`, `Address`) 
                VALUES ('$fname', '$email', '$password', '$conpassword', '$gender', '$dob', '$address')";
        
        if (mysqli_query($con, $sql)) {
            echo "Data inserted successfully";
        } else {
            echo "Data insertion failed: " . mysqli_error($con);
        }
    } else {
        echo "Passwords do not match!";
    }
}



if (isset($_POST['update'])) {
    $id = $_POST['idupdate'];
    $fullname = $_POST['fnameupdate'];
    $email = $_POST['emailupdate'];
    $password = $_POST['passwordupdate'];
    $conpassword = $_POST['conpasswordupdate'];
    $gender = $_POST['gender'];
    $dob = $_POST['dobupdate'];
    $address = $_POST['addressupdate'];

    if ($password === $conpassword) {
        $query = "UPDATE `std` SET 
                  `Fullname`='$fullname',
                  `Email`='$email',
                  `Password`='$password',
                  `Conpassword`='$conpassword',
                  `Gender`='$gender',
                  `dob`='$dob',
                  `Address`='$address' 
                  WHERE id='$id'";

        if (mysqli_query($con, $query)) {
            echo "Data updated successfully!";
        } else {
            echo "Error updating record: " . mysqli_error($con);
        }
    } else {
        echo "Passwords do not match!";
    }
}



?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/2.1.3/css/dataTables.dataTables.min.css">
    <style>

body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 950px;
    border-radius: 10px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
    margin-bottom: 30px;
    font-size: 35px;
    color: #333;
}

/* Form Styling */
form {
    font-size: 18px;
   
}

.form-label {
    font-weight: bold;
    color: #555;
    
}

.form-control {
    font-size: 16px;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    transition: all 0.3s ease;
}

.form-control:focus {
    border-color: #007bff;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
    outline: none;
}

textarea.form-control {
    resize: none;
}

select.form-control {
    font-size: 16px;
    height: auto;
    padding: 10px;
}

button[type="submit"] {
    display: block;
    width: 100%;
    background-color: #28a745;
    color: #fff;
    border: none;
    padding: 12px;
    border-radius: 5px;
    font-size: 18px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button[type="submit"]:hover {
    background-color: #218838;
}

/* Modal Styling */
.modal-header {
    background-color: #007bff;
    color: #fff;
    border-bottom: none;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
}

.modal-title {
    margin: 0;
    font-size: 24px;
}

.modal-body {
    font-size: 16px;
}

.modal-footer {
    border-top: none;
}

.modal-content {
    border-radius: 5px;
}

/* Table Styling */
.table {
    margin-top: 30px;
    border-collapse: collapse;
    width: 100%;
    background-color: #fff;
}

.table th, .table td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.table th {
    background-color: #f4f4f4;
    font-weight: bold;
}

.table tbody tr:hover {
    background-color: #f1f1f1;
}

/* Alert Styling */
.alert {
    font-size: 16px;
    margin-bottom: 20px;
}

.alert-success {
    background-color: #d4edda;
    color: #155724;
}

.alert-primary {
    background-color: #cce5ff;
    color: #004085;
}

/* Button Styling */
.btn-primary {
    background-color: #007bff;
    border: none;
    font-size: 16px;
    padding: 8px 16px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn-primary:hover {
    background-color: #0056b3;
}

.btn-danger {
    background-color: #dc3545;
    border: none;
    font-size: 16px;
    padding: 8px 16px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn-danger:hover {
    background-color: #c82333;
}



    </style>
</head>

<body>
<div class="container">

<?php


if ($insert) {
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
<strong>Successfully!</strong> Account Successfully created.
<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
}


if ($update) {
    echo "<div class='alert alert-primary alert-dismissible fade show' role='alert'>
<strong>Successfully!</strong> Account Successfully Updated.
<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
}

?>


</div>

    <!-- Button trigger modal -->
    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Launch demo modal
    </button> -->

    <!-- Modal -->
   
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Update Your Records</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <div class="modal-body">
                    <form action="index.php" method="post"  style="border: 2px solid black; padding: 15px; border-radius: 5px;">
                        <input type="hidden" name="idupdate" id="userid">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">First Name</label>
                            <input type="fname" name="fnameupdate" class="form-control" id="fnameV" placeholder="enter your full name">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Email</label>
                            <input type="email" name="emailupdate" class="form-control" id="emailV" placeholder="name@example.com">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Password</label>
                            <input type="password" name="passwordupdate" class="form-control" id="passwordV" placeholder="enter your password">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Confirm Password</label>
                            <input type="password" name="conpasswordupdate" class="form-control" id="conpasswordV" placeholder="confirm your password">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Gender</label>
                       
                        <select>
                        <option value="not selected">Select</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
            </div>
        
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">date of birth</label>
                            <input type="date" name="dobupdate" class="form-control" id="dobV" placeholder="dd/mm/yy">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Address</label>
                            <textarea class="form-control" name="addressupdate" id="addressV" rows="3" placeholder="enter your address" ></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <h2><center>REGISTRATION FORM</center></h2>
    <div class="container">
        <form action="index.php" method="post" style="font-size:20px; width: 60%; margin: 0 auto; border: 2px solid black; padding: 15px; border-radius: 5px;" >
            
            <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Full Name</label>
                            <input type="fname" name="fnameupdate" class="form-control" id="fnameV" placeholder="enter your full name">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Email</label>
                            <input type="email" name="emailupdate" class="form-control" id="emailV" placeholder="name@example.com">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Password</label>
                            <input type="password" name="passwordupdate" class="form-control" id="passwordV" placeholder="enter your password">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Confirm Password</label>
                            <input type="password" name="conpasswordupdate" class="form-control" id="conpasswordV" placeholder="confirm your password">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Gender</label>    
                        </div>
                        <div>   <select >
                        <option value="not selected">Select</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
            </div>
            </fieldset><br>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Date of Birth</label>
                            <input type="date" name="dobupdate" class="form-control" id="dobV" placeholder="dd/mm/yy">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Address</label>
                            <textarea class="form-control" name="addressupdate" id="addressV" rows="3" placeholder="enter your address"></textarea>
                        </div>
                        <button class="btn btn-success" type="submit" style="width: 105px; height: 50px; font-size: 20px; padding: 10px 20px;" >Submit</button>

        </form>
    </div>

    <br>
<br>
<h2><center>All Records </center></h2>
<div class="container">
<table border="7" class="table" id="myTable">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Full Name</th>
            <th scope="col">Email</th>
            <th scope="col">Password</th>
            <th scope="col">Confirm Password</th>
            <th scope="col">Gender</th>
            <th scope="col">Date of Birth</th>
            <th scope="col">Address</th>
            <th scope="col">Handle</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT * FROM std";
        $re = mysqli_query($con, $sql);
        if ($re && mysqli_num_rows($re) > 0) {
            while ($r = mysqli_fetch_assoc($re)) {
                echo "<tr>";
                echo "<td>{$r['id']}</td>";
                echo "<td>{$r['Fullname']}</td>";
                echo "<td>{$r['Email']}</td>";
                echo "<td>{$r['Password']}</td>";
                echo "<td>{$r['Conpassword']}</td>";
                echo "<td>{$r['Gender']}</td>";
                echo "<td>{$r['dob']}</td>";
                echo "<td>{$r['Address']}</td>";
                echo "<td>
                        <button class='btn btn-primary edit' data-bs-toggle='modal' data-bs-target='#exampleModal' 
                                type='button' id='{$r['id']}'>Edit</button>
                        <a href='index.php?delete={$r['id']}' class='btn btn-danger'>Delete</a>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "No records found.";
        }
        ?>
    </tbody>
</table>

          

<?php

$sql = "SELECT * FROM std";
$re = mysqli_query($con, $sql);

if ($re && mysqli_num_rows($re) > 0) {
    ?>

    <?php
    while ($r = mysqli_fetch_assoc($re)) {
    ?>
    <tr>
        <td><?php echo $r['id']; ?></td>
        <td><?php echo $r['Fullname']; ?></td>
        <td><?php echo $r['Email']; ?></td>
        <td><?php echo $r['Password']; ?></td>
        <td><?php echo $r['Conpassword']; ?></td>
        <td><?php echo $r['Gender']; ?></td>
        <td><?php echo $r['dob']; ?></td>
        <td><?php echo $r['Address']; ?></td>
    
        <div class='d-grid gap-2 d-md-block'>
                            <td><button class='btn btn-primary edit' data-bs-toggle='modal' data-bs-target='#exampleModal' type='button' id=" . $r['Id'] .">Edit</button></td>
                            <td><button class='btn btn-danger delete' type='button'  id=" . $r['Id'] . ">Delete</button></td>
                        </div>
    </tr>
    <?php
    }
    ?>
     </tbody>
</table>
<?php
} else {
    echo "No records found.";
}
?>


    <script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.1.3/js/dataTables.min.js"></script>
    <script>
        let table = new DataTable('#myTable');
    </script>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<!-- js link datatable  -->
<script src="//cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    
    
    
<script>
        let table = new DataTable('#myTable');
    </script>




</body>

</html>
