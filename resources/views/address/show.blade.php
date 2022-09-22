@extends('layouts.app')
@section('title', $data['pageTitle'])
@section('content')
<section class="page-section">
    @include('util.breadcrumbs')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <br>
                <h2 class="text-center text-uppercase text-secondary">{{ $data['address']->getAddress() }}</h2>
                <div class="card-body">
                    <b>@lang('messages.country'): </b> {{ $data['address']->getCountry() }}<br>
                    <b>@lang('messages.city'): </b>{{ $data['address']->getCity() }}<br>
                    <b>@lang('messages.postal_code'): </b>{{ $data['address']->getPostalCode() }}<br><br>
                </div>
                <div class="text-center">
                    <form action="{{ route('address.delete', $data['address']->getId()) }}">
                        <button type="submit" class="btn btn-primary">
                            @lang('messages.delete')
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection