<?php

namespace App\Http\Controllers;

use App\Models\MotorcyleTypeModel;
use App\Models\ProductInventory;
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

    public function update_my_products(Request $request) {
        $products = ProductsModel::find($request->id);

        $product_history = new ProductInventory();
        $product_history->product_id = $products->id;
        $product_history->old_stock = $products->product_stock;
        $product_history->new_stock = $request->product_stock;
        $product_history->old_price = $products->product_price;
        $product_history->new_price = $request->product_price;
        $product_history->save();

        $products->motorcycle_type_id = $request->motorcycle_type_id;
        $products->product_name = $request->product_name;
        $products->product_price = $request->product_price;
        $products->product_stock = $request->product_stock;
        $products->save();

        $this->response->status_code = 1;
        $this->response->message = "success";
        $this->response->data = $products;

        return response()->json($this->response);
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

    public function get_my_products() {
        $products = ProductsModel::with('motorcycle', 'motorcycle.store')->whereHas('motorcycle.store', function($query) {
            $query->where('added_by', Auth::user()->id);
        })->get();

        $this->response->status_code = 1;
        $this->response->message = "success";
        $this->response->data = $products;

        return response()->json($this->response);
    }

    public function search_item(Request $request) {
        $products = ProductsModel::with('motorcycle', 'motorcycle.store')->where('product_name', 'LIKE', '%' .$request->product_name. '%')->get();
        $m_products = array();
        $latitude_from = $request->latitude_from;
        $longitude_from = $request->longitude_from;

        foreach($products as $product) {
            $origin = $product->motorcycle->store->store_origin_coords;
            $destination = $product->motorcycle->store->store_destination_coords;

            array_push($m_products, [
                "product_name" => $product->product_name,
                "product_price" => $product->product_price,
                "store_name" => $product->motorcycle->store->store_name,
                "store_location" => $product->motorcycle->store->store_address,
                "lat" => $product->motorcycle->store->store_origin_coords,
                "long" => $product->motorcycle->store->store_destination_coords,
                "motorcyle_type" => $product->motorcycle->motorcycle_name,
                "distance" => $this->calculate_distance($latitude_from, $longitude_from, $origin, $destination)
            ]);
        }

        $distance = array_column($m_products, 'distance');
        array_multisort($distance, SORT_ASC, $m_products);

        $this->response->status_code = 1;
        $this->response->message = "success";
        $this->response->data = $m_products;

        return response()->json($this->response);
    }

    private function calculate_distance($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 6371000) {
        $latFrom = deg2rad($latitudeFrom);
        $lonFrom = deg2rad($longitudeFrom);
        $latTo = deg2rad($latitudeTo);
        $lonTo = deg2rad($longitudeTo);

        $latDelta = $latTo - $latFrom;
        $lonDelta = $lonTo - $lonFrom;

        $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
            cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
        return ( $angle * $earthRadius ) / 1000 ;
    }
}
