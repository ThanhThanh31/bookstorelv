<?php
namespace App;
class Cart{
    public $products = null;
    public $totalPrices = 0;
    public $totalQuantys = 0;

    public function __constant($cart)
    {
        if($cart){
            $this->products = $cart->products;
            $this->totalPrices = $cart->totalPrices;
            $this->totalQuantys = $cart->totalQuantys;
        }
    }

    public function AddCart($product, $id){
        $newProduct = ['quanty'=> 0, 'price' => $product->sp_gia, 'productInfo' => $product];
        if($this->products){
            if(array_key_exists($id, $products)){
                $newProduct = $products[$id];
            }
        }
        $newProduct['quanty']++;
        $newProduct['price'] = $newProduct['quanty'] * $product->sp_gia;
        $this->products[$id] = $newProduct;
        $this->totalPrices += $product->sp_gia;
        $this->totalQuantys++;
    }
}
?>
