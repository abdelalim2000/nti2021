<?php
    session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


</head>
<body>
<div class="container">
<center> <h1> Exam Online MUST Univeristy </h1></center>
<br/>
    <form method="post">
        <input type="text" name="txtname" placeholder="Please Enter Your Name" class="form-control"/>
        <br/>
        <input type="password" name="txtpass" placeholder="Please Enter Your Password" class="form-control"/>
        <br/>
        <input type="submit" name="btnstart" value="Start Exam" class="btn btn-success" />

        <?php
            if(isset($_POST["btnstart"])){
                if($_POST["txtpass"]=="abc123")
                {
                    $_SESSION["name"]=$_POST["txtname"];
                    header("location:Examonline.php");        
                }
                else{
                    echo("<script> alert('Invaild Exam Password'); </script>");
                }
            }
        ?>
    </form>
</div>
</body>
</html>