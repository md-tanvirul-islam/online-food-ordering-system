@extends('backend.layouts.master_tem')
@section('title', 'Create Role')

@section('content')
    <div class="container" style="padding-bottom: 350px">

        <div class="container" style="margin-bottom: 20px">
            <div style="text-align: justify">
                <a class="btn btn-secondary" href="{{route('roles.index')}}">List of Roles</a>
            </div>
            <h1 style="text-align:center;margin-bottom: 40px">Enter the Name of a Role</h1>
            {!! Form::open(['route'=>'roles.store']) !!}

                @include('backend.admin.role.form')

                <div class="col-4 text-left">
                    {!! Form::submit('Submit',['class'=>['btn','btn-primary'] ]) !!}
                </div>

            {!! Form::close() !!}


        </div>


    </div>

@endsection
