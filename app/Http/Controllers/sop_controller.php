<?php

namespace App\Http\Controllers;

use App\Models\SOP;
use Illuminate\Http\Request;

class sop_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.sop.index', [
            's_o_p_s' => SOP::all()
        ]);
    }

    public function view()
    {
        return view('dashboard.sop.view', [
            's_o_p_s' => SOP::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('admin');
        return view('dashboard.sop.create', [
            's_o_p_s' => SOP::all()
        ]);
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
        $validatedData = $request->validate([
            'pdf' => 'mimes:pdf|max:2048', // Menggunakan 'pdf' sebagai nama kolom
            'image' => 'image|file',
            'description' => ''
        ], [
            'pdf.mimes' => 'File harus berformat PDF.',
            'pdf.max' => 'File PDF maksimum 2 MB.',
            'image.image' => 'File harus berupa gambar.',
            'image.file' => 'File harus berupa gambar.',
            'image.max' => 'File gambar maksimum 1 MB.',
        ]);

        // Menggunakan kondisi untuk mengunggah file gambar jika ada
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        // Menggunakan kondisi untuk mengunggah file PDF jika ada
        if ($request->file('pdf')) {
            $validatedData['pdf'] = $request->file('pdf')->store('documents');
        }

        SOP::create($validatedData);

        return redirect('/dashboard')->with('success', 'File berhasil diupload.');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SOP  $sOP
     * @return \Illuminate\Http\Response
     */
    public function show(SOP $sOP)
    {
        return view('dashboard.sop.show', [
            's_o_p_s' => SOP::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SOP  $sOP
     * @return \Illuminate\Http\Response
     */
    public function edit(SOP $sOP)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SOP  $sOP
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SOP $sOP)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SOP  $sOP
     * @return \Illuminate\Http\Response
     */
    public function destroy(SOP $sop)
    {
        $this->authorize('admin');
        $sop->delete();
        return redirect('/standar-operasional-prosedur')->with('success', 'Data User berhasil dihapus');
    }
}
