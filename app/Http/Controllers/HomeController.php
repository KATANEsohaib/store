<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //
    public function redirect(){

        $usertype=Auth::user()->usertype;
        if($usertype=='1'){
            return view('admin.home');
        }else{
            $product= Product::all();
            $user=auth()->user();
            $count=Cart::where('name',$user->name)->count();
            return view('user.home',compact('product','count'));

        }
    }
    public function index(){

        if(Auth::id()){
        return redirect('/redirect');
    }
    else
    {
        $product= Product::all();
        return view('user.home',compact('product'));
    };
   
  

}


public function addcart( Request $request , $id){
    if(Auth::id()){
        $user=Auth::user();
        $product=Product::find($id);
        $cart=new Cart;
        $cart->name=$user->name;
        $cart->phone=$user->phone;
        $cart->address=$user->address;
        $cart->pruduct_title=$product->name;
        $cart->price=$product->price;
        $cart->quantity=$request->quantity;
        $cart->save();

        return redirect()->back()->with('success', 'Produit ajouté au panier avec succès.');
        ;
    }
    else{
        return redirect('/login');
    }

        
}


public function showcart(){
   return view('user.showcart');
    
}
public function cart($id, $quantity = 1) {
    $product = Product::find($id);

    if(!$product) {
        abort(404); // Produit non trouvé, renvoie une erreur 404
    }

    $cart = session()->get('cart');

    if(!$cart) {
        // Initialise le panier avec le produit sélectionné
        $cart = [
            $id => [
                "name" => $product->name,
                "quantity" => $quantity, // Utilise la quantité passée en paramètre
                "price" => $product->price,
                "photo" => $product->photo
            ]
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Produit ajouté au panier avec succès!');
    }

    if(isset($cart[$id])) {
        // Si le produit est déjà dans le panier, augmentez la quantité
        $cart[$id]['quantity'] += $quantity; // Ajoute la quantité passée en paramètre
    } else {
        // Si le produit n'est pas dans le panier, ajoutez-le
        $cart[$id] = [
            "name" => $product->name,
            "quantity" => $quantity, // Utilise la quantité passée en paramètre
            "price" => $product->price,
            "photo" => $product->photo
        ];
    }

    session()->put('cart', $cart); // Met à jour le panier dans la session

    return redirect()->back()->with('success', 'Produit ajouté au panier avec succès!');
}


public function destroy($id)
{
    // Recherche du produit à supprimer dans la base de données
    $cart = Cart::findOrFail($id);

    // Suppression du produit
    $cart->delete();

    // Redirection vers une page (par exemple la page d'accueil) avec un message de succès
    return redirect()->back();
}


public function confirmorder(Request $request) {
    $user = auth()->user();
    $name = $user->name;
    $phone = $user->phone;
    $address = $user->address;
    
    // Retrieve cart data from session
    $cart = $request->session()->get('cart');

    // Check if cart data is present and not empty
    if ($cart && count($cart) > 0) {
        foreach ($cart as $item) {
            // Create a new order for each item in the cart
            $order = new Order();
            $order->product_name = $item['name'];
            $order->price = $item['price'];
            $order->quantity = $item['quantity'];
            $order->name = $name;
            $order->phone = $phone;
            $order->address = $address;
            $order->status = 'not delivered';
            $order->save();
        }

        // Clear the cart session data after confirming the order
        $request->session()->forget('cart');

        return redirect('/')->with('success', 'Order Confirmed');
    } else {
        return redirect('/')->with('error', 'Cart is empty');
    }
}

public function search(){
    $search=request()->search;
    
   $product =  Product::where('name','like','%'.$search.'%')->get();
   return view('user.home', compact('product'));
}
public function remove(Request $request)
 {
     if($request->id) {

         $cart = session()->get('cart');

         if(isset($cart[$request->id])) {

             unset($cart[$request->id]);

             session()->put('cart', $cart);
         }

         session()->flash('success', 'Product removed successfully');
     }
 }

}