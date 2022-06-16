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
@if(session('message'))
   <div class="alert alert-success">
    {{session('message') }}
</div>

@endif

  <h2>{{$title}}</h2>
  
  <form action="{{$url}}" method="POST">
      @csrf
     <?php 
       // print_r($errors->all());  //for all error
      //echo Form::radio('category_id', '1');
     ?>
     
    <div class="form-group">
      <label for="name">Name:</label> 
      <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" value="{{ isset($customers->name) ? $customers->name : '' }}">
      @error('name')
       <div class="text-danger"> {{ $message }} </div>
      @enderror
    </div>

    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="{{ isset($customers->email) ? $customers->email : '' }}">
      @error('email')
       <div class="text-danger"> {{ $message }} </div>
      @enderror
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" >
      @error('pwd')
        <div class="text-danger">{{$message}}</div>
      @enderror
    </div>

    <div class="form-group">
      <label for="country">country:</label>
      <input type="text" class="form-control" id="country" placeholder="Enter country" name="country" value="{{ isset($customers->country) ? $customers->country : '' }}">
      @error('country')
       <div class="text-danger"> {{ $message }} </div>
      @enderror
    </div>

    <div class="form-group">
      <label for="state">state:</label>
      <input type="text" class="form-control" id="state" placeholder="Enter state" name="state" value="{{ isset($customers->state) ? $customers->state : '' }}">
      @error('state')
       <div class="text-danger"> {{ $message }} </div>
      @enderror
    </div>

    <div class="form-group">
      <label for="city">city:</label>
      <input type="text" class="form-control" id="city" placeholder="Enter city" name="city" value="{{ isset($customers->city) ? $customers->city : '' }}">
      @error('city')
       <div class="text-danger"> {{ $message }} </div>
      @enderror
    </div>
    
    <button type="submit" class="btn btn-default">Submit</button>
    <button type="reset" class="btn btn-primary" onclick="window.location.href = '{{url('/')}}' " target="_blank">Back</button>
  </form>
</div>

</body>
</html>
