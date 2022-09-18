@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('review.great')</div>

                <div class="card-body">
                    @lang('review.succesfull_review')
                </div>

                <a class="button" href="{{ route('review.create') }}">
                    @lang('review.return')
                </a>
            </div>
        </div>
    </div>
</div>
@endsection