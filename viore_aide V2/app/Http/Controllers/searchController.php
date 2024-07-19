<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\commands; // Modèle client à adapter selon votre projet

class searchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->get('query');
        
        // Recherche par statut
        $results = commands::where('status', 'LIKE', "%{$query}%")->get();
        
        return response()->json($results);
    }
}