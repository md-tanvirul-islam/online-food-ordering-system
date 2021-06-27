@extends('backend.layouts.master_tem')

@section('title', 'Admin: User List')

@section('content')

    <div class="container " style="margin-top: 50px;margin-bottom: 200px">
        <div class="row">
            <div class="col"> </div>
            <div class="col"> <h3 class="text-info" style="text-align: center;margin-bottom: 20px"> {{$user->name}} Profile</h3> </div>
            <div class="col"></div>
        </div>

        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col" style="text-align: center">
                        <img src='{{asset("uploads\profiles")}}\{{$profile?$profile->photo:"Not Available"}}' alt="" style="height:250px;width:200px;">
                    </div>
                </div>

                <div class="row">
                    <div class="col" style="text-align: center">
                        <a style="color: black;margin-top: 5px" href="#" class="btn btn-warning">Change Photo</a><br>
                        <a style="color: black;margin-top: 3px" href="#" class="btn btn-danger">Remove Photo</a>
                    </div>
                </div>

            </div>
            <div class="col" style="font-size: 20px">
                <div class="row">
                    <div class="col">
                        <span class="text-dark font-weight-bold"> Name</span>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <span class="text-dark font-weight-bold"> Email</span>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <span class="text-dark font-weight-bold"> Phone</span>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <span class="text-dark font-weight-bold"> Birth Date</span>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <span class="text-dark font-weight-bold"> Country</span>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <span class="text-dark font-weight-bold"> City</span>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <span class="text-dark font-weight-bold"> Local Address</span>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <span class="text-dark font-weight-bold"> Nationality</span>
                    </div>
                </div>

            </div>
            <div class="col text-dark" style="font-size: 20px">
                <div class="row">
                    <div class="col">
                        <span> {{$user->name}}</span>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <span> {{$user->email}}</span>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <span> {{$user->phone}}</span>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <span> {{$profile?$profile->birth_date:"Not Available"}}</span>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <span> {{$profile?$profile->country:"Not Available"}}</span>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <span> {{$profile?$profile->city:"Not Available"}}</span>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <span> {{$profile?$profile->local_address:"Not Available"}}</span>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <span> {{$profile?$profile->nationality:"Not Available"}}</span>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
