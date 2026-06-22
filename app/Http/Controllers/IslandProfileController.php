<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Illuminate\Http\Request;

class IslandProfileController extends Controller
{
    public function index()
    {
        // Fetch all businesses with their products and history logs pre-loaded efficiently
        $profiles = Business::with(['products', 'tradeHistories'])->get();

        // Return the dashboard view and pass the profiles data to it
        return view('island_profiles', compact('profiles'));
    }
}