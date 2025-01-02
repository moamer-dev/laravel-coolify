<?php

namespace App\Http\Controllers\Learn;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Series;

class SeriesController extends Controller
{
    public function zaytonah_view($series, $zaytonah)
    {
        $series = Series::with('category', 'zaytonahs')
            ->where('slug', $series)
            ->first();
        $zaytonah_to_view = $series->zaytonahs->where('id', $zaytonah)->first();
        //dd($series);
        return view('series.zaytonah-view', compact('series', 'zaytonah_to_view'), ['title' => $series->name, 'subtitle' =>  $series->description]);
    }
}
