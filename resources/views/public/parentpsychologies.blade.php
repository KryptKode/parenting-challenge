@extends('public.layouts.app')

@section('content')
    <div class="fh5co-page-title" style="background-image: url({{ asset('/storage/images/slide_6.jpg') }});">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 animate-box">
                    <h1><span class="colored">Parent</span> Psychology</h1>
                </div>
            </div>
        </div>
    </div>
    <div id="best-deal">
        <div class="container">
            <div class="row">
                @include('public.layouts.message')
            </div>
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box" data-animate-effect="fadeIn">
                </div>
                @empty($parentPsychologies)
                    <p>No Quotes here</p>
                    @else
                        @foreach($parentPsychologies as $key => $value)
                            @if($loop->iteration == 1 || ($loop->iteration - 1) % 3 == 0)
                                <div class="row">
                                    @endif
                                    <div class="col-md-4 col-sm-6 item-block animate-box" data-animate-effect="fadeIn">
                                        <div class="fh5co-property">
                                            <figure>
                                                <img src="{{ asset("/storage/psychology/parent/$value->image") }}" alt="Quote Image" class="center-block img-responsive">
                                                <a href="{{ route('psychology.parent', $value->id) }}" class="tag">View</a>
                                            </figure>
                                            <div class="fh5co-property-innter">
                                                {!! (strlen($value->quote) > 130) ? substr($value->quote, 0, 130)." ...</p>" : $value->quote !!}
                                            </div>
                                            <p class="fh5co-property-specification">
                                            </p>
                                        </div>
                                    </div>
                                    @if($loop->iteration % 3 == 0)
                                </div>
                            @endif
                        @endforeach
                @endempty
            </div>
            <div class="row">
                <div class="col-md-12 text-center animate-box" data-animate-effect="fadeIn">
                    <nav>
                        {{ $parentPsychologies->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>

@endsection