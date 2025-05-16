<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\Departement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\DivisionRequest;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $divisions = Division::with(['creator', 'updater', 'departement'])->latest()->paginate(5);
        $departements = Departement::all(); // tambahkan ini
        return view('divisions.index', compact('divisions', 'departements'));
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
    public function store(DivisionRequest $request)
    {
        Division::create([
            'name' => $request->name,
            'departement_id' => $request->departement_id,
            'creator_id' => Auth::id(),
        ]);
        
        return redirect()->route('divisions.index')->with(
            'success',
            'Division berhasil ditambahkan'
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
        $division = Division::findOrFail($id);
        $departements = Departement::all();
        $title = 'Editing division';
    
        return view('divisions.edit', [
            'division' => $division,
            'departements' => $departements,
            'title' => $title
        ]);
    }
    


    /**
     * Update the specified resource in storage.
     */
    public function update(DivisionRequest $request, string $id)
    {
        $division = Division::findOrFail($id);
        $division->departement_id = $request->departement_id;
        $division->name = $request->name;
        $division->updater_id = Auth::id();
        $division->save();

        return redirect()->route('divisions.index')->with('success', 'division updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $division = Division::findOrFail($id);
        $division->delete();
        return redirect()->route('divisions.index')->with('success', 'division deleted successfully');
    }

    public function search(Request $request) 
    {
        $search = $request->input('search');
        $divisions = Division::with(['creator', 'updater'])
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

        return view('divisions._table', compact('divisions'))->render();
    }
}
