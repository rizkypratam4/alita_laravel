<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with(['creator', 'updater'])->latest()->paginate(5);
        return view('categories.index', compact('categories'));
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
    public function store(CategoryRequest $request)
    {
        Category::create(
            [
                'name' => $request->name,
                'creator_id' => Auth::id(),
            ]
        );

        return redirect()->route('categories.index')->with(
            'success',
            'category berhasil ditambahkan'
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
        $category = Category::findOrFail($id);
        $title = 'Editing category';
    
        return view('categories.edit', [
            'category' => $category,
            'title' => $title
        ]);
    }
    


    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->updater_id = Auth::id();
        $category->save();

        return redirect()->route('categories.index')->with('success', 'category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'category deleted successfully');
    }

    public function search(Request $request) 
    {
        $search = $request->input('search');
        $categories = Category::with(['creator', 'updater'])
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

        return view('categories._table', compact('categories'))->render();
    }
}
