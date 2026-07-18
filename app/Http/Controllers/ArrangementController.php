<?php
namespace App\Http\Controllers;

use App\Models\Arrangement;
use Illuminate\Http\Request;

class ArrangementController extends Controller
{
    public function index()
    {
        $arrangements = Arrangement::all();
        return view('arrangements.index', compact('arrangements'));
    }

    public function create()
    {
        return view('arrangements.create');
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
        $data['description'] = 'Flowers requested: ' . ($data['flowers'] ?? 'Not specified');
        $data['status'] = 'pending';

        Arrangement::create($data);

        return redirect(route('arrangements.book.success'))->with('success', 'Your booking request has been submitted!');
    }

    public function edit(Arrangement $arrangement)
    {
        return view('admin.edit', compact('arrangement'));
    }

    public function update(Request $request, Arrangement $arrangement)
    {
        $arrangement->update($request->all());
        return redirect(route('arrangements.index'))->with('success', 'Arrangement updated successfully!');
    }

    public function destroy(Arrangement $arrangement)
    {
        $arrangement->delete();
        return redirect(route('arrangements.index'))->with('success', 'Arrangement deleted successfully!');
    }

    public function show(Arrangement $arrangement)
    {
        return view('arrangements.show', compact('arrangement'));
    }
}