<html>
<head>
    <title>Create Product</title>
</head>
<body>
    <div> 
        <h3>Create Product</h3>
        <form action="{{url('/products/store')}}" method="POST">
            @csrf
            <label>Name</label>
            <input type="text" name="name" placeholder="Enter product name"/>
            @error('name')
                <div style="color: red;">{{ $message }}</div>
            @enderror
            <label>Price</label>
            <input type="text" name="price" placeholder="Enter product price
            "/>
            @error('price')
                <div style="color: red;">{{ $message }}</div>
            @enderror
            <label>Description</label>
            <textarea name="description" placeholder="Enter product description"></textarea>
            <button type="submit">Save Product</button>
            <button type="button" onclick="window.location.href='{{url('/products')}}'">Cancel</button>
        </form>
    </div>
</body>
</html>