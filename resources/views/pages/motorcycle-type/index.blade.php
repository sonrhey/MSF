@extends('layouts.app')
@section('title', 'Motorcycle Type')
@section('main-content')
<div class="page-content">
  <div class="card">
    <div class="card-body px-3 py-4-5">
      <form id="motorcycleForm">
        <div class="row">
          <div class="col-md-6">
            <div class="alert alert-success success d-none" role="alert">
              <strong>Success!</strong> Motorcycle saved successfuly.
            </div>
            <div class="alert alert-danger error d-none" role="alert">
              <strong>Error!</strong> Something went wrong.
            </div>
            <div class="form-group">
              <label>Store Name</label>
              <select class="form-select" name="store_id">
                <option selected>Select One</option>
                @foreach ($stores as $store)
                <option value="{{ $store->id }}">{{ $store->store_name }}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Motorcycle Name</label>
              <input type="text" class="form-control" name="motorcycle_name" placeholder="Motorcycle Name">
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
            <th>Motorcycle Id</th>
            <th>Motorcycle Name</th>
            <th>Store Name</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody id="moto-list">
          <tr>
            <td colspan="4" class="text-center">No Data available.</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
@section('custom-js')
<script src="{{ asset('js/pages/motorcycle-tye/index.js') }}"></script>
@endsection