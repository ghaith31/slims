<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    
        public function index()
        {
            // Exemple de données de statistiques
            $statistics = [
                'stat1' => 150,
                'stat2' => 75,
                'stat3' => 200,
                'stat4' => 50,
                'stat5' => 90,
                'stat6' => 120,
                'stat7' => 80,
                'stat8' => 60
            ];
    
            return response()->json($statistics);
        }
    
}
