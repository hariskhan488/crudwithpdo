<!DOCTYPE HTML>
<html>
<head>
    <title>PDO - Create a Record - PHP CRUD</title>
     
    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="include/css/bootstrap.min.css" />
  
    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<style> 
.form-data {
    padding-top: 100px;
    width:50%;
    margin: auto;
    padding:10px;
    border: 1px solid black;
    border-radius: 15px;
    
}
.container {
    margin-top:200px;

}
.btn-success {

    width:150px;
    margin-top: 10px;
}
</style>
         
</head>
<body>
<div class="container">
<div class="form-data">
<h1 class="text-success text-center"> Login </h1>

    <form action="auth.php" method="post">
    <label for="usr" class="text-success" style="font-size: 15px;">User:</label>
    <input name="username" class="form-control" type="text" placeholder="name">
    <label for="pwd" class="text-success" style="font-size: 15px;">Password:</label>
    <input name="password"  class="form-control" type="password" placeholder="*******"> 
    <input type="submit" name="submit" class="btn btn-success">
    </form>
</div>

</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="include/js/jquery.min.js"></script>
  
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="include/js/bootstrap.min.js"></script>
 
</body>
</html>