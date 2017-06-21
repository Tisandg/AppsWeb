<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use Session;
use App\OrderProduct;
use App\Orden;
use App\Product;
use App\Order;
use App\Customer;

class OrderProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        /*Confirmamos el pin del cliente*/
        $pinCliente = $request->get('pinclient');
        $cliente = Customer::all()->where('pin',$pinCliente)->first();
        //dd(  );
        if(is_null($cliente)){
            session()->flash('message','No hay cliente registrado con el pin '.$pinCliente);
            return redirect()->route('confirmOrder');
        }

        /*Datos del mesero que lo atendio*/
        $mesero = Auth::User();

        /*Datos de la orden*/
        $oldOrder = Session::get('order');
        $orderProduct = new Orden($oldOrder);
        $totalPrecio = $orderProduct->totalPrecio;

        /* Registramos los datos de la orden*/
        $order = new Order;
        $order->orderdate = date("Y-m-d H:i:s");
        $order->pinclient = $pinCliente;
        $order->pinwaiter = $mesero->pin;
        $order->payvalue = $totalPrecio;
        $order->status = 1;
        $order->save();

        /*Obtenemos el id con que se registro la orden para agregarla en la
          tabla orderproducts*/
        $idOrder = $order->idorder;

        /*Guardamos los datos en la tabla order product*/
        $productos = $orderProduct->productos;
        foreach($productos as $producto){
            $idProducto = $producto['producto']['idproduct'];
            $orderStore = new OrderProduct;
            $orderStore->idorder = $idOrder;
            $orderStore->idproduct = $idProducto;
            $orderStore->cantidad = $producto['cantidad'];
            $orderStore->save();
        }

        //session()->flash('message','La orden ha sido registrada satisfactoriamente');
        /*Eliminamos los datos de la sesion para iniciar un nueva orden*/
        Session::forget('order');
        return redirect()->route('createOrder')->with('success','La orden ha sido registrada satisfactoriamente');

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

    public function addProducto(Request $request,$id){
        $product = Product::find($id);
        $oldOrder = Session::has('order') ? Session::get('order') : null;
        $orderProduct = new Orden($oldOrder);
        $orderProduct->add($product,$product->idproduct);

        $request->session()->put('order',$orderProduct);
        //dd($request->session()->get('order'));
        return redirect()->route('createOrder');
    }

    public function getOrder(){
        if(!Session::has('order')){
            /* No hay productos en el carrito*/
            return view('orders.resumenOrder');
        }
        $oldOrder = Session::get('order');
        $order = new Orden($oldOrder);
        return view('orders.resumenOrder',['productos' => $order->productos,'totalPrecio' => $order->totalPrecio]);
    }

    public function getConfirm(){
        if(!Session::has('order')){
            /* No hay productos en el carrito*/
            return view('orders.order');
        }
        $oldOrder = Session::get('order');
        $orderProduct = new Orden($oldOrder);
        $totalPrecio = $orderProduct->totalPrecio;

        /*Recuperamos informacion del usuario que lo atendio*/
        $usuarioActual = Auth::User();
        return view('orders.confirmOrder',['total' => $totalPrecio, 'mesero' => $usuarioActual]);
    }

    /*
    * Funcion que me devuleve las ordenes que estan pendientes
    * me devuelve la orden junto con los productos y su cantidad
    */
    public function getOrdenesPendiente(){
        /*Buscamos todas las ordenes pendientes*/
        $listaOrdenes = collect([]);

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
        return view('orders.listOrder',['listaOrdenes' => $listaOrdenes,]);
    }

    public function atenderOrden($idOrden){
        /*Datos del chef que lo atendio*/
        $chef = Auth::User();
        $order = Order::find($idOrden);
        $order->pinchef = $chef->pin;
        $order->attendate = date("Y-m-d H:i:s");
        $order->status = 2;
        $order->save();
        return redirect()->route('ordenes')->with('success','Empezo preparacion del pedido');
    }

    public function ordenLista($idOrden){
        /*Datos del chef que lo atendio*/
        $order = Order::find($idOrden);
        $order->status = 3;
        $order->save();
        return redirect()->route('ordenes')->with('success','Pedido terminado');
    }

    public function ordenEntregada($idOrden){
        /*Datos del chef que lo atendio*/
        $order = Order::find($idOrden);
        $order->status = 4;
        $order->save();
        return redirect()->route('ordenes')->with('success','Pedido entregado');
    }
}
