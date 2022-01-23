@extends('layouts.layout')

@section('content')

    <!-- Ensure when user selects a subcategory, they are brought back to page 1
    Also ensure that if subcategory is selected, it is persisted across pages -->
    <p>Welcome to a product list page</p>
    <p>If you can see the following data, you have configured your local DB correctly:</p>

    <p>The following subcategories are available for this category:</p>
    <ul>
        @foreach($subcategories as $subcategory)
            <li>{{ $subcategory['subcategory'] }}</li>
        @endforeach
    </ul>

    <p>Items on this page:</p>
    <ul>
        @foreach($products as $product)
            <li>{{ $product['name'] }}</li>
        @endforeach
    </ul>

    <span>
        {{ $products->links() }}
    </span>

@endsection