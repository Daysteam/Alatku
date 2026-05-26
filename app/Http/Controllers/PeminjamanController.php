<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Peminjaman;
use App\Models\User;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $peminjamans = Peminjaman::with(['barang','user'])
        ->when($request->search, function ($query) use ($request){
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('nama', 'LIKE', '%' . $request->search . '%');
            });
        })
        ->latest()
        ->paginate(5);
        return view('peminjaman.index', compact('peminjamans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barangs = Barang::all();
        $users = User::all();
        return view('peminjaman.create',compact(['barangs','users']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'user_id' => 'required|exists:users,id',
            'tanggal_pinjam' => 'required|date|before_or_equal:today',
            'tanggal_kembali' => 'nullable|date|before_or_equal:today',
            'status' => 'required|in:kembali,pinjam',
            'jumlah' => 'required|numeric|min:1',
            'alasan' => 'nullable|string'
        ]);
            
        $diPinjam = $validated['status'];
        $barang = Barang::where('id', $validated['barang_id'])->first();
        $jumlah = $barang->jumlah;
        $jumlahPeminjaman = $validated['jumlah'];
        if($diPinjam === 'pinjam') {
            if($jumlah >= $jumlahPeminjaman) {
                $barang->jumlah = $jumlah - $jumlahPeminjaman;
                $barang->save();
            } else{
                return back()->withInput()->with('error',['Jumlah barang tidak mencukupi']);
            }
        } else {
            if($jumlahPeminjaman > $jumlah){
                return back()->withInput()->with('error',['Stok tidak mencukupi']);
            }
        }

        Peminjaman::create($validated);

        return redirect()->route('peminjaman.index')
        ->with('success','Berhasil menyimpan peminjaman');   
    }

    /**
     * Display the specified resource.
     */
    public function show(Peminjaman $peminjaman)
    {
        $peminjaman->load(['barang','user']);
        return view('peminjaman.show',compact('peminjaman'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peminjaman $peminjaman)
    {
        $barangs = Barang::all();
        $users = User::all();
        return view('peminjaman.edit', compact(['peminjaman','barangs','users']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Peminjaman $peminjaman)
    {
        
        $validated = $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'user_id' => 'required|exists:users,id',
            'tanggal_pinjam' => 'required|date|before_or_equal:today',
            'tanggal_kembali' => 'nullable|date|before_or_equal:tanggal_pinjam',
            'status' => 'required|in:kembali,pinjam',
            'jumlah' => 'required|integer|min:1',
            'alasan' => 'nullable|string'
        ]);
            
        $diPinjam = $validated['status'];
        $barang = Barang::where('id',$validated['barang_id'])->first();
        $jumlahLama = $barang->jumlah + $peminjaman->jumlah;
        $jumlahPeminjamanBaru = $validated['jumlah'];

        if($diPinjam === 'pinjam') {

            if($jumlahLama >= $jumlahPeminjamanBaru) {
                $jumlahBaru = $jumlahLama - $jumlahPeminjamanBaru;
                $barang->jumlah = $jumlahBaru;
                $barang->save();
            } else {
                return back()->withInput()->with('error',['Stok barang tidak mencukupi']);
            }

            $peminjaman->update($validated);
        } else {
            if($jumlahPeminjamanBaru > $jumlahLama){
                return back()->withInput()->with('error',['Stok tidak mencukupi']);
            }
        }

        $peminjaman->update($validated);

        return redirect()->route('peminjaman.index')
        ->with('success','Berhasil mengupdate peminjaman');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peminjaman $peminjaman)
    {
        if($peminjaman->status === 'pinjam'){
            $barang = Barang::where('id',$peminjaman->barang_id);
            $barang->jumlah = $barang->jumlah + $peminjaman->jumlah;
            $barang->save();
        }

        $peminjaman->delete();

        return redirect()->route('peminjaman.index')
        ->with('success','Berhasil menghapus peminjaman');
    }
}
