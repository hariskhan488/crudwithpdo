<?php 
session_start();
if(isset($_SESSION["users"]))
{
?>
    


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
         
</head>
<body>
 <?php
if($_POST){
 
    // include database connection
    include 'config/database.php';
 
    try{
     
        // insert query
        $query = "INSERT INTO products SET name=:name, description=:description, price=:price, created=:created";
 
        // prepare query for execution
        $stmt = $con->prepare($query);
 
        // posted values
        //htmlspecialchars — Convert special characters to HTML entities 
        //strip_tags — Strip HTML and PHP tags from a string
        //more details http://php.net/manual/en/function.strip-tags.php

        $name=htmlspecialchars(strip_tags($_POST['name']));
        $description=htmlspecialchars(strip_tags($_POST['description']));
        $price=htmlspecialchars(strip_tags($_POST['price']));
 
        // Binds a parameter to the specified variable name
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
         
        // specify when this record was inserted to the database
        $created=date('Y-m-d H:i:s');
        $stmt->bindParam(':created', $created);
         
        // Execute the query
        if($stmt->execute()){
            echo "<div class='alert alert-success'>Record was saved.</div>";
        }else{
            echo "<div class='alert alert-danger'>Unable to save record.</div>";
        }
         
    }
     
    // show error
    catch(PDOException $exception){
        die('ERROR: ' . $exception->getMessage());
    }
}

?>
    <!-- container -->
    <div class="container">
      
        <div class="page-header">
            <h1>Create Product</h1>
              <!-- html form here where the product information will be entered -->
<form action='create.php' method='post'>
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td class="bg-success">Name</td>
            <td><input type='text' name='name' class='form-control' /></td>
        </tr>
        <tr>
            <td class="bg-success">Description</td>
            <td><textarea name='description' class='form-control'></textarea></td>
        </tr>
        <tr>
            <td class="bg-success">Price</td>
            <td><input type='text' name='price' class='form-control' /></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save' class='btn btn-primary' />
                <a href='read.php' class='btn btn-danger'>Back to read products</a>
            </td>
        </tr>
    </table>
</form>
        </div>
     
    <!-- dynamic content will be here -->
         
    </div> <!-- end .container -->
     
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="include/js/jquery.min.js"></script>
  
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="include/js/bootstrap.min.js"></script>
 
</body>
</html>
<?php

}

else {
    header("location: index.php?id=error&v=hey please be login to acces the page ");
}
?> 