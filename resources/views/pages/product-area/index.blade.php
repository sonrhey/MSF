@extends('layouts.app')
@section('title', 'Product Area')
@section('main-content')
<div class="page-content">
  <div class="card">
    <div class="card-body px-3 py-4-5">
      <div class="alert alert-success success d-none" role="alert">
        <strong>Success!</strong> Motorcycle saved successfuly.
      </div>
      <div class="alert alert-success updated d-none" role="alert">
        <strong>Success!</strong> Motorcycle updated successfuly.
      </div>
      <div class="alert alert-danger error d-none" role="alert">
        <strong>Error!</strong> Something went wrong.
      </div>
      <form id="productForm">
        <div class="row">
          <div class="col-md-6">
            <label>Motorcycle Type</label>
            <select class="form-select" aria-label="Default select example" name="motorcycle_type_id">
              <option selected>Select One</option>
              @foreach ($motorcycles as $motorcycle)
              <option value="{{ $motorcycle->id }}">{{ $motorcycle->motorcycle_name }}</option>
              @endforeach
            </select>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Product Name</label>
              <input type="text" class="form-control" name="product_name" placeholder="Sample Product">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Product Price</label>
              <input type="text" class="form-control" name="product_price" placeholder="0.00">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Product Stock</label>
              <input type="text" class="form-control" name="product_stock" placeholder="0">
            </div>
          </div>
        </div>
        <div class="form-group col-2">
          <button type="submit" class="btn btn-primary btn-block">
            <span class="spinner spinner-border spinner-border-sm d-none" role="status" aria-hidden="false"></span>
            <span class="button-text">Submit Information</span>
          </button>
        </div>
      </form>
    </div>
  </div>
  <div class="mb-3"></div>
  <div class="card">
    <div class="card-body px-3 py-4-5">
      <h4>Product List</h4>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Product Id</th>
            <th>Product Name</th>
            <th>Product Price</th>
            <th>Product Stock</th>
            <th>Motorycle Type</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody id="product-list">
          <tr>
            <td colspan="5" class="text-center">No data available.</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
@section('custom-js')
<script src="{{ asset('js/pages/product-area/index.js') }}"></script>
@endsection