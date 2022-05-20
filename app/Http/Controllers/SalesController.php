<?php

namespace App\Http\Controllers;

use App\Models\ProductInventory;
use Illuminate\Http\Request;
use App\Models\ResponseModel;
use Illuminate\Support\Facades\Auth;

class SalesController extends Controller
{
    private $response;
    public function __construct()
    {
        $this->response = new ResponseModel();
    }

    public function index() {
        return view('pages.reports.index');
    }

    public function get_sales() {

        $sales = ProductInventory::with('products', 'products.motorcycle', 'products.motorcycle.store')->whereHas('products.motorcycle.store', function($query) {
            $query->where('added_by', Auth::user()->id);
        })->get();

        $this->response->status_code = 1;
        $this->response->message = "success";
        $this->response->data = $sales;

        return response()->json($this->response);
    }
    //
}
