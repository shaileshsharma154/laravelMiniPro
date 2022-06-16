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
<div class="row">
    <div class="form-group">
    <form action="" class="col-9">
       
        <input type="text" name="search" placeholder="Search by name or Email"  class="form-control" value="{{$search}}"> 
        <button  class="btn btn-success">Search</button>
        <a href="{{url('/CustomerView')}}">
            <button type="button" name="reset" class="btn btn-primary">Reset </button>
        </a>
    </form>
</div>
</div>

<a href="{{url('/customerForm')}}">
    <button  class="btn btn-primary">Add Customer</button>
</a>


@php
/*
<pre>
  {{print_r($customers)}}
</pre>
*/
@endphp
<h2>Cutomer List Details</h2>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Country</th>
                <th>State</th>
                <th>City</th>
                <th>Status</th>
                <th>Action</th>
            </tr>               
        </thead>
        <tbody>
    
            @foreach($customers as $custom)
            <tr>
                <td> {{$custom->name}} </td>
                <td> {{$custom['email']}} </td>
                <td> {{$custom->country}} </td>
                <td> {{$custom->state}} </td>
                <td> {{$custom->city}} </td>
                <td>
                    @if($custom->status=="1")
                       <button class="btn btn-success"> {{"active"}} </button>
                    @else
                        <button class="btn btn-danger">{{"Inactive"}} </button>
                    @endif
                </td>
                <td>
                    <a href="{{url('/customerDel')}}/{{$custom->customer_id}}"><button class="btn btn-danger">Delete</button></a>
                </td>

                <td>
                    <a href="{{url('/customerEdit')}}/{{$custom->customer_id}}"><button class="btn btn-primary">Edit</button>
                </td>
            </tr>
            @endforeach
        </tbody>   
    </table>
    <div class="row">
       <?php /* {{$customers->links()}} */ ?>
    </div>
</div>

</body>
</html>