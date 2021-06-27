@extends('layouts.frontend_master')

@include('frontend.partial.select_2_restaurant')

@push('css')
    <style>
        /* .categories__slider
        {
            width: 110px !important;
            height: 110px !important;
        } */
        .latest-product__item__pic
        {
            width: 110px !important;
            height: 110px !important;
        }
    </style>
@endpush

@section('content')
    <!-- Hero Section Begin -->
    <section class="hero">
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
                                <li><a href="#" class="text-danger">Please search by Restaurant</a></li> 
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
                            {{ Form::open(['route'=>'searchBy.restaurant','method'=>'GET']) }}
                                <div class="row">
                                    <div class="col col-md col-sm ">
                                        {{ Form::select('ref', $restaurants, null,['class'=>['form-control','select-2','select-height'], 'placeholder'=>'Select Restaurant']) }}
                                    </div>
                                    <button type="submit" class="site-btn">SEARCH</button>
                                </div>
                            {{ Form::close() }}
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
                    <div class="hero__item set-bg" data-setbg="{{ asset('ui/frontend/img/hero/banner.jpg') }}">
                        <div class="hero__text">
                            <span>DELICIOUS Foods</span>
                            <h2>Quality <br />100% Premium</h2>
                            <p>Free Pickup and Delivery Available</p>
                            <a href="#" class="primary-btn">SHOP NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    @foreach(latestCategories(8) as $key => $value)
                    <div class="col-lg-3">@php $category = App\Models\Category::find($key) @endphp
                        <div class="categories__item set-bg" data-setbg="{{ $category->getFirstMediaUrl('images') !=='' ? $category->getFirstMediaUrl('images') : asset('ui/frontend/img/photo_NA_110_110.png') }}">
                            <h5><a href="#">{{ $category->name }}</a></h5>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <br><br>
    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="{{ asset('ui/frontend/img/banner/banner-1.jpg') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="{{ asset('ui/frontend/img/banner/banner-2.jpg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- Latest Product Section Begin -->
    <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Latest Products</h4> @php $latestFoodIds = latestFoodIds(9) @endphp
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                @for($a = 0; $a < 3; $a++)
                                    @php $food = App\Models\Food::find($latestFoodIds[$a]) @endphp
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{ $food->getFirstMediaUrl('images') !=='' ? $food->getFirstMediaUrl('images') : asset('ui/frontend/img/photo_NA_110_110.png') }}" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{ $food->name }}</h6>
                                            <span>${{ $food->price }}</span>
                                        </div>
                                    </a>
                                @endfor
                                
                            </div>
                            <div class="latest-prdouct__slider__item">
                                @for($b = 3; $b < 6; $b++)
                                    @php $food = App\Models\Food::find($latestFoodIds[$b]) @endphp
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{ $food->getFirstMediaUrl('images') !=='' ? $food->getFirstMediaUrl('images') : asset('ui/frontend/img/photo_NA_110_110.png') }}" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{ $food->name }}</h6>
                                            <span>${{ $food->price }}</span>
                                        </div>
                                    </a>
                                @endfor
                            </div>
                            <div class="latest-prdouct__slider__item">
                                @for($c = 6; $c < 9; $c++)
                                    @php $food = App\Models\Food::find($latestFoodIds[$c]) @endphp
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{ $food->getFirstMediaUrl('images') !=='' ? $food->getFirstMediaUrl('images') : asset('ui/frontend/img/photo_NA_110_110.png') }}" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{ $food->name }}</h6>
                                            <span>${{ $food->price }}</span>
                                        </div>
                                    </a>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Top Discount Products</h4> @php $topDiscountFoodIds = topDiscountFoodIds(9) @endphp
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                @for($i = 0; $i < 3; $i++)
                                    @php $food = App\Models\Food::find($topDiscountFoodIds[$i]) @endphp
                                        <a href="#" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="{{ $food->getFirstMediaUrl('images') !=='' ? $food->getFirstMediaUrl('images') : asset('ui/frontend/img/photo_NA_110_110.png') }}" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>{{ $food->name }}</h6>
                                                <span style="display: inline">${{ $food->price}}</span> | <span style="display: inline" class="text-info">{{ $food->discount_in_percent }}%</span> | <span style="display: inline" class="text-success"> ${{round(($food->price - $food->price*($food->discount_in_percent/100)))}}</span>
                                            </div>
                                        </a>
                                @endfor
                            </div>

                            <div class="latest-prdouct__slider__item">
                                @for($j = 3; $j < 6; $j++)
                                    @php $food = App\Models\Food::find($topDiscountFoodIds[$j]) @endphp
                                        <a href="#" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="{{ $food->getFirstMediaUrl('images') !=='' ? $food->getFirstMediaUrl('images') : asset('ui/frontend/img/photo_NA_110_110.png') }}" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>{{ $food->name }}</h6>
                                                <span style="display: inline">${{ $food->price}}</span> | <span style="display: inline" class="text-info">{{ $food->discount_in_percent }}%</span> | <span style="display: inline" class="text-success"> ${{round(($food->price - $food->price*($food->discount_in_percent/100)))}}</span>
                                            </div>
                                        </a>
                                @endfor
                            </div>

                            <div class="latest-prdouct__slider__item">
                                @for($k = 6; $k < 9; $k++)
                                    @php $food = App\Models\Food::find($topDiscountFoodIds[$k]) @endphp
                                        <a href="#" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="{{ $food->getFirstMediaUrl('images') !=='' ? $food->getFirstMediaUrl('images') : asset('ui/frontend/img/photo_NA_110_110.png') }}" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>{{ $food->name }}</h6>
                                                <span style="display: inline">${{ $food->price}}</span> | <span style="display: inline" class="text-info">{{ $food->discount_in_percent }}%</span> | <span style="display: inline" class="text-success"> ${{round(($food->price - $food->price*($food->discount_in_percent/100)))}}</span>
                                            </div>
                                        </a>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Top Reviwed Product</h4> @php $latestFoodIds = latestFoodIds(9) @endphp
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                @for($m = 0; $m < 3; $m++)
                                    @php $food = App\Models\Food::find($latestFoodIds[$m]) @endphp
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{ $food->getFirstMediaUrl('images') !=='' ? $food->getFirstMediaUrl('images') : asset('ui/frontend/img/photo_NA_110_110.png') }}" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{ $food->name }}</h6>
                                            <span>${{ $food->price }}</span>
                                        </div>
                                    </a>
                                @endfor
                                
                            </div>
                            <div class="latest-prdouct__slider__item">
                                @for($n = 3; $n < 6; $n++)
                                    @php $food = App\Models\Food::find($latestFoodIds[$n]) @endphp
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{ $food->getFirstMediaUrl('images') !=='' ? $food->getFirstMediaUrl('images') : asset('ui/frontend/img/photo_NA_110_110.png') }}" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{ $food->name }}</h6>
                                            <span>${{ $food->price }}</span>
                                        </div>
                                    </a>
                                @endfor
                            </div>
                            <div class="latest-prdouct__slider__item">
                                @for($q = 6; $q < 9; $q++)
                                    @php $food = App\Models\Food::find($latestFoodIds[$q]) @endphp
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{ $food->getFirstMediaUrl('images') !=='' ? $food->getFirstMediaUrl('images') : asset('ui/frontend/img/photo_NA_110_110.png') }}" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{ $food->name }}</h6>
                                            <span>${{ $food->price }}</span>
                                        </div>
                                    </a>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Product Section End -->

    <!-- Blog Section Begin -->
    <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>From The Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="{{ asset('ui/frontend/img/blog/blog-1.jpg') }}" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">Cooking tips make cooking simple</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="{{ asset('ui/frontend/img/blog/blog-2.jpg') }}" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">6 ways to prepare breakfast for 30</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="{{ asset('ui/frontend/img/blog/blog-3.jpg') }}" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">Visit the clean farm in the US</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->
@endsection
