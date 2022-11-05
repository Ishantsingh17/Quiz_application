<?php

include "../config.php";
?>
<!DOCTYPE html>
<head>
    <title>
        QUIZ APPLICATION
    </title>

    <link rel="stylesheet" href="exam_user.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />



</head>
<style>
    .material-symbols-outlined {
      font-variation-settings:
      'FILL' 0,
      'wght' 400,
      'GRAD' 0,
      'opsz' 48
    }
    * {
    box-sizing: border-box;
}

body {
    margin: 0px;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
}

header h1 {
    text-align: center;
    font-size: 40px;
    color: white;
}

header {
    padding: 40px;
    background-color: rgb(17, 124, 143);
}

nav{
    color:yellow;
    background-color: #333;
    overflow: hidden;
}
.food:hover{
    color: yellow;
}

nav a {
    text-decoration: none;
    padding: 20px;
    text-align: center;
    float: left;
    color: white;
}
nav a:visited{
    color: tomato;
}

main {
    background-color: white;
    text-align: center;
}

.pic:hover{
    color: brown;
    text-decoration: none;
}

h2 {
    padding: 20px;
}

section:nth-child(even) {
    background-color: rgb(241, 241, 241);
}

section {
    min-height: 100vh;
}

video {
    padding: 10px;
}

iframe {
    height: 75vh;
}

img {
    padding: 10px;
}

section h5 {
    margin: 40px;
}

footer {
    background-color: #333;
    overflow: hidden;
}

footer a {
    text-decoration: none;
    padding: 20px;
    text-align: center;
    float: left;
    color: white;
}


.material-symbols-outlined {
    font-variation-settings:
    'FILL' 0,
    'wght' 400,
    'GRAD' 0,
    'opsz' 48
  }
  .row{
    background-color:lightgrey;
    height:50px;
    text-align:left;


  }
  .test{
    background-color:lightgrey;
    height:800px;
    margin:200px;
  }

  .create{
          border-radius: 6px;
          background-color: rgb(47, 177, 47);
          width: 1110px;
          height: 50px;
          margin-left: 4px;
          color: white;
          font-weight: bold;
          font-size: 18px;
          border: 1px solid #ccc;
      }

    </style>

<body>
    <header>
    
        <h1>
            Quiz Application
        </h1>
    </header>    

    <nav>

        <a href="#" class="food">Select exam</a>
        <a href="#" class="food">Last Results</a>
        <a href="/logout.php" class="food">Logout</a>
       

    
    </nav>
    <main>
       
        <div class="row">
        <ul>
            <li>
                <div id="countdowntimer" style="display: block;">
                </div> 
        
            </li>
       </ul>  
       </div>  
        <br>
        <br>
        <br>
       
       
    </main>

 
</body>    

<script type="text/javascript">
    setInterval(function(){
        timer();
    },1000);    
    
    function timer()
    {
        var xmlhttp= new XMLHttpRequest();
        xmlhttp.onreadystatechange=function(){
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
               if(xmlhttp.responseText=="00:00:01")
               {

                 
                 window.location="result.php";
               }
               document.getElementById("countdowntimer").innerHTML=xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","forajax/load_timer.php",true);
        xmlhttp.send(null);
    }
</script>