@extends('layouts.app')

@section("title", $data["title"])

@section('content')

<div class="container mb-5">
    <div id="main">

        <div class="col-md">
            <div class="col-md-12">
                <h1 class="page-header mt-4">
                    <h2 class="text-center text-uppercase text-secondary"> @lang('teamapi.team_api') </h2>
                </h1>
            </div>
            <br>
            <div class="row">
                @foreach($data['products'] as $product)
                <div class="col-md-4 align-items-stretch">
                    <div class="card my-3" id="card_product">
                        <div class="card-body">
                            <h3><a id="no-space-break">{{ $product['name'] }}</a></h3>
                            @if($product['availability'] == True)
                            <h5 class="subtitle">@lang('teamapi.availability'): @lang('teamapi.availability_yes')</h5>
                            @endif
                            @if($product['availability'] == False)
                            <h5 class="subtitle">@lang('teamapi.availability'): @lang('teamapi.availability_no')</h5>
                            @endif
                            <h5 class="subtitle">@lang('teamapi.ingredients'): {{ count($product['ingredients']) }}</h5>
                            <h5 class="subtitle">$ {{ $product['price'] }}</h5>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <br>
            <div class="col-md-12">
                <h1 class="page-header mt-4">
                    <h2 class="text-center text-uppercase text-secondary"> @lang('teamapi.average_value'): ${{ $data['average_value'] }}</h2>
                    <h2 class="text-center text-uppercase text-secondary"> @lang('teamapi.average_ingredients'): {{ $data['average_ingredients'] }}</h2>
                </h1>
            </div>
        </div>
    </div>
</div>

@endsection