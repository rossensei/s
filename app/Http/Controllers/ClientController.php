<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        // $c = Client::orderBy('first_name', 'asc')
        // ->paginate(6);

        // dd($c);
        return inertia('Client/Index', [
            'clients' => Client::orderBy('first_name', 'asc')
                ->paginate(9)
        ]);
    }
}
