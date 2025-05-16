<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;
use App\Http\Requests\TypeRequest;
use Illuminate\Support\Facades\Auth;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::with(['creator', 'updater'])->latest()->paginate(5);
        return view('types.index', compact('types'));
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
    public function store(TypeRequest $request)
    {
        Type::create(
            [
                'name' => $request->name,
                'creator_id' => Auth::id(),
            ]
        );

        return redirect()->route('types.index')->with(
            'success',
            'type berhasil ditambahkan'
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
        $type = Type::findOrFail($id);
        $title = 'Editing type';
    
        return view('types.edit', [
            'type' => $type,
            'title' => $title
        ]);
    }
    


    /**
     * Update the specified resource in storage.
     */
    public function update(TypeRequest $request, string $id)
    {
        $type = Type::findOrFail($id);
        $type->name = $request->name;
        $type->updater_id = Auth::id();
        $type->save();

        return redirect()->route('types.index')->with('success', 'type updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $type = Type::findOrFail($id);
        $type->delete();
        return redirect()->route('types.index')->with('success', 'type deleted successfully');
    }

    public function search(Request $request) 
    {
        $search = $request->input('search');
        $types = Type::with(['creator', 'updater'])
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

        return view('types._table', compact('types'))->render();
    }
}
