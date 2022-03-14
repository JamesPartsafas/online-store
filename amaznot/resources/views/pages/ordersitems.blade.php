@extends('layouts.layout')

@section('content')
<h3 class="text-center mt-4">Order History</h3>

<div class="d-flex justify-content-center mt-3 mb-3">
    <div class="table-responsive w-75">
        <table class="table table-hover table-bordered w-100 m-0">
            <thead>
                <tr class="border">
                    <th class="text-center font-weight-bold py-2 border-0" onClick="sort(this)">Name&nbsp;&#8595;</th>
                    <th class="text-center font-weight-bold py-2 border-0 quantity" onClick="sort(this)">Description</th>
                    <th class="text-center font-weight-bold py-2 border-0 " onClick="sort(this)">Price&nbsp;&#8595;</th>
                    <th class="text-center font-weight-bold py-2 border-0 ">Quantity</th>
                    <th class="text-center font-weight-bold py-2 border-0 ">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr class="border">
                    <td class="text-center py-2 border-0">
                        @if(strlen($order->name) > 20)
                        {{substr($order->name, 0, 20)}}...
                        @else
                        {{$order->name}}
                        @endif
                    </td>
                    <td class="text-center py-2 border-0 quantity">
                        @if(strlen($order->about) > 85)
                        {{substr($order->about, 0, 85)}}...
                        @else
                        {{$order->about}}
                        @endif
                    </td>
                    <td class="text-center py-2 border-0 ">${{$order->price}}</td>
                    <td class="text-center py-2 border-0 ">{{$order->amount}}</td>
                    <td class="text-center py-2 border-0 text-primary" title="View Item"><a href="{{ URL::to($_SERVER['REQUEST_URI'].'/'.$order->id) }}"><i class="fas fa-eye"></i></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

@if ($clearCart)
<script>
    localStorage.removeItem('cart')
</script>
@endif

@endsection