@extends('sla.app')

@section('content')
<div class="container">
    <h2>Edit Data SLA</h2>
    <form action="{{ route('sla.update', ['id' => $sla->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mt-3">
            <label for="tanggal">Tanggal</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $sla->tanggal }}" required>
        </div>

        <div class="form-group mt-3">
            <label for="daya_tx">Daya TX</label>
            <input type="text" class="form-control" id="daya_tx" name="daya_tx" value="{{ $sla->daya_tx }}" required>
        </div>

        <div class="form-group mt-3">
            <label for="keterangan_daya_tx">Keterangan Daya TX</label>
            <input type="text" class="form-control" id="keterangan_daya_tx" name="keterangan_daya_tx" value="{{ $sla->keterangan_daya_tx }}">
        </div>

        <div class="form-group mt-3">
            <label for="refleksi_tx">Refleksi TX</label>
            <input type="text" class="form-control" id="refleksi_tx" name="refleksi_tx" value="{{ $sla->refleksi_tx }}">
        </div>

        <div class="form-group mt-3">
            <label for="keterangan_refleksi_tx">Keterangan Refleksi TX</label>
            <input type="text" class="form-control" id="keterangan_refleksi_tx" name="keterangan_refleksi_tx" value="{{ $sla->keterangan_refleksi_tx }}">
        </div>

        <div class="form-group mt-3">
            <label for="cn_signal_ird">CN Signal IRD</label>
            <input type="text" class="form-control" id="cn_signal_ird" name="cn_signal_ird" value="{{ $sla->cn_signal_ird }}" required>
        </div>

        <div class="form-group mt-3">
            <label for="keterangan_cn_signal_ird">Keterangan CN Signal IRD</label>
            <input type="text" class="form-control" id="keterangan_cn_signal_ird" name="keterangan_cn_signal_ird" value="{{ $sla->keterangan_cn_signal_ird }}">
        </div>

        <div class="form-group mt-3">
            <label for="eb_no_ird">Eb/No IRD</label>
            <input type="text" class="form-control" id="eb_no_ird" name="eb_no_ird" value="{{ $sla->eb_no_ird }}" required>
        </div>

        <div class="form-group mt-3">
            <label for="keterangan_eb_no_ird">Keterangan Eb/No IRD</label>
            <input type="text" class="form-control" id="keterangan_eb_no_ird" name="keterangan_eb_no_ird" value="{{ $sla->keterangan_eb_no_ird }}">
        </div>

        <div class="form-group mt-3">
            <label for="tegangan_rst">Tegangan RST</label>
            <input type="text" class="form-control" id="tegangan_rst" name="tegangan_rst" value="{{ $sla->tegangan_rst }}" required>
        </div>

        <div class="form-group mt-3">
            <label for="keterangan_tegangan_rst">Keterangan Tegangan RST</label>
            <input type="text" class="form-control" id="keterangan_tegangan_rst" name="keterangan_tegangan_rst" value="{{ $sla->keterangan_tegangan_rst }}">
        </div>

        <div class="form-group mt-3">
            <label for="jam_siaran">Jam Siaran</label>
            <input type="time" class="form-control" id="jam_siaran" name="jam_siaran" value="{{ $sla->jam_siaran }}" required>
        </div>

        <div class="form-group mt-3">
            <label for="keterangan_jam_siaran">Keterangan Jam Siaran</label>
            <input type="text" class="form-control" id="keterangan_jam_siaran" name="keterangan_jam_siaran" value="{{ $sla->keterangan_jam_siaran }}">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update</button>
        <a href="{{ route('menu') }}" class="btn btn-secondary mt-3">Menu</a>
    </form>
</div>
@endsection
