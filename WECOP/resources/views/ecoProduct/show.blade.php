@extends('layouts.app')

@section('content')
<section class="page-section">
    @include('util.breadcrumbs')
    <div class="container">
        <h1 class="text-center text-uppercase text-secondary">{{ $data['ecoProduct']->getName() }}</h1>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-globe-americas"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-4">
                <img class="img-fluid" src="{{ url('img/ecoProducts/'.$data['ecoProduct']->getPhoto()) }}" alt="product" />
            </div>
            <div class="col-md-6 col-lg-8 mb-5">
                <p class="lead">{{ $data['ecoProduct']->getDescription() }}</p>
                <p class="lead">$ {{ $data['ecoProduct']->getPrice() }}</p>
                @if( $data['ecoProduct']->getStock() > 0)
                <p class="in-stock">@lang('messages.in_stock')</p><br>
                @else
                <p class="out-stock">@lang('messages.out_stock')</p><br>
                @endif
                <p class="lead">{{ $data['ecoProduct']->getFacts() }}</p><br>
                @if (Auth::user())
                <form action="{{ route('review.create', ['id' =>  $data['ecoProduct']->getId()])}}">
                    <button type="submit" class="btn btn-primary mt-3 btn-lg btn-block" id="button_style1">@lang('review.make_review')</button>
                </form>
                @endif
                @if (Auth::user() && $data['ecoProduct']->getStock() > 0)
                <div class="row p-4">
                    <form action="{{ route('order.add', ['id' =>  $data['ecoProduct']->getId()])}}">
                        <label for="quantity">@lang('order.quantity')</label>
                        <input type="number" min="1" max="$data['ecoProduct']->getStock()" class="form-control" name="quantity" required />
                        <button type="submit" class="btn btn-primary mt-3 btn-lg btn-block" id="button_style1">@lang('order.add_to_order')</button>
                    </form>
                </div>
                @endif
            </div>
        </div>
        <br><br>
        <div>
            <h1 class="text-center text-uppercase text-secondary">@lang('review.reviews')</h1>
        </div>
        <div class="col-md-12">
            <div class="row p-5">
                <div class="col-2">
                    <form action="{{ route('ecoProduct.show', ['id' =>  $data['ecoProduct']->getId(), 'filter' => 'All'])}}">
                        <button type="submit" class="btn btn-primary mt-3 btn-lg btn-block" id="button_style1">@lang('review.all')</button>
                    </form>
                </div>
                <div class="col-2">
                    <form action="{{ route('ecoProduct.show', ['id' =>  $data['ecoProduct']->getId(), 'filter' => '1'])}}">
                        <button type="submit" class="btn btn-primary mt-3 btn-lg btn-block" id="button_style1">@lang('review.review1')</button>
                    </form>
                </div>
                <div class="col-2">
                    <form action="{{ route('ecoProduct.show', ['id' =>  $data['ecoProduct']->getId(), 'filter' => '2'])}}">
                        <button type="submit" class="btn btn-primary mt-3 btn-lg btn-block" id="button_style1">@lang('review.review2')</button>
                    </form>
                </div>
                <div class="col-2">
                    <form action="{{ route('ecoProduct.show', ['id' =>  $data['ecoProduct']->getId(), 'filter' => '3'])}}">
                        <button type="submit" class="btn btn-primary mt-3 btn-lg btn-block" id="button_style1">@lang('review.review3')</button>
                    </form>
                </div>
                <div class="col-2">
                    <form action="{{ route('ecoProduct.show', ['id' =>  $data['ecoProduct']->getId(), 'filter' => '4'])}}">
                        <button type="submit" class="btn btn-primary mt-3 btn-lg btn-block" id="button_style1">@lang('review.review4')</button>
                    </form>
                </div>
                <div class="col-2">
                    <form action="{{ route('ecoProduct.show', ['id' =>  $data['ecoProduct']->getId(), 'filter' => '5'])}}">
                        <button type="submit" class="btn btn-primary mt-3 btn-lg btn-block" id="button_style1">@lang('review.review5')</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-4">
                @foreach ($data['reviews'] as $review)
                <li>
                    <a href="{{ route('review.show', $review->getId()) }}"> {{ $review->getTitle() }} -
                        {{ $review->getRating() }}</a>
                    <p class="lead">{{ $review->getMessage() }}</p>
                </li>
                @endforeach
            </div>
        </div>
        {{ $data['reviews']->links('util.pagination') }}
    </div>

</section>
@endsection
