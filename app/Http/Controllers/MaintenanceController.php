<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Asset;
use App\Models\Brand;
use App\Models\Category;
use App\Models\WorkPlace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\MaintenanceRequest;

class MaintenanceController extends Controller
{
    public function index() {

        $assets = Asset::all();
        $workPlaces = WorkPlace::all();
        $categories = Category::all();
        $types = Type::all();
        $brands = Brand::all();
        return view('maintenances.index', compact('workPlaces', 'assets', 'types', 'categories', 'brands'));
    }

    public function create()
    {
        $assets = Asset::all();
        $workPlaces = WorkPlace::all();
        $categories = Category::all();
        $types = Type::all();
        $brands = Brand::all();
        return view('maintenances.new', compact('assets', 'brands', 'workPlaces', 'categories', 'types'));
    }

    public function store(MaintenanceRequest $request)
    {
        if ($request -> hasFile('image')){
            $image_path = $request->file('image')->store('images/maintenances', 'public');
        } else {
            $image_path = null;
        } 

        Asset::create([
            'departement_id' => $request->departement_id,
            'name' => $request->name,
            'tanggal_perolehan' => $request->tanggal_perolehan,
            'supplier' => $request->supplier,
            'serial_number' => $request->serial_number,
            'kode_asset' => $request->kode_asset,
            'harga' => $request->harga,
            'kapasitas' => $request->kapasitas,
            'brand_id' => $request->brand_id,
            'work_place_id' => $request->work_place_id,
            'category_id' => $request->category_id,
            'type_id' => $request->type_id,
            'keterangan' => $request->keterangan,
            'image' => $image_path,
            'status' => $request->status ?? false,
            'creator_id' => Auth::id(),
        ]);
        
        return redirect()->route('maintenances.index')->with(
            'success',
            'Maintenance asset berhasil ditambahkan'
        );
    }
}
