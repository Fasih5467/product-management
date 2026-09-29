<html>
<head>
    <title>product list</title>
</head>
<body>
    <div> 
        <form action="{{url('/logout')}}" method="POST" style="display:inline;">
            @csrf
            <h4>Welcome, {{ auth()->user()->name }}</h4>
            <button type="submit">Logout</button>
        </form>
        <br><br>
        @include('components.flash-message')
        <h3>Product List</h3>
        <a href="{{url('/products/create')}}">New Product</a>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
            @foreach($products as $product)
           <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ number_format($product->price, 2) }}</td>
                <td>{{ $product->description }}</td>
                <td>
                    <a href="{{url('/products/edit/'.$product->id)}}">Edit</a>
                    <a href="{{url('/products/delete/'.$product->id)}}" style="display:inline;">
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                    </a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</body>
</html>