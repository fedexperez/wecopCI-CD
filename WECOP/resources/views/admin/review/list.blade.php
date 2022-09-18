@extends('admin.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('messages.reviews_of') {{ $data["ecoProduct"]->getName() }}</div>
                <div class="card-body">
                    <ul id="errors">
                        @foreach($data["reviews"] as $review)
                        <li>
                            @lang('review.Review') {{ $review->getId() }}<a href="{{ route('admin.review.show', $review->getId()) }}"> {{ $review->getTitle() }} - Rating: {{ $review->getRating() }} </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection