<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use Illuminate\Http\Request;

class LokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try{
            $lokasis = Lokasi::when($request->search, function ($query) use ($request) {
                $query->where('nama_lokasi', 'LIKE', '%' . $request->search . '%');
            })
            ->latest()
            ->paginate(5);

            return view('lokasi.index', compact('lokasis'));
        }catch(\Exception $e){
            return back()->withInput()
            ->with('error', [$e->getMessage()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('lokasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $validated = $request->validate([
                'nama_lokasi' => 'required|string|unique:lokasis,nama_lokasi'
            ]);

            Lokasi::create($validated);

            return redirect()->route('lokasi.index')->with('success','Berhasiil menambahkan data');
        }catch(\Exception $e){
            return back()->withInput()
            ->with('error', [$e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Lokasi $lokasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lokasi $lokasi)
    {
        return view('lokasi.edit',compact('lokasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lokasi $lokasi)
    {
        try{
            $validated = $request->validate([
                'nama_lokasi' => 'required|string|unique:lokasis,nama_lokasi,' . $lokasi->id ,',id'
            ]);

            $lokasi->update($validated);

            return redirect()->route('lokasi.index')->with('success','Berhasiil mengupdate data');
        }catch(\Exception $e){
            return back()->withInput()
            ->with('error', [$e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lokasi $lokasi)
    {
        try{
            $lokasi->delete();

            return redirect()->route('lokasi.index')->with('success','Berhasiil menghapus data');
        }catch(\Exception $e){
            return back()->withInput()
            ->with('error', [$e->getMessage()]);
        }
    }
}
