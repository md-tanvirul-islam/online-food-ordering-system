@extends('backend.layouts.master_tem')

@section('content')
    <div class="container">

        <div class="container" style="margin-bottom: 20px">
            <div style="text-align: justify">
                <a class="btn btn-secondary" href="{{route('users.index')}}">List of Users</a>
            </div>
            <h1 style="text-align:center;margin-bottom: 40px">Edit the info of The User</h1>


            {!! Form::model($user,[
                            'route'=>['users.update',$user->id],
                            'method' => 'put'
                            ]) !!}

            @include('backend.admin.user.form')
            <div class="form-group form-row">
            <div class="col text-center ">
                <h4>
                    <label for="role_id">Role:</label>
                </h4>
            </div>
            <div class="col text-center" >
                <select name="role_id" class="form-control" required id="role_id">
                    <option value="{{$roleOfThisUser->id}}">{{$roleOfThisUser->name}}</option>
                    @foreach($roles as $role)
                        <option value="{{$role->id}}">{{$role->name}}</option>
                    @endforeach
                </select>
            </div>
            </div>



            <div class="form-row form-group">
                <div class="col-4"></div>
                <div class="col-4 text-center">
                    {!! Form::submit('Update',['class'=>['btn','btn-primary'] ]) !!}
                </div>
                <div class="col-4"></div>
            </div>
            {!! Form::close() !!}


        </div>

@endsection

