@extends('backend.layouts.master_tem')

@section('title', 'Create Role')

@section('content')
    <div class="container">

        <div class="container" style="margin-bottom: 20px">
            <div style="text-align: justify">
                <a class="btn btn-secondary" href="{{route('users.index')}}">List of Users</a>
            </div>
            <h1 style="text-align:center;margin-bottom: 40px">Enter the info to Create the User</h1>

            {!! Form::open(['route'=>'users.store']) !!}

                @include('backend.admin.user.form')

            <div class="form-row">
                <div class="col text-center ">
                    <h4>
                        <label for="role_id">Role:</label>
                    </h4>
                </div>
                <div class="form-group col text-center" >
                    <select name="role_id" class="form-control" required id="role_id">
                        <option value="#">---------</option>
                        @foreach($roles as $role)
                            <option value="{{$role->id}}">{{$role->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-row form-group">
                <div class="col-4"></div>
                <div class="col-4 text-center">
                    {!! Form::submit('Submit',['class'=>['btn','btn-primary'] ]) !!}
                </div>
                <div class="col-4"></div>
            </div>
            {!! Form::close() !!}


        </div>


    </div>

@endsection
