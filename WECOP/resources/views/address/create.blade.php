@extends('layouts.app')

@section('title', $data['pageTitle'])

@section('content')
<div class="container">
    @include('util.breadcrumbs')
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            <h2 class="text-center text-uppercase text-secondary"> @lang('messages.create_address') </h2>
            @if($errors->any())
            <ul id="errors">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            @endif
            <form method="POST" action="{{  route('address.save') }}">
                @csrf
                <div class="form-group row">
                    <label for="country" class="col-md-4 col-form-label text-md-right">@lang('messages.country')</label>
                    <div class="col-md-6">
                        <input id="country" type="text" class="form-control @error('country') is-invalid @enderror"
                            name="country" value="{{ old('country') }}" required autocomplete="country" autofocus>
                        @error('country')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="city" class="col-md-4 col-form-label text-md-right">@lang('messages.city')</label>
                    <div class="col-md-6">
                        <input id="city" type="text" class="form-control @error('city') is-invalid @enderror"
                            name="city" value="{{ old('city') }}" required autocomplete="city" autofocus>
                        @error('city')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="address" class="col-md-4 col-form-label text-md-right">@lang('order.address')</label>
                    <div class="col-md-6">
                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror"
                            name="address" required autocomplete="new-address">

                        @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="postal_code"
                        class="col-md-4 col-form-label text-md-right">@lang('messages.postal_code')</label>
                    <div class="col-md-6">
                        <input id="postal_code" type="text"
                            class="form-control @error('postal_code') is-invalid @enderror" name="postal_code"
                            value="{{ old('postal_code') }}" required autocomplete="postal_code">
                        @error('postal_code')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" value="@lang('messages.send')" class="btn btn-primary">
                            @lang('messages.create')
                        </button>
                    </div>
                </div>
            </form>
            <br><br><br>
        </div>
    </div>
</div>
@endsection