<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Lokasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try{
            $barangs = Barang::with(['kategori','lokasi'])
            ->when($request->search, function ($query) use ($request){
                $query->where('nama_barang', 'LIKE' , '%' . $request->search . '%');
            })
            ->latest()
            ->paginate(5);
            return view('barang.index', compact('barangs'));
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
        $kategoris = Kategori::all();
        $lokasis = Lokasi::all();
        return view('barang.create', compact(['lokasis','kategoris']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $validated = $request->validate([
                'nama_barang' => 'required|string',
                'kode_barang' => 'required|string|unique:barangs,kode_barang',
                'kategori_id' => 'required|exists:kategoris,id',
                'lokasi_id' => 'required|exists:lokasis,id',
                'jumlah' => 'required|min:1|numeric',
                'kondisi' => 'required|in:baik,rusak,perbaikan',
            ]);

            Barang::create($validated);

            return redirect()->route('barang.index')->with('success','Berhasil memasukan data');
        }catch(\Exception $e){
            return back()->withInput()
            ->with('error', [$e->getMessage()]);
        } 
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        $kategoris = Kategori::all();
        $lokasis = Lokasi::all();
        return view('barang.edit', compact(['barang','lokasis','kategoris']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang)
    {
        try{
            $validated = $request->validate([
                'nama_barang' => 'required|string',
                'kode_barang' => 'required|string|unique:barangs,kode_barang,' . $barang->id . ',id',
                'kategori_id' => 'required|exists:kategoris,id',
                'lokasi_id' => 'required|exists:lokasis,id',
                'jumlah' => 'required|min:1|numeric',
                'kondisi' => 'required|in:baik,rusak,perbaikan',
            ]);

            $barang->update($validated);

            return redirect()->route('barang.index')->with('success','Berhasil mengupdate data');
        }catch(\Exception $e){
            return back()->withInput()
            ->with('error', [$e->getMessage()]);
        } 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        try{
            $barang->delete();

            return redirect()->route('barang.index')->with('success','Berhasil menghapus data');
        }catch(\Exception $e){
            return back()->withInput()
            ->with('error', [$e->getMessage()]);
        } 
    }
}
