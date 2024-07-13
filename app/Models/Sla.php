<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sla extends Model
{
    use HasFactory;

    protected $table = 'sla'; // Menyesuaikan nama tabel jika perlu

    protected $fillable = [
        'id',
        'tanggal',
        'daya_tx',
        'keterangan_daya_tx',
        'refleksi_tx',
        'keterangan_refleksi_tx',
        'cn_signal_ird',
        'keterangan_cn_signal_ird',
        'eb_no_ird',
        'keterangan_eb_no_ird',
        'tegangan_rst',
        'keterangan_tegangan_rst',
        'jam_siaran',
        'keterangan_jam_siaran',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

