<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lokasi;

class LokasiController extends Controller
{

    public function index()
    {
        $lokasis = Lokasi::all();
        return view('index', compact('lokasis'));
    }

    public function store(Request $request)
    {
        $lokasi = new Lokasi;
        $lokasi->latitude = $request->input('latitude');
        $lokasi->longitude = $request->input('longitude');
        $lokasi->save();
    
        return redirect('/');
    }

    public function edit($id)
    {
        $lokasi = Lokasi::findOrFail($id);
        return view('edit', compact('lokasi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

        $lokasi = Lokasi::findOrFail($id);
        $lokasi->latitude = $request->input('latitude');
        $lokasi->longitude = $request->input('longitude');
        $lokasi->save();

        return redirect('/');
    }

    public function confirmDelete($id)
{
    $lokasi = Lokasi::find($id);
    return view('delete', compact('lokasi'));
}

public function destroy($id)
{
    Lokasi::destroy($id);
    return redirect('/');
}
    
}
