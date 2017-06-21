<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\CreateUser;
use App\Http\Requests\UpdateUser;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class UserController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idActual = Auth::User()->id;
        $users = User::all()->where('id','!=',$idActual);
        return view('user.index',['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User;
        return view('user.register')->with(['user' => $user]);
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUser $request)
    {
        /* Llenamos los datos de user */
        $user = new User;
        $user->name = $request->get('nombres');
        $user->lastname = $request->get('apellidos');
        $user->email = $request->get('email');
        $user->docid = $request->get('documentoIdentidad');
        $user->password = $request->get('password');
        $user->username = $request->get('nombreUsuario');
        $pin = $user->generarPin();
        $user->pin = $pin;
        //dd($pin);
        $user->save();

        return redirect()->route('indexUser')->with('success','Usuario ha sido creado. Pin: '.$pin);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('user.show',['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('user.edit')->with(['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $user,UpdateUser $request)
    {
        
        $user->name = $request->nombres;
        $user->lastname = $request->apellidos;
        $user->docid = $request->documentoIdentidad;
        $user->username = $request->nombreUsuario;
        $user->password = bcrypt($request->password);
        $user->email = $request->email;
        
        
        $user->save();
        /*$user->update(
            $request->only('nombres','apellidos','documentoIdentidad','nombreUsuario','password','email')
        );*/
        return redirect()->route('showUser',['user' => $user->id])->with('success','Se ha actualizado la informacion');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(User $user)
    {
        $user->delete();
        return redirect()->route('indexUser')->with('success','El usuario ha sido eliminado');
    }

    public function estadisticasUsuarios(){

        /*Buscamos todas las ordenes pendientes*/
        $estadisticas = collect([]);

        /*
        *   Cantidad de pedidos por mes
        *   
        */

        $ordenes = Order::all()->where('status','<',4);
        foreach ($ordenes as $orden) {
            /*Consultamos los productos asociados a esta orden*/
            $ordenesProductos = OrderProduct::all()->where('idorder',$orden->idorder);
            $arreglo = collect([]);
            foreach ($ordenesProductos as $ordenProducto) {
                /*Guardamos el nombre del producto y su cantidad */
                $producto = Product::find($ordenProducto->idproduct);
                $arreglo->push([$producto->name,$ordenProducto->cantidad]);
            }
            $listaOrdenes->push([$orden->idorder,$arreglo,$orden->status]);
        }
        //dd($listaOrdenes);
        return view('user.estadisticas',['estadisticas' => $estadisticas,]);
    }
}
