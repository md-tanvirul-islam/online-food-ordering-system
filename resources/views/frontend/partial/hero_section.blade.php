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
                                @forelse (latestCategories(10) as $key => $value)
                                    <li><a href="{{ route('searchBy.category',[$key]) }}">{{ $value }}</a></li> 
                                @empty
                                    <li><a href="#" class="text-danger">Please search by Restaurant </a></li> 
                                @endforelse
                                @if (count(latestCategories(10)))
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
                                        {{ Form::select('ref', restaurants(), null,['class'=>['form-control','select-2'], 'placeholder'=>'Select Restaurant']) }}
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
                    </div>
                </div>
            </div>
        </section>
        <!-- Hero Section End -->