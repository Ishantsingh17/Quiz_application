<?php
include "../config.php";
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin </title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>

    <header>
    
        <h1>
            ADMIN LOGIN
        </h1>
        
    </header>    

    <nav>

        

        <a href="/login.php" class="food">Login wtih user</a>

    
    </nav>

    <main>
        <div class="container">
            <form action="" method="post">
            <h1 class="sign_up">Sign Up </h1>

            
        <div class="divi">  

            <i class="fa fa-user icon"></i>
            <p></p><input id="flex" type="text" name="username" placeholder="username"></p>

            
            
            </fieldset>

            
            
            <p><input id="flex" type="password" name="password" placeholder="password"></p>
            <p><button class="create" type="submit"  name="Submit1" >Sing In</button></p>
            <div class="alert" id="errormsg" style="display: none">
            <strong>Invalid !</strong> Invalid Username and Uassword.
            </div>
            

            
            
            
            
            


            
        </div>
            </form>
        </div>
        
        

    </main>

    


    

    
</body>
</html>

<?php

if(isset($_POST["Submit1"]))
{
    $count=0;
    $username=mysqli_real_escape_string($conn,$_POST["username"]);
    $password=mysqli_real_escape_string($conn,$_POST["password"]);

    $res=mysqli_query($conn,"SELECT * FROM admin_login WHERE username='$username' && password='$password'");
    $count=mysqli_num_rows($res);
    if($count==0)
    {
        ?>
        <script type="text/javascript">
            document.getElementById("errormsg").style.display="block";
        </script>    
        <?php
    } 
    else{
        ?>
        <script type="text/javascript">
            window.location="welcome.php";
        </script>    
        <?php

    }
}
?>

