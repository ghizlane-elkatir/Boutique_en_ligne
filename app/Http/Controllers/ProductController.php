<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;

class ProductController extends Controller
{
    public function index(){
        $produits = Produit::all(); 
        return view('products.product', compact('produits'));
    }
    public function showProduct($id)
    {
        $produit = Produit::find($id); 

        
        $prix = $produit->getPrice();

        return view('product.show', ['prix' => $prix]);
    }
    public function addToCart(Request $request)
    {
        // Récupérer les données de la requête
        $produitId = $request->input('produit_id');
        $quantity = $request->input('quantity');

        // Valider les données
        $validatedData = $request->validate([
            'produit_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);
        dd($validatedData);
        // Récupérer le produit
        $produit = Produit::find($produitId);

        // Créer une nouvelle instance de CartItem
        $cartItem = new CartItem();
        $cartItem->produit_id = $produit->id;
        $cartItem->quantity = $quantity;
        $cartItem->price = $produit->getPrice();

        // Enregistrer le nouvel élément du panier dans la base de données
        $cartItem->save();

        // Rediriger ou afficher un message de succès
        return redirect()->back()->with('success', 'Le produit a été ajouté au panier avec succès.');
    }
    
}
