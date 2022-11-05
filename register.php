<?php
require_once "config.php";
$username=$password=$confirm_password="";
$username_err=$password_err=$confirm_password_err="";

if($_SERVER['REQUEST_METHOD']=="POST"){
     
    //check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Username cannot be blank";

    }
    else{
        $sql = "SELECT id FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn,$sql);
        if($stmt)
        {
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            //set the value of param username
            $param_username = trim($_POST['username']);

            //Try to execute this statement
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt)==1)
                {
                    $username_err="this username is already taken";
                }
                else{
                    $username = trim($_POST['username']);
                }
            }
            else{
                echo "something went wrong";
            }
        }
    }
  


// check for password
if(empty(trim($_POST['password']))){
    $password_err = "Password cannot be blank";

}
elseif(strlen(trim($_POST['password']))<5){
    $password_err= "Password cannot be less than 5 characters";
}
else{
    $password = trim($_POST['password']);

}

//check for confirm password field
if(trim($_POST['password'])!= trim($_POST['confirm_password'])){
    $password_err = "Passwords should match";
} 

//If there were no errors, go ahead and insert into the database
if(empty($username_err) && empty($password_err) && empty($confirm_password)){
    $sql=" INSERT INTO users (username,password) VALUES (?,?)";
    $stmt=mysqli_prepare($conn,$sql);
    if($stmt)
    {
        mysqli_stmt_bind_param($stmt , "ss", $param_username,$param_password);
         //set those parameters
         $param_username=$username;
         $param_password=password_hash($password,PASSWORD_DEFAULT);

                  //Try to execute the query 
                  if(mysqli_stmt_execute($stmt))
                  {
                     header("location: login.php");
         
                  }
                  else{
                     echo "Something went wrong... cannot redirect !";
                  }

                  mysqli_stmt_close($stmt);

                  
             }
             
             
             
             
             

         
    }

  
  
    

    


    mysqli_close($conn,$query);

}





?>







<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <title>PHP login system</title>
    <style>

        *{
            box-sizing: border-box;
        }
        nav{

            color:yellow;
            background-color: #333;
            overflow: hidden;
        }
        nav a {
                text-decoration: none;
                padding: 20px;
                text-align: center;
                float: left;
                color: white;
            }

            .food:hover{
              color: yellow;
            }
        nav a:visited{
            color: tomato;
            }

            .container{
                background-color: #f2f2f2;
                padding: 5px 20px 15px 20px;
                border: 1px solid lightgrey;
                border-radius: 4px;
             }
            input[type="text"],
            input[type="number"],
            input[type="date"],
            input[type="password"],
            input[type="email"],
            select,
            textarea {
                width: 100%;
                padding: 12px;
                border: 1px solid #ccc;
                border-radius: 5px;
                margin: 10px;
            }

            fieldset{
                background-color: #fff;
                border: 1px solid #ccc;
            }

            .main_heading{
                text-align: center;
            }

            input[type="submit"]{
                background-color: rgb(103, 239, 18);
                border: none;
                padding: 12px 20px;
                border-radius: 4px;
                width: 100%;
                cursor:pointer;

            }
            input[type="submit"]:hover{
                background-color: lightgreen
            }

    

    </style>
  </head>
  <body>
    <div class = "container">
        
    <nav>

        <a href="#" class="food">PHP LOGIN SYSTEM</a>
        
        <a href="#" class="food">home</a>
        <a href="#" class="food">About us</a>
        <a href="/login.php" class="food">Login/signUp</a>

    
    </nav>
    </div>
    <div class="container">
        <form action="" method="post">
            <h1 class="main_heading">Please Register Here </h1>
            <h2>Contact Information</h2>
            <p>
                required field is marked by *
            </p>
            <p>username: <input type="text" name="username" placeholder="oom prakash" ></p>
            

            <p>
                Address: <textarea name="address" cols="90" rows="5" placeholder="address"></textarea>    

            </p>
            <p>password * <input type="password" name="password" id="password"   > </p>
            <p>confirm Password: * <input type="password" name="confirm_password" id="password"  ></p>
            <fieldset>
                <legend>Gender *</legend>

            <p>
                Male <input type="radio" name="gender" id="male" >
                Female <input type="radio" name="gender" id="female" >

            </p>

            <p>Profile: <input type="text" name="profile" placeholder="student/teacher" ></p>
            
            </fieldset>

            <p>
                <input type="submit" name="submit" value="Register Now" >
            </p>
        </form>
        </div>    
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>