@extends('layouts.front')

@section('content')
    <!-- Main Banner Area Start Here -->
    <section class="main-banner-wrap-layout1 bg-common overlay-dark-30 bg--gradient-top-30"
        data-bg-image="{{ asset('front-assets/img/figure/site-main-figure1.jpg') }}">
        <div class="container">
            <div class="main-banner-box-layout1">
                <h1 class="item-title">Search For Everything</h1>

                <form id="category-search-form" class="category-search-form" action="{{ route("companies.index") }}">
                    <ul class="form-items d-flex justify-content-center">
                        <li>
                            <div class="input-group stylish-input-group">
                                <input type="text" placeholder="What are you looking for?" class="form-control"
                                    name="search" id="form-website" data-error="Search text required" required value="{{ isset($_GET["search"]) ? $_GET["search"] : "" }}">
                                <span class="input-group-addon">
                                    <button type="submit">
                                        <i class="flaticon-search"></i>
                                    </button>
                                </span>
                                <div class="help-block with-errors"></div>
                            </div>
                        </li>

                        <li>
                            <div class="form-group mb-0 text-center">
                                <button type="submit" class="item-btn w-50">Search</button>
                            </div>
                        </li>
                    </ul>
                </form>

            </div>
        </div>
    </section>
    <!-- Main Banner Area End Here -->

    <!-- Listing Area Start Here -->
    <section class="listing-wrap-layout1 padding-top-9p6 padding-bottom-7 bg--light">
        <div class="container">
            <div class="section-heading heading-dark heading-center">
                <h2 class="item-title">Companies</h2>
            </div>
            <div class="row" id="no-equal-gallery">

                @foreach ($companies as $company)
                    <div class="col-xl-4 col-lg-6 col-md-6 col-12 no-equal-item">
                        <div class="listing-box-grid">
                            <div class="product-box border-box">
                                <div class="item-img bg--gradient-50">
                                    <img src="{{ $company->image_url }}" alt="Listing"
                                        class="img-fluid grid-view-img">
                                    <ul class="item-rating">

                                        {{-- stars according to overall_rating, if 3.5 then half star --}}
                                        @for ($i = 0; $i < $company->overall_rating; $i++)
                                            <li><i class="fas fa-star"></i></li>
                                        @endfor




                                        @for ($i = 0; $i < config("app.rating_limit") - $company->overall_rating; $i++)
                                            <li><i class="far fa-star"></i></li>
                                        @endfor

                                        <li><span>{{ $company->overall_rating }}<span> / {{ config("app.rating_limit") }}</span></span> </li>
                                    </ul>
                                </div>
                                <div class="item-content">
                                    <h3 class="item-title"><a href="{{ route("companies.show",["company"=>$company]) }}">{{ $company->name }}</a></h3>
                                    <p class="item-paragraph">{{ $company->description_short }} </p>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <div class="section-heading heading-dark heading-center">

                {{ $companies->links()  }}
            </div>
        </div>
    </section>
    <!-- Listing Area End Here -->

@endsection
