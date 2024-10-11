<?php

namespace App\Http\Controllers;

use App\Models\AboutUs; // Make sure to import the AboutUs model

class AboutUsController extends Controller
{
    public function index()
    {
        $aboutUsData = AboutUs::all(); // Retrieve all data from the AboutUs model
        return view('about-us', ['aboutUsData' => $aboutUsData]); // Pass the data to the view
    }
}