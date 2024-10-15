<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Exception;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Catch_;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        try{
            
            $categories=Categorie::all();
            return  response()->json($categories);
        }catch(\Exception $e){
            
            return  response()->json("impossible d'afficher la liste des categories");
        }

    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {try{
        $categorie=new Categorie([
            "nomcategorie"=> $request->input("nomcategorie"),
            "imagescategorie"=>$request->input("imagescategorie")
        ]);
        $categorie->save();
        return response()->json($categorie);
    }catch(\Exception $e){
        return response()->json("probleme d'ajout");

    }

    }
    

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        try{
            $categorie=Categorie::findOrFail($id);
            return response()->json($categorie);

        }catch(\Exception $e){
            return response()->json("probleme d'affichage");

        }
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {

        try{
            $categorie=Categorie::findOrFail($id);
            $categorie->update($request->all());
            return response()->json($categorie);

        }catch(\Exception $e){
            return response()->json("MOdification impossible");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
    
        try{
            $categorie=Categorie::findOrFail($id);
            $categorie->delete();

        }catch(Exception $e){
            return response()->json("suppression impossible");
        }
    }
}
