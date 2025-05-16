<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\User;
use App\Models\Division;
use App\Models\WorkPlace;
use App\Models\Departement;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\String_;

class ProfileController extends Controller
{
    public function show(User $profile){
        return view('profiles.show', [
            'user' => $profile,
            'areas' => Area::all(),
            'departements' => Departement::all(),
            'work_places' => WorkPlace::all(),
            'divisions' => Division::all(),
            'isEdit' => false
        ]);
    }

    public function editInfo(User $profile)
    {
        return view('profiles.edit_info', 
        [
            'user' => $profile, 
            'areas' => Area::all(),
            'departements' => Departement::all(),
            'work_places' => WorkPlace::all(),
            'divisions' => Division::all(),
            'isEdit' => true
        ]);
    }

    public function editWork(User $profile)
    {
        return view('profiles.edit_work', 
        [
            'user' => $profile, 
            'areas' => Area::all(),
            'departements' => Departement::all(),
            'work_places' => WorkPlace::all(),
            'divisions' => Division::all(),
            'isEdit' => true,
        ]);
    }

    public function updateWorkExperience(Request $request, User $profile)
    {
        $request->validate([
            'job_title' => 'required|string|max:255',
            'area_id' => 'required',
            'departement_id' => 'required',
            'work_place_id' => 'required',
            'division_id' => 'required',
        ]);

        $profile->update([
            'job_title' => $request->job_title,
            'area_id' => $request->area_id,
            'departement_id' => $request->departement_id,
            'work_place_id' => $request->work_place_id,
            'division_id' => $request->division_id,
        ]);

        return redirect()->route('profiles.show', $profile->username)->with('success', 'Data kerja berhasil diperbarui');
    }

    public function updateUserInfo(Request $request, User $profile)
    {
        $request->validate([
            'company' => 'required|string|max:255',
            'email' => 'required',
            'username' => 'required',
            'phone' => 'required',
        ]);

        $profile->update([
            'company' => $request->company,
            'email' => $request->email,
            'username' => $request->username,
            'phone' => $request->phone,
        ]);

        return redirect()->route('profiles.show', $profile->username)->with('success', 'Data user berhasil diperbarui');
    }


}
