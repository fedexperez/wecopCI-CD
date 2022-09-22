@extends('admin.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('messages.product_not_exist')</div>
                <div class="card-body">
                    <strong style='color:red;'>@lang('messages.product_not_found')</strong>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
