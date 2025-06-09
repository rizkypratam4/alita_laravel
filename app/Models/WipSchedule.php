<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WipSchedule extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name', 
        'qty', 
        'priority', 
        'kategori', 
        'schedule_status', 
        'creator_id', 
        'updater_id'
    ];

    protected static function booted(){
        static::creating(function ($model) {
            $model->created_at = $model->freshTimestamp();
            $model->updated_at = null;
        });
    }

    public function operators()
    {
        return $this->hasMany(Operator::class);
    }
}
