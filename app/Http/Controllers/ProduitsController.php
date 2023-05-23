<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Produit;
use Illuminate\Support\Str;

use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class ProduitsController extends Controller
{
    public function index() {
        $produits = Produit::all();
        return view('admin.produit.index', compact('produits'));
    }
    public function create() {
        $categories = Categorie::all();
        return view('admin.produit.create',compact('categories'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'description' => ['required', 'string'],
            'prix' => ['required', 'integer'],  
            'stock' => ['required', 'integer'],
            'avatar' => ['required', 'file', 'mimes:png,jpeg,jpg'],
            'categorie_id' => ['required'],
        ]);
        
        $uuid = Str::uuid()->toString();
        $imageName = time().'-'.$uuid.'.'.$request->avatar->extension();
        $request->avatar->move(public_path('images'), $imageName);
        
        Produit::create([
            'name' => $request->name,
            'description' => $request->description,
            'avatar' => $imageName,
            'prix' => $request -> prix,
            'stock' => $request -> stock,
            'categorie_id' => $request -> categorie_id,
        ]);
        return to_route('admin.produit.show');
    }
    public function update(Request $request) {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'avatar' => ['required', 'file', 'mimes:png,jpeg,jpg'],
            'categorie_id' => ['required', 'integer'],
        ]);
        
        $uploadedFile = $request->file('avatar');
        $result = Cloudinary::upload($uploadedFile->getRealPath());
        $imageUrl = $result->getSecurePath();

        $produits->update([
            'name' => $request->name,
            'description' => $request->description,
            'avatar' => $imageUrl,
        ]);
        return to_route('admin.produit.show');
    }
    public function edit(Request $request, Produit $produit) {
        return view('admin.produit.edit', compact('produit'));
    }
    public function destroy(Produit $produit) {
        $product = Produit::all();

        $produit->delete();
        return back()->with('message', 'Product Deleted Successfully');
    }
    public function search(Request $request)
{
    $name = $request->input('name');
    $prix = $request->input('prix');

    $query = Produit::query();

    if ($name) {
        $query->where('name', 'like', '%' . $name . '%');
    }

    if ($prix) {
        $query->where('prix', $prix);
    }

    $produits = $query->get();

    return view('products.search', compact('produits'));
}
}
