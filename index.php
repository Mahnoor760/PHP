<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "noor";



$con = mysqli_connect($server, $username, $password, $database);




if (!$con) {
    die("connection failed hai " . mysqli_connect_error());
}





if (isset($_POST["submit"])) {
   
    $fname = $_POST["firstname"];
    $lname = $_POST["lastname"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];

    $sqlins = "INSERT INTO `data`(`id`, `firstname`, `lastname`, `EmailAddress`, `phone`) VALUES ('$id','$firstname','$lastname','$EmailAddress','$phone')";


    $result = mysqli_query($con, $sqlins);
    if ($result) {
        echo "Data Inserted";
    }
}




?>

<h1><center>PHP CRUD</center></h1>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    
<div class="container">



        <form action="" method="post">


            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">First name</label>
                <input type="text" class="form-control" name="first name" id="exampleFormControlInput1" placeholder="Enter your first name">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Last name</label>
                <textarea class="form-control" name="lastname" id="exampleFormControlTextarea1" placeholder="Enter your last name" ></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Email</label>
                <textarea class="form-control" name="email" id="exampleFormControlTextarea1" placeholder="Enter your email" ></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Phone No</label>
                <textarea class="form-control" name="phone" id="exampleFormControlTextarea1" placeholder="Enter your phone number" ></textarea>
            </div>




            <button type="submit" class="btn btn-warning"> Submit </button>
        </form>

<br><br>



        <h1>
           Your Data will insert here!!
        </h1>


        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First name</th>
                    <th scope="col">Last name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone No</th>
                </tr>
               
                
            </thead>
            <tbody>


                <?php

                $select = "Select * from data ";
              

                $listresult = mysqli_query($con, $select); 

                while ($row = mysqli_fetch_assoc($listresult))    ?> 
                    
                


                <th scope="row">     </th>
                <td scope="row">    </td>
                <td scope="row">    </td>
                <td scope="row">    </td>
                <td scope="row">    </td>
         
                <td>
                    <button type="button" class="btn btn-primary">Edit</button>
                    <button type="button" class="btn btn-secondary">Delete</button></td>
                 </tr> 
            
                    
          
                     
                

               



            


            </tbody>
        </table>










    </div>














    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>






</body>
</html>