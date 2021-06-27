@extends('layouts.backend_master')
{{-- @section('title', 'Doctor Info Edit') --}}
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
                                    <h3 class="card-title">Edit the category info </h3>
                                    <p class="card-text"><small> Please enter valid info</small></p>
                                </div>
                                <div class="col-3" style="text-align: right">
                                    <a class="btn btn-warning" style="color: black" href="{{route('categories.index')}}" title="List of Categories">
                                        <i class="fa fa-list-ol"></i> List
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm">
                                    {!! Form::model($category,[
                                        'route'=>['categories.update',[$category->id]],'files'=>true,
                                        'method' => 'put'
                                        ]) !!}

                                    @php $p_url = $category->getFirstMediaUrl('images'); @endphp

                                    @include('backend.crud.category.form')

                                            <!--after from blade code -->
                                                <label><b>Uploaded photo:</b></label>  
                                                @if($p_url !== '')
                                                    <img src='{{ $p_url }}' style="width: 100%; height: auto" >  
                                                @else 
                                                    <p class="text-danger"> <b> No photo was uploaded for this category!! </b> </p>  
                                                @endif

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                @if ($p_url !== '')
                                                    <div>
                                                        <label for="image"><b>Select a photo to change the uploaded photo:</b></label> 
                                                    </div>
                                                @else
                                                    <div>
                                                        <label for="image"><b>Please Upload a photo:</b></label>  
                                                    </div>
                                                @endif
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