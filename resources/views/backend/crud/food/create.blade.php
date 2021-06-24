@extends('layouts.backend_master')

@push('css')
<style>
    input, select, option, textarea{
        color: #000000 !important;
        font-weight: bold !important;
        border-color: #000000  !important;
        border-style: solid !important;
        border-width: 1px !important;
    }
    textarea:focus, input:focus {
        color: #000000c5 !important;
        font-weight: bold !important;
    }
    input::placeholder, textarea::placeholder{
        color: #000000b2 !important;
        /* font-weight: bold !important; */
    }
</style>
@endpush

@section('content')
        <div class="container">
            <div class="card" style="color: black; margin-top:10px;  width: 100%;">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-9">
                                    <h3 class="card-title">Add Food</h3>
                                    <p class="card-text"><small> Please enter valid food info</small></p>
                                </div>
                                <div class="col-3" style="text-align: right">
                                    <a class="btn btn-warning" style="color: black" href="{{route('food.index')}}" title="List of food">
                                        <i class="fa fa-list-ol"></i> List
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm">
                                    {!! Form::open(['route'=>'food.store','files'=>true]) !!}

                                        
                                    @include('backend.crud.food.form')
        

                                        <div class="form-row">
                                            <div class="col-4 text-right">
                                                {!! Form::label('image','Upload Food Image:') !!} 
                                            </div>
                                            <div class="col-4 text-right"> 
                                                {!! Form::file('image') !!}
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-row">
                                            <div class="col-md-12 mb-3" style="text-align: center"> 
                                                <button  style= "color:white" class="btn btn-info" > <i class="fa fa-paper-plane" aria-hidden="true"></i> Submit </button>
                                            </div>
                                        </div>
                                    
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
            </div>
        </div>

@endsection