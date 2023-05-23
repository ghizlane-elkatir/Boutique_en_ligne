<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;

class HomeController extends Controller
{
    public function index(){
        $categories=Categorie::all();

        return view('welcome',compact('categories'));
    }
    public function show(Categorie $categorie){
        $produits = $categorie->produits;

        return view('products.product',compact('produits'));
    }
}
