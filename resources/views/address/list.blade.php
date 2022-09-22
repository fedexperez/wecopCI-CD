@extends('layouts.app')
@section('title', $data['pageTitle'])
@section('content')
<section class="page-section">
    @include('util.breadcrumbs')
    <br><br>
    <div class="container">
        <h1 class="text-center text-uppercase text-secondary">@lang('messages.your_addresses')</h1>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-globe-americas"></i></div>
            <div class="divider-custom-line"></div>
        </div>
    </div>
    <div class="text-center">
        @foreach ($data['address'] as $address)
        <li>
            <a href="{{ route('address.show', $address->getId()) }}">{{ $address->getAddress() }}</a>
        </li>
        @endforeach
    </div>
</section>
@endsection