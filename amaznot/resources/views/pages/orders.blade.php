@extends('layouts.layout')

@section('content')
<p>This is the orders page</p>

@foreach($orders as $order)
    {{ $order }}
    <form action="{{ route('deleteOrder') }}" method="post">
        @csrf
        <input type="hidden" id="order_id" name="order_id" value="{{ $order['id'] }}">
        <button type = 'submit'> Delete </button>
    </form>
@endforeach

@if ($clearCart)
    <script>localStorage.removeItem('cart')</script>
@endif

@endsection