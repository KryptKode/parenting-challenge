@extends('public.layouts.app')

@section('content')
    <aside id="fh5co-hero" class="js-fullheight">
        <div class="flexslider js-fullheight">
            <ul class="slides">
                <li style="background-image: url({{ asset("/storage/adverts/baby_15.webp") }});">
                    <div class="container">
                        <div class="col-md-12 text-center js-fullheight fh5co-property-brief slider-text">
                            <div class="fh5co-property-brief-inner">
                                <div class="fh5co-box">
                                    <h3>Free E-book</h3>
                                    <div class="price-status">
                                    </div>
                                    <p class="text text-bold" style="color: magenta;">Score above 70% in the parenting quiz and get a free e-book on parenting.  </p>
                                    <p><a href="{{ route('parentingquiz') }}" class="btn btn-primary">Get started</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                @foreach($ads as $key => $value)
                    <li style="background-image: url({{ asset("/storage/adverts/$value->image") }});">
                        <div class="container">
                            <div class="col-md-12 text-center js-fullheight fh5co-property-brief slider-text">
                                <div class="fh5co-property-brief-inner">
                                    <div class="fh5co-box">
                                        <h3><a href="{{ $value->link }}">{{ $value->heading }}</a></h3>
                                        <div class="price-status">
                                        </div>
                                        {!! $value->ad !!}
                                        <p><a href="{{ $value->link }}" class="btn btn-primary">Buy</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </aside>
    <div id="best-deal">
        <div class="container">
            <div class="row">
                @include('public.layouts.message')
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box" data-animate-effect="fadeIn">
                    <h2>Parenting Tips</h2>
                    <p>Tips gathered from research around the world on parenting and how best to handle the wonderful gifts of nature - <em><strong> babies</strong></em>. </p>
                </div>
                @foreach($parentingTips as $value)
                    <div class="col-md-4 item-block animate-box" data-animate-effect="fadeIn">
                        <div class="fh5co-property">
                            <figure>
                                <img src="{{ asset("/storage/tips/parent/$value->image") }}" alt="Tip image" class="img-responsive">
                                <a href="{{ route('tip.parent', $value->id) }}" class="tag">View</a>
                            </figure>
                            <div class="fh5co-property-innter">
                                {!! (strlen($value->tip) > 200) ? substr($value->tip, 0, 200)." ...</p>" : $value->tip !!}
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col-md-12 text-center animate-box" data-animate-effect="fadeIn">
                    <p><a href="{{ route('tips.parent') }}" class="btn btn-primary btn-outline with-arrow">View all tips <i class="icon-arrow-right"></i></a></p>
                </div>
            </div>
        </div>
    </div>


    <div class="fh5co-section-with-image">

        <img src="{{ asset('/storage/images/image_1.jpg') }}" alt="" class="img-responsive">
        <div class="fh5co-box animate-box">
            <h2>Get a free E-book.</h2>
            <p>Score above 70% in the parenting quiz and get a free e-book on parenting. Take test now.</p>
            <p><a href="{{ route('parentingquiz') }}" class="btn btn-primary btn-outline with-arrow">Start now <i class="icon-arrow-right"></i></a></p>
        </div>

    </div>

    <div id="fh5co-testimonial">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center fh5co-heading animate-box" data-animate-effect="fadeIn">
                    <h2>Quotes</h2>
                    <p>Wise sayings from notable men and women around the world. </p>
                </div>
                @foreach($quotes as $key => $value)
                    <div class="col-md-4 text-center item-block animate-box" data-animate-effect="fadeIn">
                        <blockquote>
                            {!! $value->quote !!}
                            <p><span class="fh5co-author"><cite>{{ $value->person }}</cite></span><i class="icon twitter-color icon-twitter pull-right"></i></p>
                        </blockquote>
                    </div>
                @endforeach
                <div class="col-md-6 col-md-offset-3 text-center fh5co-heading animate-box" data-animate-effect="fadeIn">
                    <p><a href="{{ route('quotes')}}" class="btn btn-primary btn-outline with-arrow">View More Quotes <i class="icon-arrow-right"></i></a></p>
                </div>
            </div>
        </div>
    </div>

    <div id="fh5co-blog">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center fh5co-heading animate-box" data-animate-effect="fadeIn">
                    <h2>Baby <em>facts</em></h2>
                    <p>Facts gathered from research over the years about babies and their development. </p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @foreach($babyFacts as $key => $value)
                    <div class="col-md-4 animate-box" data-animate-effect="fadeIn">
                        <a class="fh5co-entry" href="{{ route('fact.baby', $value->id) }}">
                            <figure>
                                <img src="{{ asset("/storage/baby_facts/$value->image") }}" alt="Fact image" class="img-responsive">
                            </figure>
                            <div class="fh5co-copy">
                                <span class="fh5co-date">{{ $value->created_at->toFormattedDateString() }}</span>
                                {!! (strlen($value->fact) > 130) ? substr($value->fact, 0, 130)." ...</p>" : $value->fact !!}
                            </div>
                        </a>
                    </div>
                @endforeach
                <div class="col-md-12 text-center animate-box" data-animate-effect="fadeIn">
                    <p><a href="{{ route('facts.baby') }}" class="btn btn-primary btn-outline with-arrow">View More Facts <i class="icon-arrow-right"></i></a></p>
                </div>
            </div>
        </div>
    </div>

@endsection

