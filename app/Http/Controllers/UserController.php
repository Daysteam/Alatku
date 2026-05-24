<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try{
            $users = User::when($request->search, function ($query) use ($request) {
                $query->where('nama', 'LIKE' , '%' . $request->search . '%');
            })
            ->latest()
            ->paginate(5);

            return view('user.index',compact('users'));
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
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $validated = $request->validate([
                'nama' => 'required|string',
                'email' => 'required|email|unique:users,email'
            ]);

            User::create($validated);

            return redirect()->route('user.index')->with('success',"Berhasil menambahkan data");
        }catch(\Exception $e){
            return back()->withInput()
            ->with('error', [$e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        try{
            $validated = $request->validate([
                'nama' => 'required|string',
                'email' => 'required|email|unique:users,email,' . $user->id . ',id'
            ]);

            $user->update($validated);

            return redirect()->route('user.index')->with('success','Berhasil mengupdate data');
        }catch(\Exception $e){
            return back()->withInput()
            ->with('error', [$e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try{
            $user->delete();

            return redirect()->route('user.index')->with('success','Berhasil menghapus data');
        }catch(\Exception $e){
            return back()->withInput()
            ->with('error', [$e->getMessage()]);
        }
    }
}
