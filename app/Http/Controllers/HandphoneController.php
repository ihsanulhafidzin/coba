<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Handphone;
use App\Models\Tipe;

class HandphoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $handphones = Handphone::all();
        return view('handphones.index', compact('handphones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipes = Tipe::all();
        return view('handphones.create', compact('tipes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'merek' => 'required|string|max:255',
            'warna' => 'required|string|max:255',
            'ram' => 'required|integer',
            'harga' => 'required|integer',
            'type' => 'required|exists:tipes,id',
        ]);

        Handphone::create($request->all());

        return redirect()->route('handphones.index')
            ->with('success', 'Handphone created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Handphone $handphone)
    {
        // Optional: add logic to display a single handphone if needed.
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Handphone $handphone)
    {
        $tipes = Tipe::all();
        return view('handphones.edit', compact('handphone', 'tipes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Handphone $handphone)
    {
        $request->validate([
            'merek' => 'required|string|max:255',
            'warna' => 'required|string|max:255',
            'ram' => 'required|integer',
            'harga' => 'required|integer',
            'type' => 'required|exists:tipes,id',
        ]);

        $handphone->update($request->all());

        return redirect()->route('handphones.index')
            ->with('success', 'Handphone updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Handphone $handphone)
    {
        $handphone->delete();

        return redirect()->route('handphones.index')
            ->with('success', 'Handphone deleted successfully.');
    }
}
