<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        
        
    {
        $formFields=$request->validate([
            'image'=>'image|required|max:2048',
            'price'=>'required|max:200',
            'name'=>'required|max:200',
            'description'=>'required',
            
            
        ]);
        
        if($request->hasFile('image')){
            $formFields['image']= $request->file('image')->store('images','public');
        }
        
        Product::create([
            'image'=>$formFields['image'],
            'price'=>$formFields['price'],
            'name'=>$formFields['name'],
            'description'=>$formFields['description'],
            
            
        ]);

        return redirect('/')->with('message','product created successfully');
    }

    }

    /**
     * Display the specified resource.
     */
   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
       // $product= Product::all();
       //$product=Product::find($product->id);
        return view('admin.updateview',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
        $product=Product::find($product->id);
        
             
    {
        $validatedData=$request->validate([
            'image'=>'image|required|max:2048',
            'price'=>'required|max:200',
            'name'=>'required|max:200',
            'description'=>'required',
            
            
        ]);
        $product->name = $validatedData['name'];
        $product->price = $validatedData['price'];
        $product->description = $validatedData['description'];

        // Vérifier si une nouvelle image a été téléchargée
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($product->image) {
                Storage::delete('public/'.$product->image);
            }
            // Enregistrer la nouvelle image
            $product->image = $request->file('image')->store('images', 'public');
        }

        // Sauvegarder les modifications dans la base de données
        $product->save();
        dd($request->all());
        // Rediriger avec un message de succès
        return redirect()->back();
    }}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Recherche du produit à supprimer dans la base de données
        $product = Product::findOrFail($id);

        // Suppression du produit
        $product->delete();

        // Redirection vers une page (par exemple la page d'accueil) avec un message de succès
        return redirect()->back();
    }

    public function show($id,Product $product)
    {
        //
        $product = Product::findOrFail($id); // Récupère le produit avec l'ID spécifié
    return view('admin.detaialproject', ['product' => $product]);
    }
}