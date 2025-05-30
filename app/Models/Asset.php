<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Asset extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'tanggal_perolehan',
        'supplier',
        'serial_number',
        'kode_asset',
        'harga',
        'kapasitas',
        'brand_id',
        'work_place_id',
        'category_id',
        'departement_id',
        'type_id',
        'keterangan',
        'image',
        'status',
        'creator_id', 
        'updater_id'
    ];
    

    protected static function booted(){
        static::creating(function ($model) {
            $model->created_at = $model->freshTimestamp();
            $model->updated_at = null;
        });
    }

    public function latestMutation()
    {
        return $this->hasOne(AssetMutation::class)->latestOfMany();
    }

    public function machineSpecifications()
    {
        return $this->hasMany(MachineSpecification::class);
    }

    public function assetMutations()
    {
        return $this->hasMany(AssetMutation::class);
    }

    public function departement() {
        return $this->belongsTo(Departement::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function type() {
        return $this->belongsTo(Type::class);
    }

    public function brand() {
        return $this->belongsTo(Brand::class);
    }

    public function workPlace() {
        return $this->belongsTo(WorkPlace::class);
    }


    public function creator() {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function updater(){
        return $this->belongsTo(User::class, 'updater_id');
    }
}
