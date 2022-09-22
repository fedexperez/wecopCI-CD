@extends('layouts.app')
@section('title', $data['pageTitle'])
@section('content')
<section class="page-section">
    @include('util.breadcrumbs')
    <div class="container">
        <h1 class="text-center text-uppercase text-secondary">@lang('messages.results')</h1>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-globe-americas"></i></div>
            <div class="divider-custom-line"></div>
        </div>
    </div>
    <br><br>
    <div class="text-center row">
        <div class="text-center col-6 mx-auto">
            @if($data['ecoProducts']->isNotEmpty())
            @foreach ($data['ecoProducts'] as $ecoProduct)
            <a href="{{ route('ecoProduct.show', ['id'=>$ecoProduct->getId(), 'filter'=>'All']) }}">
                <h1 class="text-center text-uppercase text-secondary">{{ $ecoProduct->getName() }}</h1>
            </a>
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <a href="{{ route('ecoProduct.show', ['id'=>$ecoProduct->getId(), 'filter'=>'All']) }}">
                        <img class="img-fluid" src="{{ url('img/ecoProducts/'.$ecoProduct->getPhoto()) }}"
                            alt="product" />
                    </a>
                </div>
                <div class="col-md-6 col-lg-8 mb-5">
                    <p class="lead">{{ $ecoProduct->getDescription() }}</p>
                    <p class="lead">$ {{ $ecoProduct->getPrice() }}</p>
                    @if( $ecoProduct->getStock() > 0)
                    <p class="lead" style="color:green">@lang('messages.in_stock')</p><br>
                    @else
                    <p class="lead" style="color:red">@lang('messages.out_stock')</p><br>
                    @endif
                </div>
            </div>
            @endforeach
            @else
            <div>
                @include('util.notFound')
            </div>
            @endif
        </div>
    </div>
</section>
@endsection