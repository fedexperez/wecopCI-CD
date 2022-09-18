@extends('admin.master')

@section('title', $data['review']->getTitle())

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> {{ $data["ecoProduct"]->getName() }} - @lang('review.review') {{ $data["review"]->getId() }}</div>
                <div class="card-body">
                    <b>@lang('review.rating'): </b> {{ $data["review"]->getRating() }}<br />
                    <b>@lang('review.title'): </b>{{ $data["review"]->getTitle() }}<br />
                    <b>@lang('review.message'): </b>{{ $data["review"]->getMessage() }}
                    <div class="row p-2">
                        <div class="col-4">
                            <form action="{{ route('admin.review.delete', $data['review']->getId()) }}">
                                <button type="submit" class="btn btn-primary mt-3 btn-lg btn-block" id="button_style1">@lang('messages.delete')</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection