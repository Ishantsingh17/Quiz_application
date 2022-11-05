<?php
session_start();
if(!isset($_SEESSION["username"]))
{
    ?>
    <script type="text/javascript">
        window.location="login.php";
    </script>    
    <?php
}
?>
<?php
include "header.php";
?>
<html>
<head>
<body>
  
    <style>
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




 <div class="test">



 </div>
 </body>  
</head>  
</html>


            





<script type="text/javascript">

    function set_exam_type_session(exam_category)
    {
        var xmlhttp= new XMLHttpRequest();
        xmlhttp.onreadystatechange=function(){
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200){

                
                window.location="dashboard.php";
            }
        };
        xmlhttp.open("GET","forajax/set_exam_type_session.php?exam_category=" + exam_category,true);
        xmlhttp.send(null);
    }
</script>



