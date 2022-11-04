<?php
require("db-functions.php");     
require("connect-db.php");     
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  if (!empty($_POST['btnAction']) && $_POST['btnAction'] =='create_account') 
  {
      $result = addAccount($_POST['username'], $_POST['firstName'], $_POST['lastName'], $_POST['email'], $_POST['address']);
      // debug_to_console($result);  
      
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="your name">
  <meta name="description" content="include some description about your page">      
  <title>Create Account</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body>


<div class="container">
  <h1>Creat Your Account Below</h1>  

<form name="mainForm" action="createAccount.php" method="post">   
  <div class="row mb-3 mx-3">
    Enter Username:
    <input type="text" class="form-control" name="username" maxlength="20" required/>            
  </div>  
  <div class="row mb-3 mx-3">
    First Name:
    <input type="text" class="form-control" name="firstName" maxlength="20" required/>         
  </div> 
  <div class="row mb-3 mx-3">
    Last Name:
    <input type="text" class="form-control" name="lastName" maxlength="20" required/>         
  </div> 
  <div class="row mb-3 mx-3">
    Email Address:
    <input type="email" class="form-control" name="email" name="email" maxlength="35" required>  
  </div> 
  <div class="row mb-3 mx-3">
    Home Address:
    <input type="text" class="form-control" name="address" maxlength="50" required/>         
  </div> 
  <!-- <div class="row mb-3 mx-3"> -->
  <div>            
    <input type="submit" value="create_account" name="btnAction" class="btn btn-primary" 
           title="Create Account" />            
  </div>  

</form>   

</div>    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>