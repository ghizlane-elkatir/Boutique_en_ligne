<?php

namespace App\Http\Controllers;
use App\Models\Categorie;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Str;

class CategorieController extends Controller
{
    public function index(){
        $categories = Categorie::all();
        return view('admin.categorie.index',compact('categories'));
    }
    public function create() {
        return view('admin.categorie.create');
    }
    public function store(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'image' => ['required', 'file'],
        ]);

        $uuid = Str::uuid()->toString();
        $imageName = time().'-'.$uuid.'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        Categorie::create([
            'name' => $request->name,
            'image' => $imageName
        ]);
        return to_route('admin.categorie.show');
    }
    public function update(Request $request , Categorie $categorie){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],]);
        $categorie->update([
                'name' => $request->name,
            ]);
             return to_route('admin.categorie.show');
    }
    public function edit(Request $request, Categorie $categorie) {
        return view('admin.categorie.edit', compact('categorie'));
    }
    public function destroy(Categorie $categorie) {
        $categorie->delete();
        return back()->with('message', 'Categorie Deleted Successfully');
    }
}