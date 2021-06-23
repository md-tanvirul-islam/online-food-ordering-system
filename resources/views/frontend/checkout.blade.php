@push('name')
    <style>
        input {
            color: black !important;
        }
    </style>    
@endpush

@extends('layouts.frontend_master')

@section('content')
    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Latest Categories</span>
                        </div>
                        <ul>
                            @forelse ($latestCategories as $key => $value)
                                <li><a href="{{ route('searchBy.category',[$key]) }}">{{ $value }}</a></li> 
                            @empty
                                <li><a href="#" class="text-danger">Please search by Restaurant </a></li> 
                            @endforelse
                            @if (count($latestCategories))
                                <li><a class="text-primary" href="#">All categories</a></li> 
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    Latest Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+65 11.188.888</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('ui/frontend/img/breadcrumb.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Checkout</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <h4>Your Billing Details</h4>
                {{ Form::open(['route' => 'cart.order']) }}
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="checkout__input">
                                        <p>Full Name<span>*</span></p>
                                        {{ Form::text('name',$authUser->name) }}
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Country<span>*</span></p>
                                {{ Form::text('country',$authUser->profile->address->country ?? null) }}
                            </div>
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                {{ Form::text('holding_no',$authUser->profile->address->holding ?? null,['placeholder'=>'Apartment, suite, unite ect (optinal)']) }}
                                {{ Form::text('street',$authUser->profile->address->street ?? null,['class'=>['checkout__input__add'],'placeholder'=>'Street Address']) }}

                            </div>
                            <div class="checkout__input">
                                <p>Division<span>*</span></p>
                                {{ Form::text('division',$authUser->profile->address->division ?? null) }}
                            </div>
                            <div class="checkout__input">
                                <p>District<span>*</span></p>
                                {{ Form::text('district',$authUser->profile->address->district ?? null) }}
                            </div>
                            <div class="checkout__input">
                                <p>Thana<span>*</span></p>
                                {{ Form::text('thana',$authUser->profile->address->thana ?? null) }}
                            </div>
                            <div class="checkout__input">
                                <p>Postcode / ZIP<span>*</span></p>
                                {{ Form::text('post_code',$authUser->profile->address->post_code ?? null) }}
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        {{ Form::text('phone',$authUser->phone) }}
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        {{ Form::text('email',$authUser->email) }}
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="diff-acc">
                                    Ship to a different address?
                                    <input type="checkbox" name="diff_acc_check_box" id="diff-acc">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div id="different-address">
                                <span class="font-weight-bold">Please Enter the receiver address</span>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="checkout__input">
                                            <p>Full Name<span>*</span></p>
                                            {{ Form::text('diff_name',null) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="checkout__input">
                                    <p>Country<span>*</span></p>
                                    {{ Form::text('diff_country', null) }}
                                </div>
                                <div class="checkout__input">
                                    <p>Address<span>*</span></p>
                                    {{ Form::text('diff_holding_no', null,['placeholder'=>'Apartment, suite, unite ect (optinal)']) }}
                                    {{ Form::text('diff_street', null,['class'=>['checkout__input__add'],'placeholder'=>'Street Address']) }}
    
                                </div>
                                <div class="checkout__input">
                                    <p>Division<span>*</span></p>
                                    {{ Form::text('diff_division', null) }}
                                </div>
                                <div class="checkout__input">
                                    <p>District<span>*</span></p>
                                    {{ Form::text('diff_district', null) }}
                                </div>
                                <div class="checkout__input">
                                    <p>Thana<span>*</span></p>
                                    {{ Form::text('diff_thana', null) }}
                                </div>
                                <div class="checkout__input">
                                    <p>Postcode / ZIP<span>*</span></p>
                                    {{ Form::text('diff_post_code', null) }}
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="checkout__input">
                                            <p>Phone<span>*</span></p>
                                            {{ Form::text('diff_phone', null) }}
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="checkout__input">
                                            <p>Email</p>
                                            {{ Form::text('diff_email', null) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Your Order</h4>
                                <div class="checkout__order__products">Products <span>Total</span></div>
                                <ul>
                                    @forelse ($foodIdsInCart as $foodId)
                                        @php
                                            $food = \App\Models\Food::find($foodId);
                                        @endphp
                                        @if ($food->discount_in_percent)
                                            <li>{{ $food->name }} <span>${{ \App\Models\Cart::priceAfterDiscount($food->id) }}</span></li>  
                                        @else
                                        <li>{{ $food->name }} <span>${{$food->price}}</span></li>
                                        @endif
                                    @empty
                                    @endforelse
                                </ul>
                                <div class="checkout__order__subtotal">Subtotal <span>${{ \App\Models\Cart::authUserFoodTotalPrice() }}</span></div>
                                <div class="checkout__order__total">Total <span>${{ \App\Models\Cart::authUserFoodTotalPrice() }}</span></div>
                                <button type="submit" class="site-btn">PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
@endsection

@push('js')
    <script>
        $(document).ready(function()
        {
            $('#different-address').hide();

            $("#diff-acc").on('click', function() {
                $("#different-address").toggle();
            });
        });
    </script>
@endpush