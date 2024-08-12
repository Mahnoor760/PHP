<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "aptech";

$con = mysqli_connect($server, $username, $password, $database);
if (!$con) {
    die("connection is failed" . mysqli_connect_error());
}



if (isset($_POST["submit"])) {
    $fname = $_POST["fname"];
    $email = $_POST["email"];
    $password= $_POST["password"];
    $conpassword = $_POST["conpassword"];
    $gender = $_POST["gender"];
    $dob = $_POST["dob"];
    $address = $_POST["address"];
    
    $sqliinsert = "INSERT INTO `pinfo`(`fname`, `email`, `password`, `conpassword`, `gender`,`dob`,`address`) VALUES ('$fname', '$email','$password', '$conpassword','$gender', '$dob','$address')";
    $res = mysqli_query($con, $sqliinsert);

    if ($res) {
        echo "inserted";
    }
}


else if (isset($_POST["update"])) {
    $fname = $_POST["fnameupdate"];
    $email = $_POST["emailupdate"];
    $password = $_POST["passwordupdate"];
    $conpassword = $_POST["conpasswordupdate"];
    $gender = $_POST["genderupdate"];
    $dob = $_POST["dobupdate"];
    $address = $_POST["addressupdate"];
    $update = "UPDATE `pinfo` SET `fname`='$fname' ,`email`='$email',`password`='$password', `conpassword`='$conpassword',`gender`='$gender',`dob`='$dob',`address`='$address' WHERE '";
    $result = mysqli_query($con, $update);

    if ($result) {
        echo "updated";
    }
}
    




?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
 

</head>

<body>
    <!-- Button trigger modal -->
    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Launch demo modal
    </button> -->

    <!-- Modal -->
    
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-color:grey";>
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
                            <input type="conpassword" name="conpasswordupdate" class="form-control" id="conpasswordV" placeholder="confirm your password">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Gender</label>
                        </div>
                        <div>  <input type="radio" id="Male" name="drone" value="Male" checked />
            <label>Male</label>
             </div>
            <div>  <input type="radio" id="Female" name="drone" value="Female" />
            <label>Female</label>
            </div>
            <div>  <input type="radio" id="Others" name="drone" value="Others" />
            <label>Others</label>
            </div>
            </fieldset><br>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">date of birth</label>
                            <input type="dob" name="dobupdate" class="form-control" id="dobV" placeholder="dd/mm/yy">
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
                            <input type="conpassword" name="conpasswordupdate" class="form-control" id="conpasswordV" placeholder="confirm your password">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Gender</label>    
                        </div>
                        <div>  <input type="radio" id="Male" name="drone" value="Male" checked />
            <label>Male</label>
             </div>
            <div>  <input type="radio" id="Female" name="drone" value="Female" />
            <label>Female</label>
            </div>
            <div>  <input type="radio" id="Others" name="drone" value="Others" />
            <label>Others</label>
            </div>
            </fieldset><br>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Date of Birth</label>
                            <input type="dob" name="dobupdate" class="form-control" id="dobV" placeholder="dd/mm/yy">
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
        <table border="7" class="table" >
            <thead>
                <tr>
                    <th scope="col">First Name</th>
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
               
            
                $sql = "SELECT * FROM `pinfo`";
                $result = mysqli_query($con, $sql);
                
                while ($a = mysqli_fetch_assoc($result)) {
                    echo "<tr>";

                    echo "<td scope='row'>" . $a["fname"] . "</td>";
                    echo "<td scope='row'>" . $a["email"] . "</td>";
                    echo "<td scope='row'>" . $a["password"] . "</td>";
                    echo "<td scope='row'>" . $a["conpassword"] . "</td>";
                    echo "<td scope='row'>" . $a["gender"] . "</td>";
                    echo "<td scope='row'>" . $a["dob"] . "</td>";
                    echo "<td scope='row'>" . $a["address"] . "</td>";   
                    echo "<td scope='row'>  
                        <div class='d-grid gap-2 d-md-block'>
                            <button class='btn btn-primary edit' data-bs-toggle='modal' data-bs-target='#exampleModal' type='button' id=" . ">Edit</button>
                            <button class='btn btn-danger delete' type='button' id="  .   ">Delete</button>
                        </div>
                    </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
   
</body>

</html>
```