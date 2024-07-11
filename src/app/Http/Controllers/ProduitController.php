<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search_value=$request->input("search");
        $pagination_number=5;
        if ($search_value){
             $produits = Produit::where("libelle", "like", "%".$search_value. "%")
             ->orWhere("prix", $search_value)
             ->orWhere("quantite", $search_value)
             ->paginate($pagination_number);
        }
        else{
             $produits = Produit::paginate($pagination_number);
 
        }
        $chemin_image="/storage/produits/";
        return view('produits.index', compact('produits',"chemin_image"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produits.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validated_data=$request->validate([
            'libelle' => 'required|max:255|unique:produits',
            'prix' => 'required',
            'quantite' => 'required',
            'image'=>'required|image',
        ]);
        //Generer l'image
        $image_produit=$request->file("image");
        $id=Produit::max("id")+1;
        $ext= $image_produit->getClientOriginalExtension();
        $nom_image=strtolower($request->libelle."_".$id.".".$ext);

        //sauvegarder l'image
        $image_produit->storeAs("public/produits", $nom_image);

        //changer le chemin de l'image
        $data=$validated_data;
        $data["image"]=$nom_image;

        //dd($data);

        Produit::create($data);
        
        return redirect()->route('produits.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produit $produit)
    {
        return view('produits.show', compact('produit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produit $produit)
    {
        return view('produits.edit',compact('produit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produit $produit)
    {

        $request->validate([
            'libelle' => 'required|max:255',
            'prix' => 'required',
            'quantite' => 'required',
            'image'=>'required',
            
            
          ]);
        $produit->update();
        return redirect()->route('produits.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produit $produit)
    {
        $produit->delete();
        return redirect()->route('produits.index');
    }
}