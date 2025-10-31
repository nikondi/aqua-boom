<?php

namespace App\Http\Controllers;

use App\Enums\RequestStatus;
use App\Models\GalleryImage;
use App\Models\RequestModel;
use App\Models\Result;
use App\Models\Review;
use App\Models\Service;
use Illuminate\Http\Request;

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
            ['text' => 'ул. Доватора, 14В', 'link' => 'https://yandex.ru/maps/org/aquaboom/170646950441', 'position' => 'top: 10%;right: 61%'],
            ['text' => 'ул. Космонавтов, с53Б', 'link' => 'https://yandex.ru/maps/org/aquaboom/208101023989', 'position' => 'top: 30%;left: 60%', 'right' => true],
            ['text' => 'Базарная ул., с3/5, микрорайон Сырский Рудник', 'link' => 'https://yandex.ru/maps/org/aquaboom/231195982300', 'position' => 'top: 68%;right: 52%'],
        ];

        $reviews = Review::all();

        return view('welcome', [
            'services' => $services,
            'result' => $result,
            'dots' => $dots,
            'gallery' => $gallery,
            'reviews' => $reviews,
        ]);
    }

    public function form_send(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required|min:18|max:18',
        ]);

        RequestModel::create([
            'name' => $request->get('name'),
            'phone' => $request->get('phone'),
            'status' => RequestStatus::NEW
        ]);

        return response()->json(['success' => true]);
    }
}
