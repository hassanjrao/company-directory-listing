@extends('layouts.front')

@section('content')
    <!-- Inne Page Banner Area Start Here -->
    <section class="inner-page-banner2 bg-common inner-page-top-margin bg--gradient-bottom-60"
        data-bg-image="{{ $company->image_url }}"></section>
    <!-- Inne Page Banner Area End Here -->


    <!-- Listing Area Start Here -->
    <section class="single-listing-wrap-layout1 padding-top-6 padding-bottom-7 bg--accent">
        <div class="container">
            <div class="single-listing-summary-wrap1">
                <div class="row justify-content-between">
                    <div class="col-xl-6 col-lg-6">
                        <div class="single-listing-summary1">
                            <div class="row no-gutters">
                                <div class="col-12">
                                    <div class="media">
                                        <div class="media-body space-md" style="margin-left: 0px">
                                            <h2 class="item-title">{{ $company->name }}</h2>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-12 col-md-4 col-sm-12 col-12">
                                    <ul class="entry-meta-rating">
                                        {{-- <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li>
                                    <li><i class="fas fa-star"></i></li> --}}

                                        @for ($i = 0; $i < $company->overall_rating; $i++)
                                            <li><i class="fas fa-star"></i></li>
                                        @endfor




                                        @for ($i = 0; $i < config('app.rating_limit') - $company->overall_rating; $i++)
                                            <li><i class="far fa-star"></i></li>
                                        @endfor

                                        <li><span>{{ $company->overall_rating }}<span> /
                                                    {{ config('app.rating_limit') }}</span></span> </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-6 d-flex justify-content-between">
                        <h4 class="text-white">Good Ratings: {{ $company->good_ratings }}</h4>
                        <h4 class="text-white">Bad Ratings: {{ $company->bad_ratings }}</h4>
                        <h4 class="text-white">Average Ratings: {{ $company->average_ratings }}</h4>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="single-listing-box-layout1">
                        <div class="listygo-text-box listing-details-info">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a href="#one" data-toggle="tab" aria-expanded="false" class="active">Description</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade active show" id="one">
                                    {{ $company->description }}
                                </div>
                            </div>
                        </div>
                        <div class="listygo-text-box listing-details-review">
                            <h3 class="inner-item-heading">Reviews</h3>
                            <div class="total-review"><span>{{ $company->ratings->count() }}</span> Ratings</div>
                            <ul class="review-items">

                                @foreach ($company->ratings->reverse() as $rating)
                                    <li class="post-no-one">
                                        <div class="media">
                                            <div class="media-body">
                                                <h4 class="reviewer-name">{{ $rating->name }}<span class="review-date">
                                                        {{ $rating->created_at->format('d M Y') }}
                                                    </span></h4>
                                                <p>
                                                    {{ $rating->comment }}
                                                </p>
                                                <ul class="item-rating">

                                                    @for ($i = 0; $i < $rating->rating; $i++)
                                                        <li><i class="fas fa-star"></i></li>
                                                    @endfor

                                                    @for ($i = 0; $i < config('app.rating_limit') - $rating->rating; $i++)
                                                        <li><i class="far fa-star"></i></li>
                                                    @endfor

                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="listygo-text-box listing-details-leave-review">
                            <h3 class="inner-item-heading">Leave your review </h3>
                            <div class="rate-wrapper">
                                <div class="rate-label">Your overall rating of this listing</div>
                                <div class="rate">
                                    <div class="rate-item" data-star='1'><i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                    <div class="rate-item" data-star='2'><i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                    <div class="rate-item" data-star='3'><i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                    <div class="rate-item" data-star='4'><i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                    <div class="rate-item" data-star='5'><i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                            <form class="contact-form-box" action="{{ route('companies.submit-rating') }}" method="POST">
                                @csrf
                                <div class="row">

                                    <input type="hidden" name="company_id" value="{{ $company->id }}">

                                    <input type="hidden" name="rating" id="rating" value="0">

                                    <div class="col-12 form-group">
                                        <label>Write Your review</label>
                                        <textarea placeholder="" class="textarea form-control" name="message" rows="7" cols="20"
                                            data-error="Message field is required"></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Name*</label>
                                        <input type="text" placeholder="" class="form-control" name="name"
                                            data-error="Name field is required" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>E-mail*</label>
                                        <input type="email" placeholder="" class="form-control" name="email"
                                            data-error="E-mail field is required" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="col-12 form-group mb-0">
                                        <button type="submit" class="item-btn">Submit Your Review</button>
                                    </div>
                                </div>
                                <div class="form-response"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Listing Area End Here -->
@endsection
