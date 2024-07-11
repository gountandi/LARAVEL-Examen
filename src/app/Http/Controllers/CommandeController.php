<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use Illuminate\Http\Request;
use Ismaelw\LaraTeX\LaraTeX;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pagination_number=5;
        $commandes = Commande::paginate($pagination_number);
        return view('commandes.index', compact('commandes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('commandes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'client' => 'required',
            'montant' => 'required',
            'date' => 'required',
           
            
          ]);
        Commande::create($request->all());

        return redirect()->route('commandes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Commande $commande)
    {
        return view('commndes.show', compact('commande'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Commande $commande)
    {
        return view('commandes.edit',compact('commande'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Commande $commande)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Commande $commande)
    {
        $commande->delete();
        return redirect()->route('commandes.index');
    }

    public function generer_facture(Commande $commande){
        
        return (new LaraTeX('latex.facture'))->with([
             'commande'=>$commande,
         ])->download('facture.pdf');
     }
}
