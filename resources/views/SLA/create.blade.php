@extends('sla.app')

@section('content')
<div class="container">
    <h2>Tambah Data SLA</h2>
    <form action="{{ route('sla.store') }}" method="POST">
        @csrf
        <div class="form-group mt-3">
            <label for="tanggal">Tanggal</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
        </div>
        <div class="form-group mt-3">
            <label for="daya_tx">Daya TX</label>
            <input type="text" class="form-control" id="daya_tx" name="daya_tx" required>
        </div>
        <div class="form-group mt-3">
            <label for="keterangan_daya_tx">Keterangan Daya TX</label>
            <input type="text" class="form-control" id="keterangan_daya_tx" name="keterangan_daya_tx">
        </div>
        <div class="form-group mt-3">
            <label for="refleksi_tx">Refleksi TX</label>
            <input type="text" class="form-control" id="refleksi_tx" name="refleksi_tx">
        </div>
        <div class="form-group mt-3">
            <label for="keterangan_refleksi_tx">Keterangan Refleksi TX</label>
            <input type="text" class="form-control" id="keterangan_refleksi_tx" name="keterangan_refleksi_tx">
        </div>
        <div class="form-group mt-3">
            <label for="cn_signal_ird">CN Signal IRD</label>
            <input type="text" class="form-control" id="cn_signal_ird" name="cn_signal_ird" required>
        </div>
        <div class="form-group mt-3">
            <label for="keterangan_cn_signal_ird">Keterangan CN Signal IRD</label>
            <input type="text" class="form-control" id="keterangan_cn_signal_ird" name="keterangan_cn_signal_ird">
        </div>
        <div class="form-group mt-3">
            <label for="eb_no_ird">Eb/No IRD</label>
            <input type="text" class="form-control" id="eb_no_ird" name="eb_no_ird" required>
        </div>
        <div class="form-group mt-3">
            <label for="keterangan_eb_no_ird">Keterangan Eb/No IRD</label>
            <input type="text" class="form-control" id="keterangan_eb_no_ird" name="keterangan_eb_no_ird">
        </div>
        <div class="form-group mt-3">
            <label for="tegangan_rst">Tegangan RST</label>
            <input type="text" class="form-control" id="tegangan_rst" name="tegangan_rst" required>
        </div>
        <div class="form-group mt-3">
            <label for="keterangan_tegangan_rst">Keterangan Tegangan RST</label>
            <input type="text" class="form-control" id="keterangan_tegangan_rst" name="keterangan_tegangan_rst">
        </div>
        <div class="form-group mt-3">
            <label for="jam_siaran">Jam Siaran</label>
            <input type="time" class="form-control" id="jam_siaran" name="jam_siaran" required>
        </div>
        <div class="form-group mt-3">
            <label for="keterangan_jam_siaran">Keterangan Jam Siaran</label>
            <input type="text" class="form-control" id="keterangan_jam_siaran" name="keterangan_jam_siaran">
        </div>
        <button type="submit" class="btn btn-primary mt-3">
        <i class="fas fa-plus"> Tambah</i></button>
        <a href="{{ route('menu') }}" class="btn btn-secondary mt-3">
        <i class="fas fa-bars"></i> Menu</a>
    </form>
</div>
<script>
    document.getElementById('addSlaForm').addEventListener('submit', function() {
        document.getElementById('tanggal').value = '';
        document.getElementById('daya_tx').value = '';
        document.getElementById('keterangan_daya_tx').value = '';
        document.getElementById('refleksi_tx').value = '';
        document.getElementById('keterangan_refleksi_tx').value = '';
        document.getElementById('cn_signal_ird').value = '';
        document.getElementById('keterangan_cn_signal_ird').value = '';
        document.getElementById('eb_no_ird').value = '';
        document.getElementById('keterangan_eb_no_ird').value = '';
        document.getElementById('tegangan_rst').value = '';
        document.getElementById('keterangan_tegangan_rst').value = '';
        document.getElementById('jam_siaran').value = '';
        document.getElementById('keterangan_jam_siaran').value = '';
    });
</script>
@endsection
