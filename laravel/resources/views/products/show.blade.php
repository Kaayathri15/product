@extends('products.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Show Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="productName"><strong>Name:</strong></label>
                <input type="text" id="productName" class="form-control" value="{{ $product->name }}" disabled>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label for="productPrice"><strong>Price:</strong></label>
                <input type="text" id="productPrice" class="form-control" value="{{ $product->price }}" disabled>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label for="productDetails"><strong>Details:</strong></label>
                <textarea id="productDetails" class="form-control" rows="4" disabled>{{ $product->detail }}</textarea>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label for="productPublish"><strong>Publish:</strong></label>
                <input type="text" id="productPublish" class="form-control" value="{{ $product->publish }}" disabled>
            </div>
        </div>
    </div>
@endsection
