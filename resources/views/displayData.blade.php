<h1>Passing Data on view page ==>{{$name}}</h1>
<p>{{"Ram is hero"}}</p>
@if ($name == "")
    <p>I have one record!</p>
@elseif ($name == "baba")
    <p>I have multiple records!</p>
@else
    <p>I don't have any records!</p>
@endif