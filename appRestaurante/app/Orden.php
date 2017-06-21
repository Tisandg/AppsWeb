<?php

namespace App;

class Orden 
{

	public $productos = null;
	public $totalCantidad = 0;
	public $totalPrecio = 0;

	public function __construct($oldOrder){
		if($oldOrder){
			$this->productos = $oldOrder->productos;
			$this->totalCantidad = $oldOrder->totalCantidad;
			$this->totalPrecio = $oldOrder->totalPrecio;
		}
	}

	public function add($producto, $id){
		$storeProduct = ['cantidad' => 0, 'precio' => $producto->price, 'producto' => $producto];
		if($this->productos){
			/*Comprobamos si hay mas productos del mismo tipo en la*/
			if(array_key_exists($id, $this->productos)){
				$storeProduct = $this->productos[$id];
			}
		}
		$storeProduct['cantidad']++;
		$storeProduct['precio'] =  $producto->price * $storeProduct['cantidad'];
		$this->productos[$id] = $storeProduct;
		$this->totalCantidad++;
		$this->totalPrecio += $producto->price;
	}


}
