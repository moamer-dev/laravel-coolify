<?php

namespace App\Http\Controllers\Plan;

use Illuminate\Http\Request;
use App\Models\Progress;
use App\Http\Controllers\Controller;

class ProgressController extends Controller
{
    public function update(Request $request, $id)
    {
        $progress = Progress::findOrFail($id);

        if ($request->has('status') && $request->status === 'completed') {
            $completionTime = $progress->calculateCompletionTime();

            $request->merge([
                'completion_time' => $completionTime,
                'completion_percentage' => 100,
            ]);
        }

        $progress->update($request->only([
            'status',
            'completion_time',
            'completion_percentage'
        ]));
    }
}
