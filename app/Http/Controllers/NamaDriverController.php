<?php

namespace App\Http\Controllers;

use App\Models\NamaDriver;
use Illuminate\Http\Request;

class NamaDriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('admin');
        return view('dashboard.AdminManagement.NamaDriver.index', [
            'nama_drivers' => NamaDriver::all()
        ]);
    }

    public function getData()
    {
        $nama_drivers = NamaDriver::all();
        return $nama_drivers;
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
            'nama_driver' => 'required|max:100',
            'nik' => 'required|max:20'
        ]);

        NamaDriver::create($validateData);
        return redirect('/admin-management')->with('Berhasil', 'Data Sudah Tersimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NamaDriver  $namaDriver
     * @return \Illuminate\Http\Response
     */
    public function show(NamaDriver $namaDriver)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NamaDriver  $namaDriver
     * @return \Illuminate\Http\Response
     */
    public function edit(NamaDriver $namaDriver)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NamaDriver  $namaDriver
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NamaDriver $namaDriver)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NamaDriver  $namaDriver
     * @return \Illuminate\Http\Response
     */
    public function destroy(NamaDriver $nama_driver)
    {
        $this->authorize('admin');
        $nama_driver->delete();
        return redirect('/admin-management')->with('success', 'Data Nama Driver berhasil dihapus');
    }
}
