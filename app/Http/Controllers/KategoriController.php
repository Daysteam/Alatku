<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try{
            $kategoris = Kategori::when($request->search, function ($query) use ($request){
                $query->where('nama_kategori', 'LIKE' , '%' . $request->search . '%');
            })
            ->latest()
            ->paginate(5);
            return view('kategori.index', compact('kategoris'));
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
        return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $validated = $request->validate([
                'nama_kategori' => 'required|string|unique:kategoris,nama_kategori'
            ]);
            
            Kategori::create($validated);

            return redirect()->route('kategori.index')->with('success','Berhasil Menyimpan barang');
        }catch(\Exception $e){
            return back()->withInput()
            ->with('error', [$e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
        return view('kategori.edit',compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $kategori)
    {
        try{
            $validated = $request->validate([
                'nama_kategori' => ['required',
                    'string',
                    Rule::unique('kategoris','nama_kategori')->ignore($kategori->id)]
            ]);

            $kategori->update($validated);

            return redirect()->route('kategori.index')->with('success','Berhasil update barang');
        }catch(\Exception $e){
            return back()->withInput()
            ->with('error', [$e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        try{
            $kategori->delete();

            return redirect()->route('kategori.index')->with('success','Berhasil hapus barang');
        }catch(\Exception $e){
            return back()->withInput()
            ->with('error', [$e->getMessage()]);
        }
    }
}
