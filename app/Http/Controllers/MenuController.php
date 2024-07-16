<?php

// app/Http/Controllers/MenuController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sla;

class MenuController extends Controller
{
    public function index()
    {
        $slaData = Sla::all();
        
        return view('sla.menu', ['slaData' => $slaData]);
    }
}

