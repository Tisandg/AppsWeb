<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Product;
use Image;
use Input;
use App\Http\Requests\CreateProduct;
use App\Http\Requests\UpdateProduct;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Product::all();
        return view('products.index',['productos' => $productos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $producto = new Product;
        return view('products.create')->with(['producto' => $producto]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProduct $request)
    {
        /* Llenamos los datos de producto */
        $producto = new Product;
        $producto->name = $request->get('nombre');
        $producto->description = $request->get('descripcion');
        $producto->price = $request->get('precio');

        if(!is_null($request->file('imagen')) ){
            /* Validamos si ha subido foto*/
            if ( $request->file('imagen')->isValid() ) {
                /*Codificamos la imagen a formato base64*/
                $file = $request->file('imagen')->path();
                $image = Image::make($file)->resize(500,300)->encode('data-url');
                $producto->image = $image;
            }
        }

        $producto->save();
        return redirect()->route('indexProducto')->with('success','El producto se ha registrado satisfactoriamente');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $producto)
    {
        return view('products.show',['producto' => $producto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $producto)
    {
        return view('products.edit')->with(['producto' => $producto]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, UpdateProduct $request)
    {
        $product = Product::find($id);
        $product->name = $request->get('nombre');
        $product->description = $request->get('descripcion');
        $product->price = $request->get('precio');

        if(!is_null($request->file('imagen')) ){
            /* Validamos si ha subido foto*/
                /*Codificamos la imagen a formato base64*/
                $file = $request->file('imagen')->path();
                $image = Image::make($file)->resize(500,300)->encode('data-url');
                $product->image = $image;
        }        

        $product->save();

        return redirect()->route('indexProducto')->with('success','El producto ha sido actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('indexProducto')->with('success','El producto se ha eliminado satisfactoriamente');
    }
}
