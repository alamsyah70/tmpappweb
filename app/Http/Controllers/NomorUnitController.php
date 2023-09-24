<?php

namespace App\Http\Controllers;

use App\Models\NomorUnit;
use Illuminate\Http\Request;

class NomorUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('admin');
        return view('dashboard.AdminManagement.NomorUnit.index', [
            'nomor_units' => NomorUnit::all()
        ]);
    }

    public function getData()
    {
        $nomor_units = NomorUnit::all();
        return $nomor_units;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('admin');
        $validateData = $request->validate([
            'nomor_unit' => 'required|max:100',
        ]);

        NomorUnit::create($validateData);
        return redirect('/admin-management')->with('Berhasil', 'Data Sudah Tersimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NomorUnit  $nomorUnit
     * @return \Illuminate\Http\Response
     */
    public function show(NomorUnit $nomorUnit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NomorUnit  $nomorUnit
     * @return \Illuminate\Http\Response
     */
    public function edit(NomorUnit $nomorUnit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NomorUnit  $nomorUnit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NomorUnit $nomorUnit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NomorUnit  $nomorUnit
     * @return \Illuminate\Http\Response
     */
    public function destroy(NomorUnit $nomor_unit)
    {
        $this->authorize('admin');
        $nomor_unit->delete();
        return redirect('/admin-management')->with('success', 'Data Nama Driver berhasil dihapus');
    }
}
