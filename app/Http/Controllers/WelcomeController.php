<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\Service;

class WelcomeController extends Controller
{
    public function __invoke()
    {
        $services = Service::all();
        $result = Result::all();

        return view('welcome', [
            'services' => $services,
            'result' => $result
        ]);
    }
}
