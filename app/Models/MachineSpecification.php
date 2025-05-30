<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MachineSpecification extends Model
{
    use HasFactory;

    protected $fillable = ['asset_id', 'name', 'value', 'creator_id', 'updater_id'];

    protected static function booted(){
        static::creating(function ($model) {
            $model->created_at = $model->freshTimestamp();
            $model->updated_at = null;
        });
    }

    public function asset() {
        return $this->belongsTo(Asset::class);
    }
    
    public function creator() {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function updater(){
        return $this->belongsTo(User::class, 'updater_id');
    }
}
