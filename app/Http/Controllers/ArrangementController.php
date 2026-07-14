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
            'title'       => 'required|string|max:255',
            'description' => 'required',
            'occasion'    => 'required|string',
            'price'       => 'required|numeric|min:0',
            'image_path'  => 'nullable|string',
        ]);
        Arrangement::create($data);
        return redirect(route('arrangements.index'))->with('success', 'Arrangement added successfully!');
    }

    public function edit(Arrangement $arrangement)
    {
        return view('arrangements.edit', compact('arrangement'));
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