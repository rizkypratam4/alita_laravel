<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartementRequest;
use App\Models\Departement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departements = Departement::with(['creator', 'updater'])->latest()->paginate(5);
        return view('departements.index', compact('departements'));
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
    public function store(DepartementRequest $request)
    {
        Departement::create(
            [
                'name' => $request->name,
                'creator_id' => Auth::id(),
            ]
        );

        return redirect()->route('departements.index')->with(
            'success',
            'departement berhasil ditambahkan'
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
        $departement = Departement::findOrFail($id);
        $title = 'Editing departement';
    
        return view('departements.edit', [
            'departement' => $departement,
            'title' => $title
        ]);
    }
    


    /**
     * Update the specified resource in storage.
     */
    public function update(DepartementRequest $request, string $id)
    {
        $departement = Departement::findOrFail($id);
        $departement->name = $request->name;
        $departement->updater_id = Auth::id();
        $departement->save();

        return redirect()->route('departements.index')->with('success', 'departement updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $departement = Departement::findOrFail($id);
        $departement->delete();
        return redirect()->route('departements.index')->with('success', 'departement deleted successfully');
    }

    public function search(Request $request) 
    {
        $search = $request->input('search');
        $departements = Departement::with(['creator', 'updater'])
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

        return view('departements._table', compact('departements'))->render();
    }
}
