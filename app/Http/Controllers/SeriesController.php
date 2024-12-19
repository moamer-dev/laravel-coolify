<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        return view('series.zaytonah-view', compact('series', 'zaytonah_to_view'));
    }
}
