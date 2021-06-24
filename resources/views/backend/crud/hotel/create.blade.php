@extends('backend.layouts.master_tem')
@section('content')

    <div class="container-fluid">


        <h1 style="text-align:center">Enter The Hotel Information and Complete the Hotel Profile</h1>

        <div class="container" style="margin-bottom: 20px">

            {!! Form::open(['route'=>'hotel_lists.store','files' => true]) !!}

                @include('backend.admin.hotel.form')
            <div class="form-row">
                <div class="form-group col-6">
                    <label for="photo">Hotel Picture</label>
                    <input type="file" class="form-control" name="photo" id="photo" required>

                </div>
            </div>

            <div class="form-row">
                <div class="col-4 text-center"></div>
                <div class="col-4 text-center">
                    {!! Form::submit('Register A Hotel',['class'=>['btn','btn-primary'] ]) !!}
                </div>
                <div class="col-4 text-center"></div>

            </div>


            {!! Form::close() !!}
        </div>
    </div>
@endsection
