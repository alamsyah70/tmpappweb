<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Models\PenggunaanUnit;
use Illuminate\Database\Eloquent\Collection;

class DashboardPenggunaanUnit extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $namaDriverController = new NamaDriverController();
        $dataNamaDriver = $namaDriverController->getData();
    
        $nomorUnitController = new NomorUnitController();
        $dataNomorUnit = $nomorUnitController->getData();
    
        return view('dashboard.Penggunaan_Unit.index', compact('dataNamaDriver', 'dataNomorUnit'));
    }

    public function admindata(Request $request)
    {
        $penggunaan_units = PenggunaanUnit::query();
    
        // filter by tanggal_pembuatan
        $penggunaan_units->when($request->tanggal_pembuatan, function ($query) use ($request) {
            return $query->where('tanggal_pembuatan', 'like', '%' . $request->tanggal_pembuatan . '%');
        });
        
        // filter by driverDropdown
        $penggunaan_units->when($request->driverDropdown, function ($query) use ($request) {
            return $query->where('driverDropdown', 'like', '%' . $request->driverDropdown . '%');
        });
        
        // filter by unitDropdown
        $penggunaan_units->when($request->unitDropdown, function ($query) use ($request) {
            return $query->where('unitDropdown', 'like', '%' . $request->unitDropdown . '%');
        });
        
        // filter by tujuan_penggunaan
        $penggunaan_units->when($request->tujuan_penggunaan, function ($query) use ($request) {
            return $query->where('tujuan_penggunaan', 'like', '%' . $request->tujuan_penggunaan . '%');
        });
    
        $search = $request->input('search');
    
        return view('dashboard.AdminData.index', [
            'penggunaan_units' => $penggunaan_units->paginate(10),
            'search' => $search,
        ]);
    }
    

    public function getData()
    {
        $penggunaan_units = PenggunaanUnit::all();
        return $penggunaan_units;
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
        $validatedData = $request->validate([
            'tanggal_pembuatan' => 'required|date',
            'driverDropdown' => '',
            'unitDropdown' => '',
            'jam_first' => 'required',
            'jam_last' => 'required',
            'km_first' => 'required|max:8',
            'km_last' => 'required|max:8',
            'tujuan_penggunaan' => 'required|max:100',
            'remember' => 'accepted'
        ]);

        PenggunaanUnit::create($validatedData);
        return redirect('/dashboard')->with('Berhasil', 'Data Sudah Tersimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PenggunaanUnit  $penggunaanUnit
     * @return \Illuminate\Http\Response
     */
    public function show(PenggunaanUnit $penggunaanUnit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PenggunaanUnit  $penggunaanUnit
     * @return \Illuminate\Http\Response
     */
    public function edit(PenggunaanUnit $penggunaanUnit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PenggunaanUnit  $penggunaanUnit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PenggunaanUnit $penggunaanUnit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PenggunaanUnit  $penggunaanUnit
     * @return \Illuminate\Http\Response
     */
    public function destroy(PenggunaanUnit $penggunaanUnit)
    {
        $this->authorize('admin');
        $penggunaanUnit->delete();
        return redirect('/admin-data')->with('success', 'Data User berhasil dihapus');
    }

    public function exportPDF(Request $request)
    {
        $this->authorize('admin');
    
        // Dapatkan kata kunci pencarian dari request
        $searchTerm = $request->query('driverDropdown', 'unitDropdown', 'tanggal_pembuatan', 'tujuan_penggunaan');
    
        // Query data berdasarkan kolom 'search_field'
        $searchTerm = $request->query('search');

        $penggunaanUnit = PenggunaanUnit::where(function ($query) use ($searchTerm) {
            $query->where('driverDropdown', 'like', '%' . $searchTerm . '%')
                ->orWhere('unitDropdown', 'like', '%' . $searchTerm . '%')
                ->orWhere('tanggal_pembuatan', 'like', '%' . $searchTerm . '%')
                ->orWhere('tujuan_penggunaan', 'like', '%' . $searchTerm . '%');
        })->get();

        $penggunaanUnit = PenggunaanUnit::filter(['search' => $searchTerm])->get();
    
        // Buat objek Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
    
        $dompdf = new Dompdf($options);
    
        // Render view ke dalam PDF
        $html = view('dashboard.eksport.index', compact('penggunaanUnit'))->render();
        $dompdf->loadHtml($html);
    
        // Mengatur orientasi lanskap
        $dompdf->setPaper('landscape', 'A4');
    
        // Render PDF
        $dompdf->render();
    
        // Mengirim respons PDF
        return response($dompdf->output(), 200)->header('Content-Type', 'application/pdf');
    }
    

}
