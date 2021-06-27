@extends('layouts.backend_master')

{{-- @section('title', 'Department Info Edit') --}}

@include('backend.partials.form_css')

@section('content')
    <div class="container">
        <div class="card" style="color: black; margin-top:10px; width: 100%;">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-9">
                                <h3 class="card-title">{{ $food->name }}</h3>
                                {{-- <p class="card-text"><small> Please write a meaningful and reuseable name and description of Department</small></p> --}}
                            </div>
                            <div class="col-3" style="text-align: right">
                                <a class="btn btn-warning" style="color: black" href="{{route('food.index')}}" title="List of Food">
                                    <i class="fa fa-list-ol"></i> List
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                          <div class="col-4">
                            @role('admin')
                              <div class="row">
                                <div class="col font-weight-bold">Restaurnat Name</div>
                                <div class="col">:&nbsp{{ $food->restaurant->name }}</div>
                              </div><hr>
                            @endrole
                            <div class="row">
                              <div class="col font-weight-bold">Food Price($)</div>
                              <div class="col">:&nbsp{{ $food->price }}</div>
                            </div><hr>
                            <div class="row">
                              <div class="col font-weight-bold">Price Discount(%)</div>
                              <div class="col">:&nbsp{{ $food->discount_in_percent }}</div>
                            </div><hr>
                            <div class="row">
                              <div class="col font-weight-bold">Status</div>
                              <div class="col">:&nbsp{{ $food->is_active ? 'Active' : 'Inactive' }}</div>
                            </div><hr>
                            <div class="row">
                              <div class="col"><span class="font-weight-bold">Description :</span><br><p>{{ $food->description }}</p></div>
                            </div>
                          </div>
                          <div class="col-8">
                            @php $p_url = $food->getFirstMediaUrl('images'); @endphp

                            <label><b>Uploaded photo:</b></label>  

                            @if($p_url !== '')
                                <img src='{{ $p_url }}' style="width: 100%; height: auto" >  
                            @else 
                                <p class="text-danger"> <b> No photo was uploaded for this food!! </b> </p>  
                            @endif

                          </div>
                        </div>
                    </div>
        </div>
    </div>
@endsection

