@extends('layouts.app')
@section('title', 'Dashboard')
@section('main-content')
<div class="page-content">
  <section class="row">
    <div class="col-12 col-lg-12">
      <div class="row">
        <div class="col-6 col-lg-3 col-md-6">
          <div class="card">
            <div class="card-body px-3 py-4-5">
              <div class="row">
                <div class="col-md-4">
                  <div class="stats-icon purple">
                    <i class="bi bi-stack"></i>
                  </div>
                </div>
                <div class="col-md-8">
                  <h6 class="text-muted font-semibold">Total Stocks</h6>
                  <h6 class="font-extrabold mb-0">300</h6>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
          <div class="card">
            <div class="card-body px-3 py-4-5">
              <div class="row">
                <div class="col-md-4">
                  <div class="stats-icon blue">
                    <i class="bi bi-bag-dash-fill"></i>
                  </div>
                </div>
                <div class="col-md-8">
                  <h6 class="text-muted font-semibold">Total Products</h6>
                  <h6 class="font-extrabold mb-0">20</h6>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
          <div class="card">
            <div class="card-body px-3 py-4-5">
              <div class="row">
                <div class="col-md-4">
                  <div class="stats-icon green">
                    <i class="bi bi-cash-coin"></i>
                  </div>
                </div>
                <div class="col-md-8">
                  <h6 class="text-muted font-semibold">Total Sold</h6>
                  <h6 class="font-extrabold mb-0">80</h6>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
          <div class="card">
            <div class="card-body py-4 px-5">
              <div class="d-flex align-items-center">
                <div class="avatar avatar-xl">
                  <img src="assets/images/faces/1.jpg" alt="Face 1">
                </div>
                <div class="ms-3 name">
                  <h5 class="font-bold auth-name"></h5>
                  <h6 class="text-muted mb-0 auth-email"></h6>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
            <h4>Products List</h4>
            </div>
            <div class="card-body">
              @include('pages.dashboard.table')
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
@section('custom-js')
<script src="{{ asset('js/pages/dashboard/index.js') }}"></script>
@endsection