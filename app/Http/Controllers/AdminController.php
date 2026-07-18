<?php
namespace App\Http\Controllers;

use App\Models\Arrangement;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $bookings = Arrangement::latest()->get();
        return view('admin.dashboard', compact('bookings'));
    }

    public function approve(Arrangement $arrangement)
    {
        $arrangement->update(['status' => 'approved']);
        return back()->with('success', 'Booking approved.');
    }

    public function cancel(Arrangement $arrangement)
    {
        $arrangement->update(['status' => 'cancelled']);
        return back()->with('success', 'Booking cancelled.');
    }

    public function edit(Arrangement $arrangement)
    {
        return view('admin.edit', compact('arrangement'));
    }

    public function update(Request $request, Arrangement $arrangement)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required',
            'occasion'    => 'required|string',
            'price'       => 'required|numeric|min:0',
        ]);
        $arrangement->update($data);
        return redirect()->route('admin.dashboard')->with('success', 'Booking updated.');
    }

    public function destroy(Arrangement $arrangement)
    {
        $arrangement->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Booking deleted.');
    }
}