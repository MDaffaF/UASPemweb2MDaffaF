<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
            'keterangan_cn_signal_ird' => 'required',
            'eb_no_ird' => 'required',
            'keterangan_eb_no_ird' => 'required',
            'tegangan_rst' => 'required',
            'keterangan_tegangan_rst' => '',
            'jam_siaran' => 'required',
            'keterangan_jam_siaran' => '',
        ]);

        // Simpan data ke dalam database
        Sla::create([
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

        // Redirect ke halaman index SLA dengan pesan sukses
        return redirect()->route('sla.create')->with('success', 'Data SLA berhasil diperbarui.');
    }

    public function edit($id)
{
    // Ambil data SLA berdasarkan ID
    $sla = Sla::findOrFail($id);

    // Tampilkan view untuk mengedit data SLA dengan membawa data $sla
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

        // Redirect ke halaman index SLA dengan pesan sukses
        return redirect()->route('sla.edit')->with('success', 'Data SLA berhasil diperbarui.');
    }
    public function destroy($id){
    $sla = Sla::findOrFail($id);
    $sla->delete();
    return redirect()->route('menu')->with('success', 'Data SLA berhasil dihapus.');
}

}
