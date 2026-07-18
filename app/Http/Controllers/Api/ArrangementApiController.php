<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Arrangement;
use Illuminate\Http\Request;

class ArrangementApiController extends Controller
{
    public function index()
    {
        return response()->json(Arrangement::latest()->get());
    }

    public function show(Arrangement $arrangement)
    {
        return response()->json($arrangement);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'occasion'    => 'required|string',
            'color_theme' => 'nullable|string',
            'flowers'     => 'nullable|string',
            'event_date'  => 'required|date',
            'event_time'  => 'required',
        ]);

        $data['title'] = $data['occasion'] . ' — ' . ($data['color_theme'] ?? 'Custom Style');
        $data['status'] = 'pending';

        $arrangement = Arrangement::create($data);

        return response()->json($arrangement, 201);
    }
}