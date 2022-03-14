@extends('layouts.layout')

@section('content')
<h3 class="text-center mt-4">Order History</h3>

<div class="d-flex justify-content-center mt-3 mb-3">
    <div class="table-responsive w-75">
        <table class="table table-hover table-bordered w-100 m-0">
            <thead>
                <tr class="border">
                    <th class="text-center font-weight-bold py-2 border-0">Document Type</th>
                    <th class="text-center font-weight-bold py-2 border-0 quantity" onClick="sort(this)">
                        Number&nbsp;&#8595;</th>
                    <th class="text-center font-weight-bold py-2 border-0 " onClick="sort(this)">Created&nbsp;&#8595;</th>
                    <th class="text-center font-weight-bold py-2 border-0 ">Total</th>
                    <th class="text-center font-weight-bold py-2 border-0 ">Credit Card</th>
                    <th class="text-center font-weight-bold py-2 border-0 ">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr class="border">
                    <td class="text-center py-2 border-0">Order</td>
                    <td class="text-center py-2 border-0 quantity"><a href="{{URL::to('orders/'.$order->id)}}">{{$order->id}}</a></td>
                    <td class="text-center py-2 border-0 ">{{date('d-m-Y', strtotime($order->created_at))}}</td>
                    <td class="text-center py-2 border-0 ">${{$order->total}}</td>
                    <td class="text-center py-2 border-0 ">{{str_repeat("*", strlen($order->credit_card)).substr($order->credit_card, -2)}}</td>
                    <td class="text-center py-2 border-0 ">
                        <form action="{{ route('deleteOrder') }}" method="post">
                            @csrf
                            <input type="hidden" id="order_id" name="order_id" value="{{ $order['id'] }}">
                            <button type='submit' class="text-danger clearBTN" title="Delete">&#128473;</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
        
</div>

<div class="d-flex justify-content-center">
    {{ $orders->withQueryString()->links() }}
</div>

@if ($clearCart)
<script>
    localStorage.removeItem('cart')
</script>
@endif

@endsection