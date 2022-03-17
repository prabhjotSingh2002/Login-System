<?php
 $login = false;
 $showError = false;
        if($_SERVER['REQUEST_METHOD']=="POST"){
            include 'components/_dbconnect.php' ;
            $Username=$_POST["username"];
            $Password=$_POST["Password"];
            // echo  $Username." ," .$Password;
            $exist=false;
             $sql ="SELECT * FROM `users` WHERE `username`= '$Username' ";
             $result = mysqli_query($conn,  $sql);
             $num=mysqli_num_rows($result);
            
            //  header('location: welcome.php');
             if($num==1){
                // echo var_dump(mysqli_fetch_assoc($result));
               while($row=mysqli_fetch_assoc($result)){
                //    echo ".check ".var_dump(password_verify($Password, $row['password']));
                //    if(password_verify( $Password, $row['password']))
                   if($Password==$row['password']){
                       $login=true;
                       session_start();
                       $_SESSION['loggedin']=true;
                       $_SESSION['username']=$Username;
                       echo var_dump(mysqli_fetch_assoc($result));
                       echo  $_SESSION['username'];
                       header('location: welcome.php');
                   }else{
                       $showError="Invalid credential";
                   }
               }
             }else{
                $showError="Invalid credential";
              }

        
        }
    
 ?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>LOGIN</title>
</head>

<body>
    <?php
      require 'components/_nav.php' ;
      ?>
      
      <?php
    if($login){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You are logged in
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    header('location: welcome.php');
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }
    ?>


       <div class="container">
            <h1 class="text-centre">Login to Our Website </h1>


            <form action="/LOGINSYSTEM/login.php" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">username</label>
                    <input type="text" class="form-control" id="username" name="username" >
                </div>
                <div class="mb-3">
                    <label for="Password" class="form-label">Password</label>
                    <input type="password" class="form-control"  id="Password" name="Password">
                </div>
              
   
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>



        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>