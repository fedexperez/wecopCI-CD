@extends('admin.master')

@section('title', $data['title'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('breadcrumbs.list_ecoproducts')</div>
                <div class="card-body">
                    @foreach($data['ecoProducts'] as $ecoProduct)
                    <li>
                    <a href="{{ route('admin.ecoProduct.show', $ecoProduct->getId()) }}"> {{ $ecoProduct->getName() }} </a>
                    </li>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
