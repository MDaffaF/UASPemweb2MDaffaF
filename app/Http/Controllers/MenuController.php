<?php

// app/Http/Controllers/MenuController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sla;

class MenuController extends Controller
{
    public function index()
    {
        $slaData = Sla::all(); // Mengambil semua data dari tabel Sla
        
        return view('sla.menu', ['slaData' => $slaData]);
    }
}

