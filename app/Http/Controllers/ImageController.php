<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class ImageController extends Controller
{
    //get all images
    public function index(){
        return view('images.images')->with([
            'images' => Image::all()
        ]);
    }

    public function show($id){
        return view('images.image') -> with([
            'image' => Image::find($id)
        ]);
    }
}
