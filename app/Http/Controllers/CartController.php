<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\CartItem;


class CartController extends Controller
{
    public function index(){
        $cartItems = CartItem::all();
        return view('carts.show', ['cartItems' => $cartItems]);
        
    }
    public function showCart()
{
    $cartItems = CartItem::where('user_id', Auth::id())->get();
    
    
    return view('carts.show', ['cartItems' => $cartItems]);
}
    public function addToCart(Request $request)
{
    // Récupérez les données du formulaire de la requête
    $produitId = $request->input('produit_id');
    $quantity = $request->input('quantity');
    
    
    // Créez un nouvel élément de panier
    $cartItem = new CartItem();
    $cartItem->produit_id = $produitId;
    $cartItem->user_id = Auth::id(); // Si vous avez un système d'authentification
    $cartItem->quantity = $quantity;
    $cartItem->prix = Product::find($produitId)->getPrice();
    
    // Enregistrez l'élément de panier dans la base de données
    $cartItem->save();
    
    // Redirigez l'utilisateur vers une page de  confirmation ou vers la page du panier
    
    // Autres étapes à ajouter en fonction de votre logique
    
}
}
