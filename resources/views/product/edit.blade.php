<html>
<head>
    <title>edit product</title>
</head>
<body>
    <div> 
        <h3>Edit Product</h3>
        <form action="{{url('/products/update')}}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $product->id }}" />
            <label>Name</label>
            <input type="text" name="name" value="{{ $product->name ?? '' }}" />
            @error('name')
                <div style="color: red;">{{ $message }}</div>
            @enderror
            <label>Price</label>
            <input type="text" name="price" value="{{ $product->price ?? '' }}" />
            @error('price')
                <div style="color: red;">{{ $message }}</div>
            @enderror
            <label>Description</label>
            <textarea name="description">{{ $product->description ?? '' }}</textarea>
            <button type="submit">Update Product</button>
            <button type="button" onclick="window.location.href='{{ url('/products') }}'">Cancel</button>
        </form>
    </div>
</body>
</html>