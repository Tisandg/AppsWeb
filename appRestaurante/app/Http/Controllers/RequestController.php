<?php

namespace App\Http\Controllers;

use App\RequestProfile;
use App\User;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requests = RequestProfile::all()->where('aceptada','=','');
        return view('request.index',['requests' => $requests]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $request = RequestProfile::find($id);
        $request->aceptada = true;
        $request->save();

        /* Ahora actualizamos el perfil en la tabla user*/
        $user = User::all()->where('username',$request->username)->first();
        $user->profile = $request->profile;
        $user->save();

        return redirect()->route('indexRequest')->with('success','Se ha escogido el rol para el usuario');
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
