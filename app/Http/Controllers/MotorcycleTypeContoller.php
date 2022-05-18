<?php

namespace App\Http\Controllers;

use App\Models\MotorcyleTypeModel;
use App\Models\ResponseModel;
use App\Models\StoreModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MotorcycleTypeContoller extends Controller
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
        $stores = StoreModel::where('added_by', Auth::user()->id)->get();
        return view('pages.motorcycle-type.index', compact('stores'));
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
        $motorcycle_type = new MotorcyleTypeModel($request->all());
        $motorcycle_type->save();

        $this->response->status_code = 1;
        $this->response->message = "success";
        $this->response->data = $motorcycle_type;

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
}
