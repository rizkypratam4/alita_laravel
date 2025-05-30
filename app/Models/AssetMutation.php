<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AssetMutation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'asset_id', 
        'work_place_id', 
        'location_id', 
        'departement_id', 
        'note',
        'image', 
        'departement_asset', 
        'departement_user', 
        'creator_id', 
        'updater_id'
    ];
    
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function asset() {
        return $this->belongsTo(Asset::class);
    }

    public function workPlace() {
        return $this->belongsTo(WorkPlace::class);
    }

    public function location() {
        return $this->belongsTo(Location::class);
    }

    public function departement() {
        return $this->belongsTo(Departement::class);
    }

    public function creator() {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function updater(){
        return $this->belongsTo(User::class, 'updater_id');
    }
}
