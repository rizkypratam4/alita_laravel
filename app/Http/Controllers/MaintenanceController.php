<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\User;
use Dotenv\Util\Str;
use App\Models\Asset;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Location;
use App\Models\WorkPlace;
use Illuminate\Http\Request;
use App\Models\AssetMutation;
use App\Models\MachineSpecification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\MaintenanceRequest;
use App\Http\Requests\AssetMutationRequest;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Http\Requests\MachineSpecificationRequest;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;
use Dompdf\Options;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class MaintenanceController extends Controller
{
    public function index() {

        $maintenances = QueryBuilder::for(Asset::with('workPlace', 'category', 'type', 'brand', 'departement'))
            ->allowedFilters([
                AllowedFilter::partial('name'),
                AllowedFilter::partial('serial_number'),
                AllowedFilter::exact('tanggal_perolehan'),
                AllowedFilter::partial('kode_asset'),
                AllowedFilter::partial('supplier'),
                AllowedFilter::exact('brand_id'),
                AllowedFilter::exact('work_place_id'),
                AllowedFilter::exact('category_id'),
                AllowedFilter::exact('type_id'),
            ])
            ->latest()
            ->paginate(5)
            ->appends(request()->query());
        
        $workPlaces = WorkPlace::all();
        $categories = Category::all();
        $types = Type::all();
        $brands = Brand::all();
        return view('maintenances.index', compact('workPlaces', 'maintenances', 'types', 'categories', 'brands'));
    }

    public function show($id) {
        $maintenance = Asset::findOrFail($id);
        return view('maintenances.show', compact('maintenance'));
    }

    public function create()
    {
        $maintenances = Asset::all();
        $workPlaces = WorkPlace::all();
        $categories = Category::all();
        $types = Type::all();
        $brands = Brand::all();
        return view('maintenances.new', compact('maintenances', 'brands', 'workPlaces', 'categories', 'types'));
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

     public function edit(string $id)
    {
        $maintenance = Asset::findOrFail($id);
        $title = 'Edit maintenance';
        $workPlaces = WorkPlace::all();
        $categories = Category::all();
        $types = Type::all();
        $brands = Brand::all();
    
        return view('maintenances.edit', [
            'maintenance' => $maintenance,
            'title' => $title,
            'workPlaces' => $workPlaces,
            'categories' => $categories,
            'types' => $types,
            'brands' => $brands
        ]);
    }

    public function update(MaintenanceRequest $request, string $id)
    {
        $maintenance = Asset::findOrFail($id);

        $maintenance->departement_id = $request->departement_id;
        $maintenance->name = $request->name;
        $maintenance->tanggal_perolehan = $request->tanggal_perolehan;
        $maintenance->supplier = $request->supplier;
        $maintenance->serial_number = $request->serial_number;
        $maintenance->kode_asset = $request->kode_asset;
        $maintenance->harga = $request->harga;
        $maintenance->kapasitas = $request->kapasitas;
        $maintenance->brand_id = $request->brand_id;
        $maintenance->work_place_id = $request->work_place_id;
        $maintenance->category_id = $request->category_id;
        $maintenance->type_id = $request->type_id;
        $maintenance->keterangan = $request->keterangan;
        $maintenance->image = $image_path ?? null;

        $maintenance->status = $request->status ?? false;
        $maintenance->updater_id = Auth::id();

        $maintenance->save();

        return redirect()->route('maintenances.index')->with('success', 'Maintenance updated successfully');
    }

    public function destroy(string $id)
    {
        $maintenance = Asset::findOrFail($id);
        $maintenance->delete();
        return redirect()->route('maintenances.index')->with('success', 'Maintenance deleted successfully');
    }

    public function specification(string $id)
    {
        $maintenance = Asset::findOrFail($id);
        return view('maintenances.specification', compact('maintenance'));
    }

    public function createSpecification(MachineSpecificationRequest $request)
    {
        foreach ($request->specs as $spec) {
            MachineSpecification::create([
                'asset_id' => $request->asset_id,
                'name' => $spec['name'],
                'value' => $spec['value'],
                'creator_id' => Auth::id(),
            ]);
        }
        return redirect()->route('maintenances.show', $request->asset_id)
                     ->with('success', 'Specification berhasil ditambahkan');
    }

    public function assetMutation(string $id)
    {
        $maintenance = Asset::with([
            'assetMutations.user.departement',
            'assetMutations.user.workPlace',
            'assetMutations.location'
        ])->findOrFail($id);

        $users = User::all();
        $locations = Location::all();

        return view('maintenances.mutation', compact('maintenance', 'users', 'locations'));
    }


    public function storeMutation(AssetMutationRequest $request, string $id)
    {
        try {
            $validated = $request->validated();

            $asset = Asset::findOrFail($id);
            $user = User::findOrFail($validated['user_id']);

            if ($request->hasFile('image')){
                $validated['image'] = $request->file('image')
                    ->store('maintenance/mutations', 'public');
            }

            AssetMutation::create([
                'asset_id' => $asset->id,
                'user_id' => $user->id,
                'location_id' => $validated['location_id'],
                'departement_id' => $user->departement_id,
                'work_place_id' => $user->work_place_id,
                'note' => $validated['note'] ?? null,
                'image' => $validated['image'] ?? null,
            ]);

            $asset->update([
                'user_id' => $user->id,
                'location_id' => $validated['location_id'],
                'departement_id' => $user->departement_id,
                'work_place_id' => $user->work_place_id
            ]);

            return redirect()->route('maintenances.show', $id)
                             ->with('success', 'Mutasi asset berhasil dicatat');


        } catch (\Throwable $e) {
            return back()->withInput()
                         ->with('error', 'Gagal mencatat mutasi ' . $e->getMessage());
        }
    }

    public function editMutation(string $id)
    {
        $maintenance = Asset::with([
            'assetMutations.user.departement',
            'assetMutations.user.workPlace',
            'assetMutations.location'
        ])->findOrFail($id);

        $lastMutation = $maintenance->assetMutations->last();

        $users = User::all();
        $locations = Location::all();

        return view('maintenances.edit_mutation', compact(
            'maintenance',
            'lastMutation',
            'users',
            'locations'
        ));
    }


    public function updateMutation(AssetMutationRequest $request, string $id)
    {
        try {
            $validated = $request->validated();

            $asset = Asset::findOrFail($id);
            $mutation = $asset->assetMutations()->latest()->first();

            if (!$mutation) {
                return redirect()->back()->with('error', 'Data mutasi tidak ditemukan');
            }

            $user = User::findOrFail($validated['user_id']);

            if ($request->hasFile('image')) {
                if ($mutation->image && Storage::disk('public')->exists($mutation->image)) {
                    Storage::disk('public')->delete($mutation->image);
                }

                $validated['image'] = $request->file('image')
                    ->store('maintenance/mutations', 'public');
            }

            $mutation->update([
                'user_id' => $user->id,
                'location_id' => $validated['location_id'],
                'departement_id' => $user->departement_id,
                'work_place_id' => $user->work_place_id,
                'note' => $validated['note'] ?? null,
                'image' => $validated['image'] ?? $mutation->image,
            ]);

            $asset->update([
                'user_id' => $user->id,
                'location_id' => $validated['location_id'],
                'departement_id' => $user->departement_id,
                'work_place_id' => $user->work_place_id,
            ]);

            return redirect()->route('maintenances.show', $id)
                            ->with('success', 'Mutasi asset berhasil diperbarui');

        } catch (\Throwable $e) {
            return redirect()->back()
                            ->withInput()
                            ->with('error', 'Gagal memperbarui mutasi: ' . $e->getMessage());
        }
    }

    public function showQrcode(string $id)
    {
        $maintenance = Asset::find($id);

        if (!$maintenance) {
            return redirect()->route('maintenances.index')
                            ->with('error', 'Kode asset tidak ditemukan');
        }

        // Generate QR Code data - you can customize this URL based on your needs
        $qrCodeData = url("/maintenances/{$maintenance->id}");
        
        // Alternative: you can also use route name
        // $qrCodeData = route('maintenances.show', $maintenance->id);
        
        // Generate QR code as SVG for display
        $qrCode = QrCode::size(200)
                        ->margin(2)
                        ->format('svg')
                        ->generate($qrCodeData);

        return view('maintenances.qrcode', compact('maintenance', 'qrCode'));
    }

    public function downloadQrCode($id)
    {
        $maintenance = Asset::find($id);

        if (!$maintenance) {
            return redirect()->route('maintenances.index')
                            ->with('error', 'Kode asset tidak ditemukan');
        }
        
        $qrCodeData = url("/maintenances/{$maintenance->id}");
        // Generate PNG base64 image string:
        $qrCodeImage = base64_encode(QrCode::format('png')->size(200)->margin(0)->generate($qrCodeData));
        
        $options = new Options();
        $options->set('defaultFont', 'Arial');
        $dompdf = new Dompdf($options);

        $html = view('pdf.qrcode-pdf', compact('maintenance', 'qrCodeImage'))->render();
        
        $dompdf->loadHtml($html);
        
        // Paper width 5cm (about 141.7 points) x height 8cm (about 226.77 points)
        $dompdf->setPaper([0, 0, 141.73, 226.77], 'landscape'); // 5cm x 8cm
        $dompdf->render();

        return $dompdf->stream("qrcode_asset_{$maintenance->kode_asset}.pdf", ['Attachment' => true]);
    }

}
