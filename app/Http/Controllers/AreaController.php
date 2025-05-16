<?php

namespace App\Http\Controllers;

use App\Http\Requests\AreaRequest;
use App\Models\Area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $areas = Area::with(['creator', 'updater'])->latest()->paginate(5);
        return view('areas.index', compact('areas'));
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
    public function store(AreaRequest $request)
    {
        Area::create(
            [
                'code' => $request->code,
                'name' => $request->name,
                'creator_id' => Auth::id(),
            ]
        );

        return redirect()->route('areas.index')->with(
            'success',
            'Area berhasil ditambahkan'
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
        $area = Area::findOrFail($id);
        $title = 'Editing Area';
    
        return view('areas.edit', [
            'area' => $area,
            'title' => $title
        ]);
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(AreaRequest $request, string $id)
    {
        $area = Area::findOrFail($id);
        $area->code = $request->code;
        $area->name = $request->name;
        $area->updater_id = Auth::id();
        $area->save();

        return redirect()->route('areas.index')->with('success', 'Area updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $area = Area::findOrFail($id);
        $area->delete();
        return redirect()->route('areas.index')->with('success', 'Area deleted successfully');
    }

    public function search(Request $request) 
    {
        $search = $request->input('search');
        $areas = Area::with(['creator', 'updater'])
                        ->where(function ($query) use ($search) {
                            $query->where('code', 'like', "%{$search}%")
                                ->orWhere('name', 'like', "%{$search}%")
                                ->orWhereHas('creator', function ($q) use ($search) {
                                    $q->where('name', 'like', "%{$search}%");
                                })
                                ->orWhereHas('updater', function ($q) use ($search) {
                                    $q->where('name', 'like', "%{$search}%");
                                });
                        })
                        ->latest()
                        ->paginate(5);

        return view('areas._table', compact('areas'))->render();
    }
}
