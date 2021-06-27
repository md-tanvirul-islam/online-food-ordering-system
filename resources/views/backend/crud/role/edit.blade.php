@extends('backend.layouts.master_tem')
@section('content')
    <div class="container">

        <div class="container" style="margin-bottom: 20px">
            <div style="text-align: justify">
                <a class="btn btn-secondary" href="{{route('roles.index')}}">List of Roles</a>
            </div>
            <h1 style="text-align:center;margin-bottom: 40px">Edit the info of The Roles</h1>
            

            {!! Form::model($role,[
                            'route'=>['roles.update',$role->id],
                            'method' => 'put'
                            ]) !!}

            @include('backend.admin.role.form')



            <div class="col-4 text-left">
                {!! Form::submit('Update',['class'=>['btn','btn-primary'] ]) !!}
            </div>

        </div>

        {!! Form::close() !!}

    </div>

@endsection

