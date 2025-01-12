@extends('products.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-left">
                <h2>Products</h2>
            </div>
            <br>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('products.create') }}">Create New Product</a>
            </div>
            <br>
            <br>
            <div class="pull-right">
                <form id="search-form" method="GET" action="{{ route('products.index') }}" class="form-inline">
                    <input type="text" class="form-control mr-4"  id="search-input" name="search" placeholder="Search products..."
                        value="{{ request('search') }}">
                    <button class="btn btn-light" type="submit">Search</button>
                </form>
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
    <div class="alert alert-success mt-3">
        <p>{{ $message }}</p>
    </div>
@endif

<table class="table table-bordered mt-3">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Details</th>
            <th>Price</th>
            <th>Publish</th>
            <th width="280px">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->detail }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->publish }}</td>
                <td>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('products.show', $product->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('products.edit', $product->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $products->links('pagination::bootstrap-4') }}

<script>
    document.getElementById('search-input').addEventListener('input', function () {
        if (this.value === '') {
            document.getElementById('search-form').submit();
        }
    });
</script>
@endsection
