<?php

namespace App\Http\Controllers;

use App\Models\Jasa;
use App\Models\JasaGallery;
use Illuminate\Http\Request;

class GalleryJasaController extends Controller
{
    public function index()
    {
        $jasas = Jasa::all();
        return view('pages.app.jasa.gallery', \compact('jasas'));
    }

    public function galleryStore(Request $request)
    {
        $files = $request->file('image');
        $path = 'upload/images/';
        if($request->hasFile('image')){
           foreach ($files as $file) {
            $name = $path."".mt_rand(10, 1000) ."_".$file->getClientOriginalName();
            $file->move(public_path($path), $name);
            JasaGallery::create([
                   'jasa_id' => $request->jasa_id,
                   'image' => $name
               ]);
            }
        }
        return to_route('jasa.index')->with(['success' => 'gallery berhasil ditambahkan']);
    }
}
