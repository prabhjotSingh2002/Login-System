<?php
        $showError="";
       $showAlert=false;
        if($_SERVER['REQUEST_METHOD']=="POST"){
            include 'components/_dbconnect.php' ;
            $Username=$_POST["username"];
            $Password=$_POST["Password"];
            $CPassword=$_POST["CPassword"];
            echo  $Username." ," .$Password;
            // $exist=false;
            $existSql="SELECT * FROM `users` where `username`='$Username'";
            $result = mysqli_query($conn,  $existSql);
            if(mysqli_num_rows($result)>0){
                $showError=" username already exist";
              }
              else{
                  if( ($Password == $CPassword)){
                    // $hash = password_hash($password, PASSWORD_DEFAULT);
                    $sql ="INSERT INTO `users` ( `username`, `password`, `tp`) 
                     VALUES ( '$Username', '$Password', current_timestamp()) ";
                     $result = mysqli_query($conn,  $sql);
                      if($result){
                         $showAlert=true;
                       }else{
                        echo "error".mysqli_error($conn);
                        }
                   }
                   else{
                    $showError=" Password is incorrect";
                   }
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

    <title>SignUp</title>
  </head>
  <body>
      <?php
      require 'components/_nav.php' ;
      ?>
        <?php
            if($showAlert==true){
              echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Success</strong> Your account have been created successfully.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'  ;
            }
           if($showAlert==false && $showError!=''){
                echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong> Not Successfull</strong> '. $showError.'
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            }
        ?>


       <div class="container">
            <h1 class="text-centre">Sign Up to Our Website </h1>


            <form action="/LOGINSYSTEM/signup.php" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">username</label>
                    <input type="text" class="form-control" id="username" name="username" >
                </div>
                <div class="mb-3">
                    <label for="Password" class="form-label">Password</label>
                    <input type="password" class="form-control"  id="Password" name="Password">
                </div>
                <div class="mb-3">
                    <label for="CPassword" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="CPassword" name="CPassword">
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