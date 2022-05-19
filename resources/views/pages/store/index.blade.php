@extends('layouts.app')
@section('title', 'Store Registration')
@section('main-content')
<div class="page-content">
  <div class="card">
    <div class="card-body px-3 py-4-5">
      <form id="storeFormSubmit">
        <div class="row">
          <div class="col-md-6">
            <div class="alert alert-success success d-none" role="alert">
              <strong>Success!</strong> Store saved successfuly.
            </div>
            <div class="alert alert-danger error d-none" role="alert">
              <strong>Error!</strong> Something went wrong.
            </div>
            <div class="form-group">
              <label>Store Name</label>
              <input type="text" class="form-control" name="store_name" placeholder="My Store Name">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Store Address</label>
              <input type="text" class="form-control" id="store_address" name="store_address" placeholder="My Store Address">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Store Owner</label>
              <input type="text" class="form-control" name="store_owner" placeholder="John Doe">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Store Hours</label>
              <hr>
              <div class="row">
                <div class="col-md-6">
                  <label>From</label>
                  <input type="time" class="form-control" name="store_hours_from">
                </div>
                <div class="col-md-6">
                  <label>To</label>
                  <input type="time" class="form-control" name="store_hours_to">
                </div>
              </div>
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
      <h4>Store List</h4>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Store Id</th>
            <th>Store Name</th>
            <th>Store Address</th>
            <th>Store Hours</th>
            <th>Store Owner</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody id="store-list">
          <tr>
            <td colspan="6" class="text-center">No data currently available.</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
@section('custom-js')
<script src="{{ asset('js/pages/store/index.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB-InE92PEEqrHzYkyh7-YroKfSLW48Z64&libraries=places&callback=initMap&v=weekly" async defer></script>
@endsection