<div class="form-row form-group">
    <div class="col text-center ">
        <h4>
            {!! Form::label('name','Full Name:') !!}
        </h4>
    </div>
    <div class="form-group col text-center" >
        {!! Form::text('name',null,['class'=>'form-control','required']) !!}
    </div>
</div>

<div class="form-row form-group">
    <div class="col text-center ">
        <h4>
            {!! Form::label('email','Email:') !!}
        </h4>
    </div>
    <div class="form-group col text-center" >
        {!! Form::email('email',null,['class'=>'form-control','required']) !!}
    </div>
</div>

<div class="form-row form-group">
    <div class="col text-center ">
        <h4>
            {!! Form::label('password','Password:') !!}
        </h4>
    </div>
    <div class="form-group col text-center" >
        {!! Form::password('password', ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-row form-group">
    <div class="col text-center ">
        <h4>
            {!! Form::label('password_confirmation','Confirm Password:') !!}
        </h4>
    </div>
    <div class="form-group col text-center" >
        {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
    </div>
</div>



