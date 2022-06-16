{!! Form::open(['url' => 'foo/bar']) !!}

{!!  Form::text('username') !!}
{!!  Form::text('email', 'example@gmail.com') !!}
{!!  Form::password('password', ['class' => 'awesome']) !!}

checkbox

{!!  Form::checkbox('name', 'value') !!}

Radio Country name

{!!  Form::radio('country', 'India') !!}
{!!  Form::radio('country', 'Pakistan') !!}
{!!  Form::radio('country', 'ShriLanka') !!}

Number 

{!!  Form::number('name', 'value')   !!}

Date

{!! Form::date('name', \Carbon\Carbon::now()) !!}

Uploade
{!!   Form::file('image')  !!}

Dropdown Select 

{!! Form::select('size', ['L' => 'Large', 'S' => 'Small'], 'S') !!}\

Group Select 

{!!    Form::select('animal',[
    'Cats' => ['leopard' => 'Leopard','ca'=>'caa'],
    'Dogs' => ['spaniel' => 'Spaniel'],
])  !!}

{!! Form::selectRange('number', 10, 20) !!}

{!!    Form::selectMonth('month') !!}

{!! Form::submit('Submit Data') !!}

{!! Form::close() !!}