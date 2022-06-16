<h1>Basic information related to laravel syntax</h1>
@php $name="shailesh"; @endphp
{{"My name is ". $name}}
{{--$name--}}
<h2>If else</h2>
    <?php //$x=10; ?>
    @php $x=1; @endphp
@php /* @endphp
    @if($x==5)
            {{"Number is Equal to 5"}}
    @elseif($x>5)
        {{"Greater than 5"}}
    
    @else
        {{"Less than 5"}}
    @endif
@php */ @endphp
<h2>for loop</h2>
@for($x=0; $x<10; $x++)
    {{$x}}
@endfor
<h2>While loop</h2>
@php 
    $x=1;
@endphp
@while ($x<5)
    {{$x}}
    <?php $x++; ?>
@endwhile

<h2>for each loop</h2>
@php 
    //$arr=["name"=>"Shailesh","LastName"=>"Sharma"];
    $arr=array("name"=>"Shailesh", "Lastname"=>"Sharma");
@endphp
    @foreach($arr as $val)
        {{$val}}
    @endforeach

