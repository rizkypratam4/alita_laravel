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

    public function departement() {
        return $this->belongsTo(Departement::class, 'departement_id');
    }

    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function type() {
        return $this->belongsTo(Type::class, 'type_id');
    }

    public function brand() {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function workPlace() {
        return $this->belongsTo(WorkPlace::class, 'work_place_id');
    }

    public function creator() {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function updater(){
        return $this->belongsTo(User::class, 'updater_id');
    }
}
