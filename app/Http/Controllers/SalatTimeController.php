<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SalatTime;

class SalatTimeController extends Controller
{
    public function index()
    {
        $salatTimes = SalatTime::all();
        return view('salat-times.index', compact('salatTimes'));
    }

    public function create()
    {
        return view('salat-times.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'prayer' => 'required|unique:salat_times|max:255',
            'time' => 'required|date_format:H:i',
        ]);
    
        // Debugging: Check if the request data is correct
        // dd($request->all());
    
        SalatTime::create($request->all());
    
        return redirect()->route('salat-times.index')
                         ->with('success', 'Salat time created successfully.');
    }
    

    public function edit(SalatTime $salatTime)
    {
        return view('salat-times.edit', compact('salatTime'));
    }

    public function update(Request $request, SalatTime $salatTime)
    {
        $request->validate([
            'prayer' => 'required|max:255|unique:salat_times,prayer,' . $salatTime->id,
            'time' => 'required|date_format:H:i',
        ]);

        $salatTime->update($request->all());

        return redirect()->route('salat-times.index')
                         ->with('success', 'Salat time updated successfully.');
    }

    public function destroy(SalatTime $salatTime)
    {
        $salatTime->delete();

        return redirect()->route('salat-times.index')
                         ->with('success', 'Salat time deleted successfully.');
    }
}
