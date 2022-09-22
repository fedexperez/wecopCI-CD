@extends('layouts.app')

@section('content')
<!-- emision calculator Section-->
<section class="page-section portfolio" id="portfolio">
    <div class="container">
        <!-- Portfolio Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">
            @lang('messages.emision_calculator')</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-globe-americas"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <h4 class="text-center  text-secondary mb-0">@lang('messages.calculator_instructions')</h2><br>
            <div class="text-center lead">
                <!-- EmsionCalculator-->
                <form method="POST" action="{{ route('home.emisionCalculator') }}">
                    @csrf
                    <label for="eco_product_id">@lang('messages.calculator_choose_product')</label>
                    <select name="eco_product_id" id="eco_product_id">
                        @foreach($data['ecoProducts'] as $ecoProduct)
                        <option value="{{ $ecoProduct->getId() }}"> {{ $ecoProduct->getName() }} </option>
                        @endforeach
                    </select><br>
                    <input class="btn btn-primary" type="submit" value="Calculate" />
                </form><br>
                @include('util.emision')
            </div>
    </div>
    <br>
    <br>
    <div class="container">
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">@lang('messages.temperature')</h2>
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-globe-americas"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <div class="text-center lead">
            <br>
            <h4>@lang('messages.temp')</h4>
            <h4>{{$data['temp']['c']}} @lang('messages.celsius')</h4>
            <h4>{{$data['temp']['f']}} @lang('messages.farenheit')</h4>
            <br>
            <h4>@lang('messages.dev')</h4>
            <h4>{{$data['dev']['c']}} @lang('messages.celsius')</h4>
            <h4>{{$data['dev']['f']}} @lang('messages.farenheit')</h4>
        </div>
    </div>
</section>

<!-- About Section-->
<section class="page-section bg-primary text-white mb-0" id="about">
    <div class="container">
        <!-- About Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-white">@lang('messages.about')</h2>
        <!-- Icon Divider-->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-globe-americas"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- About Section Content-->
        <div class="row">
            <div class="col-lg-4 ml-auto">
                <p class="lead">@lang('messages.about_message1')</p>
            </div>
            <div class="col-lg-4 mr-auto">
                <p class="lead">@lang('messages.about_message2')</p>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section-->
<section class="page-section" id="contact">
    <div class="container">
        <!-- Some producs Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">@lang('messages.some_products')
        </h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-globe-americas"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Some Products-->
        <div class="col-12 mx-auto">
            <div class="row">
                <div class="col-4 text-center">
                    <a href="{{ route('ecoProduct.show', [$data['ecoProducts']['4']->getId(), 'filter' => 'All']) }}">
                        <img class="img-fluid" src="{{ url('img/ecoProducts/'.$data['ecoProducts']['4']->getPhoto() ) }}" alt="product" />
                        <strong class="lead">{{ $data['ecoProducts']['4']->getName() }}</strong>
                    </a>
                </div>
                <div class="col-4 text-center">
                    <a href="{{ route('ecoProduct.show', [$data['ecoProducts']['1']->getId(), 'filter' => 'All']) }}">
                        <img class="img-fluid" src="{{ url('img/ecoProducts/'.$data['ecoProducts']['1']->getPhoto() ) }}" alt="product" />
                        <strong class="lead">{{ $data['ecoProducts']['1']->getName() }}</strong>
                    </a>
                </div>
                <div class="col-4 text-center">
                    <a href="{{ route('ecoProduct.show', [$data['ecoProducts']['3']->getId(), 'filter' => 'All']) }}">
                        <img class="img-fluid" src="{{ url('img/ecoProducts/'.$data['ecoProducts']['3']->getPhoto() ) }}" alt="product" />
                        <strong class="lead">{{ $data['ecoProducts']['3']->getName() }}</strong>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection