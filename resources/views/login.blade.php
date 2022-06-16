<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

    <div class="form-group">
           <h1>Welcome to login page</h1> 
           <p> Enter any user id and password</p>
        <form action="User_Auth" method="POST">
        @csrf
        <input type="text" name="user_id" placeholder="Enter user id" class="form-control">
        <input type="password"  name="password" placeholder="Enter password" class="form-control">        
        <button type="submit" >Submit</button>
        </form>
    </div>


</div>
