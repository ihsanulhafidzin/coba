<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tipe;

class TipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua data Tipe dari database
        $tipe = Tipe::all();

        // Mengirim data $tipes ke view 'tipe.index'
        return view('tipe.index', compact('tipe'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tipe.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data dari form
        $request->validate([
            'type' => 'required',
        ]);

        // Simpan data ke dalam database
        Tipe::create($request->all());

        // Redirect ke halaman daftar kategori
        return redirect()->route('tipe.index')
            ->with('success', 'Category created successfully.');
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
    public function edit(Tipe $tipe)
    {
        return view('tipe.edit', compact('tipe'));
    }
    public function update(Request $request, Tipe $tipe)
    {
        // Validasi data dari form
        $request->validate([
            'type' => 'required',
        ]);
        // Update data kategori di dalam database
        $tipe->update($request->all());
        // Redirect ke halaman daftar kategori
        return redirect()->route('tipe.index')
            ->with('success', 'Tipe updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Mengambil data tipe berdasarkan ID
        $tipe = Tipe::findOrFail($id);

        // Hapus data tipe dari database
        $tipe->delete();

        // Redirect ke halaman daftar tipe
        return redirect()->route('tipe.index')
            ->with('success', 'Type deleted successfully.');
    }
}
