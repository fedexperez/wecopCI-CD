@extends('admin.master')

@section('title', $data['title'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @include('util.message')
            <div class="card">
                <div class="card-header">{{ $data['notEcoProduct']->getName() }}</div>
                <div class="card-body">
                    <strong>@lang('messages.product_name')</strong> {{ $data['notEcoProduct']->getName() }}<br />
                    <strong>@lang('messages.product_emision')</strong> {{ $data['notEcoProduct']->getEmision() }}<br />
                    <strong>@lang('messages.product_life')</strong> {{ $data['notEcoProduct']->getProductLife() }}<br /><br />
                    <form action="{{ route('admin.notEcoProduct.delete', $data['notEcoProduct']->getId()) }}">
                        <button type="submit" class="btn btn-primary mt-3 btn-lg btn-block"
                            id="button_style1">@lang('messages.delete')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
