@extends('layouts.app')
@section('title', 'Reports Area')
@section('main-content')
<div class="page-content">
  <div class="mb-3"></div>
  <div class="card">
    <div class="card-body px-3 py-4-5">
      <button class="btn btn-primary" onclick="ExportToExcel()">Generate Report</button>
      <table class="table table-striped" id="sales">
        <thead>
          <tr>
            <th>Store Name</th>
            <th>Motor Type</th>
            <th>Product Name</th>
            <th>Product Old Stock</th>
            <th>Product New Stock</th>
            <th>Product Old Price</th>
            <th>Product New Price</th>
          </tr>
        </thead>
        <tbody id="sales-list">
          <tr>
            <td colspan="7" class="text-center">No data available.</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
@section('custom-js')
<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
<script src="{{ asset('js/pages/sales/index.js') }}"></script>
@endsection