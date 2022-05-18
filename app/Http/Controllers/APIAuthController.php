<?php

namespace App\Http\Controllers;

use App\Models\ResponseModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class APIAuthController extends Controller
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
        return view('auth.index');
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
    public function api_authenticate($request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);


        if (Auth::attempt($credentials)) { 
            $request->session()->regenerate();
            return true;
        }
        return false;
    }
    
    public function store(Request $request)
    {
        $auth = $this->api_authenticate($request);
        if ($auth) {
            $user = Auth::user();
            $token = $user->createToken("token");
            $this->response->status_code = 1;
            $this->response->message = "success";
            $this->response->data = [
                "user" => User::find($user->id),
                "token" => $token->plainTextToken
            ];

            return response()->json($this->response);
        } else {
            $this->response->status_code = 0;
            $this->response->message = "Incorrect login credentials.";

            return response()->json($this->response);
        }
    }

    public function logout() {
        $user = Auth::user();
        $user->tokens()->delete();
        $this->response->status_code = 1;
        $this->response->message = "success";
        $this->response->data = "Logged Out";
        
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
