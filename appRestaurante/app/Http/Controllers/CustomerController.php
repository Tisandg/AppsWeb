<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Http\Requests\CreateCustomer;

class CustomerController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::orderBy('iduser','asc')->paginate(5);
        return view('customer.index',['customers' => $customers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.register');
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCustomer $request)
    {
        /* Llenamos los datos de customer */
        $customer = new Customer;
        $customer->name = $request->get('nombre');
        $customer->lastname = $request->get('apellido');
        $customer->email = $request->get('email');
        $customer->docid = $request->get('documento');

        /* Comprobamos los datos*/
        $customerAux = Customer::all()->where('email',$request->get('email'))->first();
        if(!is_null($customerAux)){
            return redirect()->route('createCustomer')->with('info','Ya existe un cliente con registrado con este email');
        }
        $customerAux = Customer::all()->where('docid',$request->get('documento'))->first();
        if(!is_null($customerAux)){
            return redirect()->route('createCustomer')->with('info','Ya existe un cliente con registrado con este documento');
        }


        $pin = $customer->generarPin();
        $customer->pin = $pin;
        //dd($pin);
        $customer->save();

        return redirect()->route('welcome')->with('success','Registro exitoso. Tu pin es '.$pin.'.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {

        return view('customer.show',['customer' => $customer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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

    public function estadisticasUsuarios(){

        /*Buscamos todas las ordenes pendientes*/
        $estadisticas = collect([]);

        /*
        *   Cantidad de pedidos por mes
        *   Total facturado en el mes
        *   veces promedio que un cliente va al restaurante
        *   precio promedio de cada pedido
        */

        $ordenes = Order::all()->where('status','>','3');
        $mesActual = getdate('m');
        $ordenesPorMes = 0;
        $ventasMes = 0;
        //$precioPromedio = array();
        //$vecesCliente = array();

        foreach ($ordenes as $orden) {

            $date = new \Carbon\Carbon($orden->orderdate);
            
            /*Datos en el mes actual*/
            if($date->format('m') == $mesActual){
                $ordenesPorMes++;
                $ventasMes += $orden->payvalue;
            }

        }
        $estadisticas->push([$ordenesPorMes,$ventaMes]);
        //dd($listaOrdenes);
        return view('customer.estadisticas',['estadisticas' => $estadisticas,]);
    }

    
}
