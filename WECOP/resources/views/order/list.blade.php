@extends('layouts.app')
@section('title', $data['pageTitle'])
@section('content')

<div class="row p-5">
    <div class="col-md-12">
        @include('util.breadcrumbs')
        <section class="page-section">
            @if($data['orders']->isNotEmpty())
            <div class="container">
                <h1 class="text-center text-uppercase">@lang('order.orders')</h1>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-scroll"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
            </div>
            <div class="text-center">
                @foreach($data['orders'] as $order)
                <li>
                    <a href="{{ route('order.show', $order->getId()) }}"> @lang('order.order') {{ $order->getId() }} -
                        {{ $order->getDateFormated() }}</a>
                </li>
                @endforeach
            </div>
            @else
            <div class="text-center row">
                <div class="text-center col-6 mx-auto">
                    <br><br><br><br><br><br>
                    <h1 class="text-center text-uppercase" style="color:blueviolet">
                        @lang('order.not_current_orders')
                    </h1>
                    <br><br><br><br><br><br>
                </div>
            </div>
            @endif
        </section>
    </div>
</div>
@endsection