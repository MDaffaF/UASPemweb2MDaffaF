<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\Sla;

class SlaController extends Controller
{
    public function create()
    {
        return view('sla.create');
    }

    public function store(Request $request)
{
    // Validasi data input dari formulir
    $request->validate([
        'tanggal' => 'required|date',
        'daya_tx' => 'required',
        'keterangan_daya_tx' => '',
        'refleksi_tx' => '',
        'keterangan_refleksi_tx' => '',
        'cn_signal_ird' => 'required',
        'keterangan_cn_signal_ird' => '',
        'eb_no_ird' => 'required',
        'keterangan_eb_no_ird' => '',
        'tegangan_rst' => 'required',
        'keterangan_tegangan_rst' => '',
        'jam_siaran' => 'required',
        'keterangan_jam_siaran' => '',
    ]);

    // Simpan data SLA ke database
    $sla = new Sla([
        'tanggal' => $request->tanggal,
        'daya_tx' => $request->daya_tx,
        'keterangan_daya_tx' => $request->keterangan_daya_tx,
        'refleksi_tx' => $request->refleksi_tx,
        'keterangan_refleksi_tx' => $request->keterangan_refleksi_tx,
        'cn_signal_ird' => $request->cn_signal_ird,
        'keterangan_cn_signal_ird' => $request->keterangan_cn_signal_ird,
        'eb_no_ird' => $request->eb_no_ird,
        'keterangan_eb_no_ird' => $request->keterangan_eb_no_ird,
        'tegangan_rst' => $request->tegangan_rst,
        'keterangan_tegangan_rst' => $request->keterangan_tegangan_rst,
        'jam_siaran' => $request->jam_siaran,
        'keterangan_jam_siaran' => $request->keterangan_jam_siaran,
    ]);
    $sla->save();

    return redirect()->route('sla.create')->with('success', 'Data SLA berhasil ditambahkan.');
}

    public function edit($id) {
        $sla = Sla::findOrFail($id);
        return view('sla.edit', compact('sla'));
    }


    public function update(Request $request, $id)
{
    // Validasi data input dari formulir
    $request->validate([
        'tanggal' => 'required|date',
        'daya_tx' => 'required',
        'keterangan_daya_tx' => '',
        'refleksi_tx' => '',
        'keterangan_refleksi_tx' => '',
        'cn_signal_ird' => 'required',
        'keterangan_cn_signal_ird' => 'required',
        'eb_no_ird' => 'required',
        'keterangan_eb_no_ird' => 'required',
        'tegangan_rst' => 'required',
        'keterangan_tegangan_rst' => '',
        'jam_siaran' => 'required',
        'keterangan_jam_siaran' => '',
    ]);

    // Ambil data SLA berdasarkan ID
    $sla = Sla::findOrFail($id);

    // Update data SLA dengan data baru dari request
    $sla->update([
        'tanggal' => $request->tanggal,
        'daya_tx' => $request->daya_tx,
        'keterangan_daya_tx' => $request->keterangan_daya_tx,
        'refleksi_tx' => $request->refleksi_tx,
        'keterangan_refleksi_tx' => $request->keterangan_refleksi_tx,
        'cn_signal_ird' => $request->cn_signal_ird,
        'keterangan_cn_signal_ird' => $request->keterangan_cn_signal_ird,
        'eb_no_ird' => $request->eb_no_ird,
        'keterangan_eb_no_ird' => $request->keterangan_eb_no_ird,
        'tegangan_rst' => $request->tegangan_rst,
        'keterangan_tegangan_rst' => $request->keterangan_tegangan_rst,
        'jam_siaran' => $request->jam_siaran,
        'keterangan_jam_siaran' => $request->keterangan_jam_siaran,
    ]);
    $sla->save();

    // Redirect ke halaman edit SLA dengan pesan sukses
    return redirect()->route('sla.edit', ['id' => $id])->with('success', 'Data SLA berhasil diperbarui.');
}
public function destroy($id)
{
    $sla = Sla::findOrFail($id);
    $sla->delete();

    return redirect()->route('menu')->with('success', 'Data SLA berhasil dihapus.');
}
public function index(Request $request)
{
    $search = $request->input('search');

    $slaData = SLA::query()
        ->when($search, function ($query, $search) {
            return $query->where('tanggal', 'like', "%{$search}%")
                ->orWhere('daya_tx', 'like', "%{$search}%")
                ->orWhere('keterangan_daya_tx', 'like', "%{$search}%")
                ->orWhere('refleksi_tx', 'like', "%{$search}%")
                ->orWhere('keterangan_refleksi_tx', 'like', "%{$search}%")
                ->orWhere('cn_signal_ird', 'like', "%{$search}%")
                ->orWhere('keterangan_cn_signal_ird', 'like', "%{$search}%")
                ->orWhere('eb_no_ird', 'like', "%{$search}%")
                ->orWhere('keterangan_eb_no_ird', 'like', "%{$search}%")
                ->orWhere('tegangan_rst', 'like', "%{$search}%")
                ->orWhere('keterangan_tegangan_rst', 'like', "%{$search}%")
                ->orWhere('jam_siaran', 'like', "%{$search}%")
                ->orWhere('keterangan_jam_siaran', 'like', "%{$search}%");
        })
        ->get();

        $dataNotFound = $slaData->isEmpty();

        // Jika data tidak ditemukan, tampilkan SweetAlert
        if ($dataNotFound) {
            return view('sla.menu', compact('slaData', 'dataNotFound'))->with('error', 'Data tidak ditemukan.');
        }
    
        // Jika data ditemukan, tampilkan halaman dengan data
        return view('sla.menu', compact('slaData', 'dataNotFound'));
    }
public function generatePDF($id)
    {
        $slaData = Sla::findOrFail($id);
        $userData = auth()->user();

        $pdf = PDF::loadView('sla.pdf', compact('slaData', 'userData'))->setPaper('a4', 'landscape');

        return $pdf->download('SLA_Report_' . $slaData->id . '.pdf');
    }
}