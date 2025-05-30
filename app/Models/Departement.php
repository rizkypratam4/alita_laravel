<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Departement extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'creator_id', 'updater_id'];

    protected static function booted(){
        static::creating(function ($model) {
            $model->created_at = $model->freshTimestamp();
            $model->updated_at = null;
        });
    }

    public function assets()
    {
        return $this->hasMany(Asset::class);
    }

    public function assetMutations()
    {
        return $this->hasMany(AssetMutation::class);
    }

    public function users()
    {
        return $this->hasMany(WorkPlace::class);
    }
    
    public function divisions(): HasMany {
        return $this->hasMany(Division::class);
    }

    public function creator() {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function updater(){
        return $this->belongsTo(User::class, 'updater_id');
    }
}
