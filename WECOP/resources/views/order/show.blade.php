@extends('layouts.app')

@section('title', $data['pageTitle'])

@section('content')
<div class="container">
    @include('util.breadcrumbs')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <br>
            <h2 class="text-center text-uppercase text-secondary"> @lang('order.order') {{ $data['order']->getId() }}
            </h2>
            <div class="card-body">
                <b>@lang('order.status'): </b> {{ $data['order']->getStatus() }}<br />
                <b>@lang('order.payment_type'): </b>{{ $data['order']->getPaymentType() }}<br />
                <b>@lang('order.address'): </b>{{ $data['address']->getAddress() }}<br />
                <b>@lang('order.date'): </b>{{ $data['order']->getDate() }}<br />
                <b>@lang('order.items') </b>
                @foreach($data['items'] as $item)
                <br>
                <a>{{ $item->getName() }}</a>
                @endforeach
                <br>
                <b>@lang('order.total'): </b>{{ $data['order']->getTotal() }}<br /><br />
            </div>
            <div class="text-center col-9 mx-auto">
                <div class="row">
                    <div class="mx-auto">
                        <a class="btn btn-primary"
                            href="{{ route('order.createDocument', [ $data['order']->getId(), 'type' => 'excel' ]) }}">@lang('messages.download_excel')</a>
                    </div>
                    <div class="mx-auto">
                        <a class="btn btn-primary"
                            href="{{ route('order.createDocument', [ $data['order']->getId(), 'type' => 'pdf' ]) }}">@lang('messages.download_pdf')</a>
                    </div>
                </div>
            </div>
            <br><br>
        </div>
    </div>
</div>
@endsection