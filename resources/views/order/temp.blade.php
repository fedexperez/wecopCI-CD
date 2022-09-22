@extends('layouts.app')

@section('title', $data['pageTitle'])

@section('content')
@include('util.breadcrumbs')
<div class="container">
    <h1 class="text-center text-uppercase text-secondary">{{ $data['pageTitle'] }}</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($data['ecoProducts'] as $ecoProduct)
            <li>
                <b>@lang('messages.eco_product'): </b> {{ $ecoProduct->getName() }} -
                <b> @lang('order.quantity'): </b>{{ Session::get('ecoProducts')[$ecoProduct->getId()] }} -
                <b> @lang('order.total'): </b>{{ Session::get('ecoProducts')[$ecoProduct->getId()] *  $ecoProduct->getPrice() }}
                <br />
            </li>
            @endforeach
        </div>
    </div>
    <br>
    <h2 class="text-center text-uppercase text-secondary">@lang('order.total'): {{ $data['total'] }} @lang('order.money')</h2>
    @if ($data['total'] > 0)
    <div class="col-md-12">
        <div class="row justify-content-center">
            <div class="col-3">
                <form action="{{ route('order.removeAll')}}">
                    <button type="submit" class="btn btn-primary mt-3 btn-lg btn-block" id="button_style2">@lang('order.remove_all')</button>
                </form>
            </div>
            <div class="col-3">
                <form action="{{ route('order.buy') }}">
                    <label for="address_id">@lang('messages.address')</label>
                    <select name="address_id" id="address_id" required >
                        @foreach($data['addresses'] as $address)
                        <option value="{{ $address->getId() }}"> {{ $address->getAddress() }} </option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-primary mt-3 btn-lg btn-block" id="button_style1">@lang('order.buy')</button>
                </form>
            </div>
        </div>
    </div>
    @endif
    <br>
</div>
@endsection