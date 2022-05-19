@extends('layouts.app')
@section('title', 'Dashboard')
@section('main-content')
<div class="page-content">
  <section class="row">
    <div class="col-12 col-lg-12">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
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