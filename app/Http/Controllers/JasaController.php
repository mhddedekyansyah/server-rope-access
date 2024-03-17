<?php

namespace App\Http\Controllers;

use App\Models\Jasa;
use Illuminate\Http\Request;

class JasaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jasas = Jasa::with(['galleries'])->get();
        return view('pages.app.jasa.index', \compact('jasas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.app.jasa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Jasa::create($request->all());

        return to_route('jasa.index')->with(['success' => 'Berhasil Menambahkan Jasa']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jasa = Jasa::findOrFail($id);
        return view('pages.app.jasa.edit', compact('jasa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Jasa::findOrFail($id)->update([
                'name' => $request->name,
                'price' => $request->price,
                'handphone' => $request->handphone,
            ]);

        return to_route('jasa.index')->with(['success' => 'Berhasil Mengupdate Jasa']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Jasa::findOrFail($id)->delete();
        return back()->with(['success' => 'Berhasil Hapus Jasa']);
    }
}
