@extends('layouts.layout')

@section('content')
    <div class = "text-center mt-3 mb-3">
        @isset($customMessage)
            {{ $customMessage }}
        @endisset

        <h1 class="h3 mb-3 font-weight-normal">
            Add Product
        </h1>

        <form action = "{{ route('adminpage') }}" method = "post" style="max-width:480px;margin:auto;">
            @csrf

            @error('name')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
            <div class = "form-group">
                <input type = "text" name = "name" id = "name"  placeholder = "Product Name"
                class = "form-control @error('name') border-danger @enderror" value ="{{ old('name') }}">
            </div>

            @error('category')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
            <div class = "form-group">
                <select name="category" class = "form-control @error('category') border-danger @enderror">
                    <option disabled selected value>Product Category</option>
                    @foreach($categories as $category)
                        <option value={{ urlencode($category['category']) }}>{{ $category['category'] }}</option>
                    @endforeach
                </select>
            </div>

            @error('subcategory')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
            <div class = "form-group">
                <input type = "text" name = "subcategory" id = "prodsubcategory"  placeholder = "Product Subcategory"
                class = "form-control @error('subcategory') border-danger @enderror" value ="{{ old('subcategory') }}">
            </div>

            @error('price')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
            <div class = "form-group">
                <input type = "text" name = "price" id = "price"  placeholder = "Product Price"
                class = "form-control @error('price') border-danger @enderror" value ="{{ old('price') }}">

            </div>

            @error('about')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
            <div class = "form-group">
                <input type = "text" name = "about" id = "about"  placeholder = "Product About Information"
                class = "form-control @error('about') border-danger @enderror" value ="{{ old('about') }}">

            </div>

            @error('details')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
            <div class = "form-group">
                <input type = "text" name = "details" id = "details"  placeholder = "Product Details"
                class = "form-control @error('details') border-danger @enderror" value ="{{ old('details') }}">

            </div>

            @error('weight')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
            <div class = "form-group">
                <input type = "text" name = "weight" id = "weight"  placeholder = "Product Weight"
                class = "form-control @error('weight') border-danger @enderror" value ="{{ old('weight') }}">

            </div>

            @error('image')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
            <div class = "form-group">
                <input type = "text" name = "image" id = "image"  placeholder = "Product Image Link"
                class = "form-control @error('image') border-danger @enderror" value ="{{ old('image') }}">
            </div>

            <div>
                <button type="submit" class="btn btn-lg btn-primary btn-block">Add Product</button>
            </div>

            </form>
    </div>

@endsection
