<?php

namespace App\Http\Controllers;
use App\Models\category;
use App\Models\photo;

use Illuminate\Http\Request;

class galleryController extends Controller
{
    public function index()
    {
    	$category = category::all();
    	return view('gallery' , ['category' => $category]);
    }

    public function show($id)
    {
    	$photoget = photo::where('category_id', $id)->get();
    	$category = category::all();
        return view('gallery' , ['photoget' => $photoget, 'category' => $category]);
    }
}
