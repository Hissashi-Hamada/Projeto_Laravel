<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ClienteDados;

class ClienteDados_Controller extends Controller
{
    public function index()
    {
        return view('vendas.confirmar');

        
    }
}
