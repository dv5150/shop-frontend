@extends('shop::layouts.shop')

@section('content')
    <div class="row">
        <div class="column">
            @if($errors->any())
                <div class="column">
                    @json($errors->all())
                </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="column">
            <cart-widget></cart-widget>

            <cart-drawer
                    :checkout-url="'{{ route('checkout') }}'"
                    @openCartDrawer="openDrawer"
            ></cart-drawer>
        </div>
    </div>
    @include('shop::partials.productList')
@endsection
