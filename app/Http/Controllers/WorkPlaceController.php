<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\WorkPlace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\WorkPlaceRequest;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class WorkPlaceController extends Controller
{
    public function index(WorkPlaceRequest $request)
    {
        
        $areas = Area::all();
        $work_places = QueryBuilder::for(WorkPlace::class)
                     ->allowedFilters([
                        AllowedFilter::partial('name'),
                        'area_id',
                        'category',
                     ])
                     ->with(['creator', 'updater', 'area'])
                     ->latest()
                     ->paginate(8)
                     ->withQueryString();
        return view('work_places.index', compact('work_places', 'areas'));
    }

    public function create()
    {
        $areas = Area::all();
        return view('work_places.new', compact('areas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WorkPlaceRequest $request)
    {
        if ($request -> hasFile('image')){
            $image_path = $request->file('image')->store('images/work_places', 'public');
        } else {
            $image_path = null;
        } 

        WorkPlace::create([
            'area_id' => $request->area_id,
            'name' => $request->name,
            'address' => $request->address,
            'opening_hours' => $request->opening_hours,
            'closing_hours' => $request->closing_hours,
            'comforta' => $request->comforta ?? false,
            'therapedic' => $request->therapedic ?? false,
            'spring_air' => $request->spring_air ?? false,
            'super_fit' => $request->super_fit ?? false,
            'isleep' => $request->isleep ?? false,
            'sleep_spa' => $request->sleep_spa ?? false,
            'category' => $request->category,
            'image' => $image_path,
            'creator_id' => Auth::id(),
        ]);
        
        return redirect()->route('work_places.index')->with(
            'success',
            'work_place berhasil ditambahkan'
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
        $work_place = WorkPlace::findOrFail($id);
        $areas = Area::all();
        $title = 'Editing work_place';
    
        return view('work_places.edit', [
            'work_place' => $work_place,
            'areas' => $areas,
            'title' => $title
        ]);
    }
    


    /**
     * Update the specified resource in storage.
     */
    public function update(WorkPlaceRequest $request, string $id)
    {
        $work_place = WorkPlace::findOrFail($id);
        $work_place->departement_id = $request->departement_id;
        $work_place->name = $request->name;
        $work_place->updater_id = Auth::id();
        $work_place->save();

        return redirect()->route('work_places.index')->with('success', 'work place updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $work_place = WorkPlace::findOrFail($id);
        $work_place->delete();
        return redirect()->route('work_places.index')->with('success', 'work_place deleted successfully');
    }

    public function search(Request $request) 
    {
        $search = $request->input('search');
        $work_places = WorkPlace::with(['creator', 'updater'])
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

        return view('work_places._table', compact('work_places'))->render();
    }
}
