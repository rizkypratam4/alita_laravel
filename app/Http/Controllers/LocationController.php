<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LocationRequest;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::with(['creator', 'updater'])->latest()->paginate(5);
        return view('locations.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LocationRequest $request)
    {
        Location::create(
            [
                'name' => $request->name,
                'creator_id' => Auth::id(),
            ]
        );

        return redirect()->route('locations.index')->with(
            'success',
            'location berhasil ditambahkan'
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $location = Location::findOrFail($id);
        $title = 'Editing location';
    
        return view('locations.edit', [
            'location' => $location,
            'title' => $title
        ]);
    }
    


    /**
     * Update the specified resource in storage.
     */
    public function update(LocationRequest $request, string $id)
    {
        $location = Location::findOrFail($id);
        $location->name = $request->name;
        $location->updater_id = Auth::id();
        $location->save();

        return redirect()->route('locations.index')->with('success', 'location updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $location = Location::findOrFail($id);
        $location->delete();
        return redirect()->route('locations.index')->with('success', 'location deleted successfully');
    }

    public function search(Request $request) 
    {
        $search = $request->input('search');
        $locations = Location::with(['creator', 'updater'])
                        ->where(function ($query) use ($search) {
                            $query
                                ->where('name', 'like', "%{$search}%")
                                ->orWhereHas('creator', function ($q) use ($search) {
                                    $q->where('name', 'like', "%{$search}%");
                                })
                                ->orWhereHas('updater', function ($q) use ($search) {
                                    $q->where('name', 'like', "%{$search}%");
                                });
                        })
                        ->latest()
                        ->paginate(5);

        return view('locations._table', compact('locations'))->render();
    }
}
