<!DOCTYPE HTML>
<html>
<head>
    <title>PDO - Read One Record</title>
 
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
 
 
    <!-- container -->
    <div class="container">
  
        <div class="page-header">
            <h1>Read Product</h1>
        </div>
         
        <!-- dynamic content will be here -->
<?php
// get passed parameter value, in this case, the record ID
// isset() is a PHP function used to verify if a value is there or not
$id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');
 
//include database connection
include 'config/database.php';
 
// read current record's data
try {
    // prepare select query
    //for limit details http://dba.stackexchange.com/questions/105850/is-there-any-difference-between-limit-0-1-and-limit-1
    $query = "SELECT id, name, description, price FROM products WHERE id = ? LIMIT 0,1";
    $stmt = $con->prepare( $query );
 
    // this is the first question mark
    $stmt->bindParam(1, $id);
 
    // execute our query
    $stmt->execute();
 
    // store retrieved row to a variable
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    // values to fill up our form
    $id= $row['id'];
    $name = $row['name'];
    $description = $row['description'];
    $price = $row['price'];
}
 
// show error
catch(PDOException $exception){
    die('ERROR: ' . $exception->getMessage());
}
?>


<!--we have our html table here where new user information will be displayed-->
<table class='table table-hover table-responsive table-bordered'>
    <tr>
        <td class='info'>ID</td>
        <td><?php echo $id; ?> </td>
    </tr>
    <tr>
        <td class='info'>Name</td>
        <td><?php echo htmlspecialchars($name, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td class='info'>Description</td>
        <td><?php echo htmlspecialchars($description, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td class='info'>Price</td>
        <td><?php echo htmlspecialchars($price, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td></td>
        <td >
            <a href='read.php' class='btn btn-danger'>Back to read products</a>
        </td>
    </tr>
</table>
        <!-- dynamic content will be here -->
 
    </div> <!-- end .container -->
     
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="include/js/jquery.min.js"></script>
  
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="include/js/bootstrap.min.js"></script>
 
</body>
</html>