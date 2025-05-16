<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Requests\BrandRequest;
use Illuminate\Support\Facades\Auth;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::with(['creator', 'updater'])->latest()->paginate(5);
        return view('brands.index', compact('brands'));
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
    public function store(BrandRequest $request)
    {
        Brand::create(
            [
                'name' => $request->name,
                'creator_id' => Auth::id(),
            ]
        );

        return redirect()->route('brands.index')->with(
            'success',
            'brand berhasil ditambahkan'
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
        $brand = Brand::findOrFail($id);
        $title = 'Editing brand';
    
        return view('brands.edit', [
            'brand' => $brand,
            'title' => $title
        ]);
    }
    


    /**
     * Update the specified resource in storage.
     */
    public function update(BrandRequest $request, string $id)
    {
        $brand = Brand::findOrFail($id);
        $brand->name = $request->name;
        $brand->updater_id = Auth::id();
        $brand->save();

        return redirect()->route('brands.index')->with('success', 'brand updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();
        return redirect()->route('brands.index')->with('success', 'brand deleted successfully');
    }

    public function search(Request $request) 
    {
        $search = $request->input('search');
        $brands = Brand::with(['creator', 'updater'])
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

        return view('brands._table', compact('brands'))->render();
    }
}
