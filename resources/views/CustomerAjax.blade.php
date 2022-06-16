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

<div id="message"></div>

<div class="container">

  
  <form id="frm">
     @csrf
    <div class="form-group">
      <label for="name">Name:</label> 
      <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" required>
    </div>

    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
     
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" required >
      
    </div>

    <div class="form-group">
      <label for="country">country:</label>
      <input type="text" class="form-control" id="country" placeholder="Enter country" name="country" required>
      
    </div>

    <div class="form-group">
      <label for="state">state:</label>
      <input type="text" class="form-control" id="state" placeholder="Enter state" name="state" required>
     
    </div>

    <div class="form-group">
      <label for="city">city:</label>
      <input type="text" class="form-control" id="city" placeholder="Enter city" name="city" >
    
    </div>
    
    <input type="submit" name="submit" id="frmSubmit">
    
  </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    $("#frm").submit(function(e) { 
        e.preventDefault();
        //alert("test");
        jQuery.ajax({
            url:"{{url('CustomerAjaxForm')}}", 
            data:jQuery("#frm").serialize(),
            type:'post',
            success:function(result){
                //console.log(result);
                jQuery('#message').html(result.msg);
                jQuery('#frm').['0'].reset();
            }
        })
    });
</script>

</body>
</html>
