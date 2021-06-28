@extends('layouts.frontend_master')

@push('css')
    @include('frontend.partial.select_2_restaurant')

    @include('frontend.partial.add_to_cart_ajax_css')
@endpush

@section('content')

        @include('frontend.partial.hero_section')
    
        <!-- Breadcrumb Section Begin -->
        <section class="breadcrumb-section set-bg" data-setbg="{{ asset('ui/frontend/img/breadcrumb.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="breadcrumb__text">
                            <h2>{{ $restaurant->name }}</h2>
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
                            <h2>All Cuisine</h2>
                        </div>
                    </div>
                </div>
                    @forelse ($restaurant->food->chunk(4) as $four_food)
                        <div class="row">
                            @foreach ($four_food as $food)
                                @if($food->discount_in_percent)
                                    <div class="col-lg-3 col-md-4 col-sm-6">
                                        <div class="product__discount__item">
                                            <div class="product__discount__item__pic set-bg"
                                                data-setbg="{{ $food->getFirstMediaUrl('images') !=='' ? $food->getFirstMediaUrl('images') : asset('ui/frontend/img/photo_NA_110_110.png') }}">
                                                <div class="product__discount__percent">-{{ $food->discount_in_percent }}%</div>
                                                <ul class="product__item__pic__hover">
                                                    <li><a ><i data-food-id={{ $food->id }} class="fa fa-heart"></i></a></li>
                                                    <li><a href="{{ route('add.to.cart',[$food->id]) }}"><i data-food-id={{ $food->id }} class="fa fa-shopping-cart cart"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="product__discount__item__text">
                                                {{-- <span>{{ $food->restaurant->name }}</span> --}}
                                                <h5><a href="#">{{ $food->name }}</a></h5>
                                                <div class="product__item__price">${{ round($food->price - ($food->price*($food->discount_in_percent/100))) }} <span>${{ $food->price }}</span></div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="col-lg-3 col-md-4 col-sm-6">
                                        <div class="product__discount__item">
                                            <div class="product__discount__item__pic set-bg"
                                                data-setbg="{{ $food->getFirstMediaUrl('images') !=='' ? $food->getFirstMediaUrl('images') : asset('ui/frontend/img/photo_NA_110_110.png') }}">
                                                <ul class="product__item__pic__hover">
                                                    <li><a ><i data-food-id={{ $food->id }} class="fa fa-heart" ></i></a></li>
                                                    <li><a href="{{ route('add.to.cart',[$food->id]) }}"><i data-food-id={{ $food->id }} class="fa fa-shopping-cart cart"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="product__discount__item__text">
                                                {{-- <span>{{ $food->restaurant->name }}</span> --}}
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
        @include('frontend.partial.add_to_cart_ajax_loader_html')
@endsection

@push('js')
    @include('frontend.partial.add_to_cart_ajax_script');
@endpush