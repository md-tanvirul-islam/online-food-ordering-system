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
                                        All Categories
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
                            <h2>{{ $category->name }} Section</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Breadcrumb Section End -->

        <!-- Related Product Section Begin -->
        <section class="related-product mt-2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title related__product__title">
                            <h2>Related cuisine</h2>
                        </div>
                    </div>
                </div>
                    @forelse ($category->food->chunk(4) as $four_food)
                        <div class="row">
                            @foreach ($four_food as $food)
                                {{-- <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="product__item">
                                        <div class="product__item__pic set-bg" data-setbg="img/product/product-1.jpg">
                                            <ul class="product__item__pic__hover">
                                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__item__text">
                                            <h6><a href="#">{{ $food->name }}</a></h6>
                                            <h5>$30.00</h5>
                                        </div>
                                    </div>
                                </div> --}}
                                @if($food->discount_in_percent)
                                    <div class="col-lg-3 col-md-4 col-sm-6">
                                        <div class="product__discount__item">
                                            <div class="product__discount__item__pic set-bg"
                                                data-setbg="{{ asset('ui/frontend/img/product/discount/pd-1.jpg') }}">
                                                <div class="product__discount__percent">-{{ $food->discount_in_percent }}%</div>
                                                <ul class="product__item__pic__hover">
                                                    <li><a ><i data-food-id={{ $food->id }} class="fa fa-heart"></i></a></li>
                                                    <li><a href="{{ route('add.to.cart',[$food->id]) }}"><i data-food-id={{ $food->id }} class="fa fa-shopping-cart cart"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="product__discount__item__text">
                                                <span>{{ $food->restaurant->name }}</span>
                                                <h5><a href="#">{{ $food->name }}</a></h5>
                                                <div class="product__item__price">${{ round($food->price - ($food->price*($food->discount_in_percent/100))) }} <span>${{ $food->price }}</span></div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="col-lg-3 col-md-4 col-sm-6">
                                        <div class="product__discount__item">
                                            <div class="product__discount__item__pic set-bg"
                                                data-setbg="{{ asset('ui/frontend/img/product/discount/pd-2.jpg') }}">
                                                <ul class="product__item__pic__hover">
                                                    <li><a ><i data-food-id={{ $food->id }} class="fa fa-heart" ></i></a></li>
                                                    <li><a href="{{ route('add.to.cart',[$food->id]) }}"><i data-food-id={{ $food->id }} class="fa fa-shopping-cart cart"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="product__discount__item__text">
                                                <span>{{ $food->restaurant->name }}</span>
                                                <h5><a href="#">{{ $food->name }}</a></h5>
                                                <div class="product__item__price">${{ $food->price }} </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach 
                        </div>
                    @empty
                        <h3 class="text-center"> Oops! We don't have food in this section. Please visit again sometime.&#128522;&#128522;  </h3>
                    @endforelse
            </div>
        </section>
        <!-- Related Product Section End -->
@endsection