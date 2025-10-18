<?php

namespace App\Http\Controllers;

use App\Models\Service;

class WelcomeController extends Controller
{
    public function __invoke()
    {
        $services = Service::all();

        return view('welcome', [
            'services' => $services,
        ]);
    }
}
