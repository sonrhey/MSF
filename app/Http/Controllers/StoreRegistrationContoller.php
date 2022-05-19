<?php

namespace App\Http\Controllers;

use App\Models\ResponseModel;
use App\Models\StoreModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreRegistrationContoller extends Controller
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
        return view('pages.store.index');
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
        $store = new StoreModel($request->all());
        $store->added_by = Auth::user()->id;
        $store->save();

        $this->response->status_code = 1;
        $this->response->message = "success";
        $this->response->data = $store;

        return response()->json($this->response);
        //
    }

    public function get_all_stores() {
        $stores = StoreModel::where('added_by', Auth::user()->id)->get();

        $this->response->status_code = 1;
        $this->response->message = "success";
        $this->response->data = $stores;

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
    
    public function get_my_stores() {
        $stores = StoreModel::where('added_by', Auth::user()->id)->get();

        $this->response->status_code = 1;
        $this->response->message = "success";
        $this->response->data = $stores;

        return response()->json($this->response);
    }

    public function edit_my_store(Request $request) {
        $store = StoreModel::find($request->id);
        $store->store_name = $request->store_name;
        $store->store_address = $request->store_address;
        $store->store_origin_coords = $request->store_origin_coords;
        $store->store_destination_coords = $request->store_destination_coords;
        $store->store_owner = $request->store_owner;
        $store->store_hours_from = $request->store_hours_from;
        $store->store_hours_to = $request->store_hours_to;
        $store->save();

        $this->response->status_code = 1;
        $this->response->message = "success";
        $this->response->data = $store;

        return response()->json($this->response);
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
    public function destroy(Request $request)
    {
        $store = StoreModel::find($request->id)->delete();

        $this->response->status_code = 1;
        $this->response->message = "success";
        $this->response->data = $store;

        return response()->json($this->response);
    }
}
