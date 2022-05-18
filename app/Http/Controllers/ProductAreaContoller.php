<?php

namespace App\Http\Controllers;

use App\Models\MotorcyleTypeModel;
use App\Models\ProductsModel;
use App\Models\ResponseModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductAreaContoller extends Controller
{
    private $response;
    public function __construct()
    {
        $this->response = new ResponseModel();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $motorcycles = MotorcyleTypeModel::with('store')->whereHas('store', function($query) {
            $query->where('added_by', Auth::user()->id);
        })->get();

        return view('pages.product-area.index', compact('motorcycles'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product_area = new ProductsModel($request->all());
        $product_area->save();

        $this->response->status_code = 1;
        $this->response->message = "success";
        $this->response->data = $product_area;

        return response()->json($this->response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search_item(Request $request) {
        // $product = ProductsModel::
    }
}
