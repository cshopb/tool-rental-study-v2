<!--
csrf means Cross Site Request Forgery
this command will add a hidden value to the form and
Laravel will protect us. The field will look like this:
<input type="hidden" name="_token" value=" csrf_token(); ">
the csrf_token is generated for us.
-->
{!! csrf_field() !!}

<div class="form-group">
    {!! Form::label('email', 'Email:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-8 text-center">
        {!! Form::input('email', 'email', old('email') , ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('password', 'Password:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-8 text-center">
        {!! Form::input('password', 'password', null, ['class' => 'form-control']) !!}
    </div>
</div>