<?php

namespace App\Http\Controllers;

use App\Models\GalleryImage;
use App\Models\Result;
use App\Models\Service;

class WelcomeController extends Controller
{
    public function __invoke()
    {
        $services = Service::all();
        $result = Result::all();
        $gallery = GalleryImage::query()
            ->orderBy('sort')
            ->limit(6)
            ->get();

        $dots = [
            ['text' => 'ул. Доватора, 14В', 'link' => 'https://google.com', 'position' => 'top: 10%;right: 61%'],
            ['text' => 'ул. Доватора, 14В', 'link' => 'https://google.com', 'position' => 'top: 30%;left: 60%', 'right' => true],
            ['text' => 'ул. Доватора, 14В', 'link' => 'https://google.com', 'position' => 'top: 68%;right: 52%'],
        ];

        return view('welcome', [
            'services' => $services,
            'result' => $result,
            'dots' => $dots,
            'gallery' => $gallery,
        ]);
    }
}
