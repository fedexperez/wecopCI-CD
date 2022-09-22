@extends('admin.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('messages.welcome_admin')</div>
                <div class="card-body">
                @lang('messages.admin_description')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
