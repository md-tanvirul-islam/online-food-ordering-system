<div class="form-row">
    <div class="col-4 text-right ">
        <h4>
            {!! Form::label('name','Role Name:') !!}
        </h4>
    </div>
    <div class="form-group col-4 text-center" >
        {!! Form::text('name',null,['class'=>'form-control','required']) !!}
    </div>
