@extends('layouts.frontend_master')

@push('css')
    <style>
        img{
            height: 100px !important;
            width: 101px !important;
        }
    </style>
    @include('frontend.partial.select_2_restaurant')
@endpush

@section('content')

    @include('frontend.partial.hero_section')

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('ui/frontend/img/breadcrumb.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Cart</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    @if (count($foodIdsInCart)>0)
        <!-- Shoping Cart Section Begin -->
        <section class="shoping-cart spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="shoping__cart__table">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="shoping__product">Products</th>
                                        <th>Restaurant</th>
                                        <th>Price</th>
                                        {{-- <th>Quantity</th> --}}
                                        <th></th>
                                        <th>Discount(%)</th>
                                        <th>Total</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($foodIdsInCart as $id)
                                    <tr>
                                        @php $food = \App\Models\Food::find($id); @endphp
                                        <td class="shoping__cart__item">
                                            <img src="{{ isset($food->getMedia('images')[0]) ? $food->getMedia('images')[0]->getFullUrl() : asset('ui/frontend/img/photo_NA_110_110.png') }}" alt="">
                                            <h5>{{ $food->name }}</h5>
                                        </td>
                                        <td class="shoping__cart__quantity">{{ $food->restaurant->name }}</td>
                                        <td class="shoping__cart__price">
                                            {{ $food->price }}
                                        </td>
                                        <td class="shoping__cart__quantity">
                                            <div class="quantity">
                                                {{-- <div class="pro-qty">
                                                    <input type="text" value="1">
                                                </div> --}}
                                            </div>
                                        </td>
                                        <td class="shoping__cart__price">
                                            {{ $food->discount_in_percent }}
                                        </td>
                                        <td class="shoping__cart__total">
                                            {{ \App\Models\Cart::priceAfterDiscount($food->id) }}
                                        </td>
                                        <td class="shoping__cart__item__close">
                                            <span class="icon_close"></span>
                                        </td>
                                    </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        {{-- <div class="shoping__cart__btns">
                            <a href="#" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                            <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                                Upadate Cart</a>
                        </div> --}}
                    </div>
                    <div class="col-lg-6">
                        {{-- <div class="shoping__continue">
                            <div class="shoping__discount">
                                <h5>Discount Codes</h5>
                                <form action="#">
                                    <input type="text" placeholder="Enter your coupon code">
                                    <button type="submit" class="site-btn">APPLY COUPON</button>
                                </form>
                            </div>
                        </div> --}}
                    </div>
                    <div class="col-lg-6">
                        <div class="shoping__checkout">
                            <h5>Cart Total</h5>
                            <ul>
                                <li>Subtotal <span>${{ \App\Models\Cart::authUserFoodTotalPrice() }}</span></li>
                                <li>Total <span>${{ \App\Models\Cart::authUserFoodTotalPrice() }}</span></li>
                            </ul>
                            <a href="{{ route('cart.checkout') }}" class="primary-btn">PROCEED TO CHECKOUT</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Shoping Cart Section End -->
    @else
        <p class="text-center text-dark  mt-5 mb-5"  style="font-size: 30px"> No food in the cart. <a href="{{ route('frontend.index') }}">Please add some food.</a> &#128522;&#128522; </p>
    @endif

@endsection