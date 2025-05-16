<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WorkPlace extends Model
{
    use HasFactory;

    protected $fillable = [
        'area_id',
        'name', 
        'address', 
        'opening_hours', 
        'closing_hours', 
        'comforta', 
        'therapedic', 
        'spring_air', 
        'super_fit', 
        'isleep', 
        'sleep_spa', 
        'category', 
        'image', 
        'creator_id', 
        'updater_id'
    ];

    protected static function booted(){
        static::creating(function ($model) {
            $model->created_at = $model->freshTimestamp();
            $model->updated_at = null;
        });
    }
    public function assets()
    {
        return $this->hasMany(Asset::class, 'work_place_id');
    }
    
    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function users()
    {
        return $this->hasMany(WorkPlace::class);
    }

    public function creator() {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function updater(){
        return $this->belongsTo(User::class, 'updater_id');
    }
}
