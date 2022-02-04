@extends('layouts.layout')

@section('content')
    <div class = "flex justify-center">
        <div class = "w-4/12 bg-white p-6 rounded-lg">

            @isset($customMessage)
                {{ $customMessage }}
            @endisset

            <form action = "{{ route('adminpage') }}" method = "post">
                @csrf

                <div class = "mb-4">
                    <label for = "name" class = "sr-only">Name</label>
                    <input type = "text" name = "name" id = "name"  placeholder = "Product Name"
                    class = "bg-gray-100 border-2 w-full p-4 rounded-lg" value ="{{ old('name') }}">

                    @error('name')
                        {{ $message }}
                    @enderror
                </div>

                <div class = "mb-4">
                    <label for = "category" class = "sr-only">Category</label>
                    <select name="category">
                        @foreach($categories as $category)
                            <option value={{ urlencode($category['category']) }}>{{ $category['category'] }}</option>
                        @endforeach
                    </select>

                    @error('category')
                        {{ $message }}
                    @enderror
                </div>

                <div class = "mb-4">
                    <label for = "subcategory" class = "sr-only">Subcategory</label>
                    <input type = "text" name = "subcategory" id = "subcategory"  placeholder = "Product Subcategory"
                    class = "bg-gray-100 border-2 w-full p-4 rounded-lg" value ="{{ old('subcategory') }}">

                    @error('subcategory')
                        {{ $message }}
                    @enderror
                </div>

                <div class = "mb-4">
                    <label for = "price" class = "sr-only">Price</label>
                    <input type = "text" name = "price" id = "price"  placeholder = "Product Price"
                    class = "bg-gray-100 border-2 w-full p-4 rounded-lg" value ="{{ old('price') }}">

                    @error('price')
                        {{ $message }}
                    @enderror
                </div>

                <div class = "mb-4">
                    <label for = "about" class = "sr-only">About</label>
                    <input type = "text" name = "about" id = "about"  placeholder = "Product About Information"
                    class = "bg-gray-100 border-2 w-full p-4 rounded-lg" value ="{{ old('about') }}">

                    @error('about')
                        {{ $message }}
                    @enderror
                </div>

                <div class = "mb-4">
                    <label for = "details" class = "sr-only">Details</label>
                    <input type = "text" name = "details" id = "details"  placeholder = "Product Details"
                    class = "bg-gray-100 border-2 w-full p-4 rounded-lg" value ="{{ old('details') }}">

                    @error('details')
                        {{ $message }}
                    @enderror
                </div>

                <div class = "mb-4">
                    <label for = "weight" class = "sr-only">Weight</label>
                    <input type = "text" name = "weight" id = "weight"  placeholder = "Product Weight"
                    class = "bg-gray-100 border-2 w-full p-4 rounded-lg" value ="{{ old('weight') }}">

                    @error('weight')
                        {{ $message }}
                    @enderror
                </div>

                <div class = "mb-4">
                    <label for = "image" class = "sr-only">Image</label>
                    <input type = "text" name = "image" id = "image"  placeholder = "Product Image Link"
                    class = "bg-gray-100 border-2 w-full p-4 rounded-lg" value ="{{ old('image') }}">

                    @error('image')
                        {{ $message }}
                    @enderror
                </div>

                <div>
                    <button type = "submit" class = "bg-blue-500 txt-white px-4 py-3 rounded
                    font-medium w-full">Add Product</button>
                </div>

            </form>
        </div>
    </div>


@endsection
