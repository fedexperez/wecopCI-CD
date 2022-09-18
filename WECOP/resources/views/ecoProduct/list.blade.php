@extends('layouts.app')

@section('content')
<section class="page-section">
    @include('util.breadcrumbs')
    <div class="container">
        <h1 class="text-center text-uppercase text-secondary">@lang('messages.eco_products')</h1>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-globe-americas"></i></div>
            <div class="divider-custom-line"></div>
        </div>
    </div>
    <div class="text-center col-9 mx-auto">
        <div class="row">
            <div class="col-3">
                <form action="{{ route('ecoProduct.list', 'All')}}">
                    <button type="submit" class="btn btn-primary mt-3 btn-lg btn-block"
                        id="button_style1">@lang('messages.all')</button>
                </form>
            </div>
            <div class="col-3">
                <form action="{{ route('ecoProduct.list', 'Emission-Low-High')}}">
                    <button type="submit" class="btn btn-primary mt-3 btn-lg btn-block"
                        id="button_style1">@lang('messages.emission_low_high')</button>
                </form>
            </div>
            <div class="col-3">
                <form action="{{ route('ecoProduct.list', 'Emission-High-Low')}}">
                    <button type="submit" class="btn btn-primary mt-3 btn-lg btn-block"
                        id="button_style1">@lang('messages.emission_high_low')</button>
                </form>
            </div>
            <div class="col-3">
                <form action="{{ route('ecoProduct.list', 'Price-Low-High')}}">
                    <button type="submit" class="btn btn-primary mt-3 btn-lg btn-block"
                        id="button_style1">@lang('messages.price_low_high')</button>
                </form>
            </div>
            <div class="col-3">
                <form action="{{ route('ecoProduct.list', 'Price-High-Low')}}">
                    <button type="submit" class="btn btn-primary mt-3 btn-lg btn-block"
                        id="button_style1">@lang('messages.price_high_low')</button>
                </form>
            </div>
            <div class="col-3">
                <form action="{{ route('ecoProduct.list', 'Date-Newest-Oldest')}}">
                    <button type="submit" class="btn btn-primary mt-3 btn-lg btn-block"
                        id="button_style1">@lang('messages.date_newest_oldest')</button>
                </form>
            </div>
            <div class="col-3">
                <form action="{{ route('ecoProduct.list', 'Date-Oldest-Newest')}}">
                    <button type="submit" class="btn btn-primary mt-3 btn-lg btn-block"
                        id="button_style1">@lang('messages.date_oldest_newest')</button>
                </form>
            </div>
            <div class="col-3">
                <form action="{{ route('ecoProduct.list', 'In-Stock')}}">
                    <button type="submit" class="btn btn-primary mt-3 btn-lg btn-block"
                        id="button_style1">@lang('messages.in_stock')</button>
                </form>
            </div>
        </div>
    </div>
    <br><br>
    <div class="text-center row">
        <div class="text-center col-6 mx-auto">
            @foreach ($data['ecoProducts'] as $ecoProduct)
            <a href="{{ route('ecoProduct.show', ['id' =>  $ecoProduct->getId(), 'filter' => 'All']) }}">
                <h1 class="text-center text-uppercase text-secondary">{{ $ecoProduct->getName() }}</h1>
            </a>
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <a href="{{ route('ecoProduct.show', ['id' =>  $ecoProduct->getId(), 'filter' => 'All']) }}">
                        <img class="img-fluid" src="{{ url('img/ecoProducts/'.$ecoProduct->getPhoto()) }}"
                            alt="product" />
                    </a>
                </div>
                <div class="col-md-6 col-lg-8 mb-5">
                    <p class="lead">{{ $ecoProduct->getDescription() }}</p>
                    <p class="lead">$ {{ $ecoProduct->getPrice() }}</p>
                    @if( $ecoProduct->getStock() > 0)
                    <p class="in-stock">@lang('messages.in_stock')</p><br><br>
                    @else
                    <p class="out-stock">@lang('messages.out_stock')</p><br><br>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
