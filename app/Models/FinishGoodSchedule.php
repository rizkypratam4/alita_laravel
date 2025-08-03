<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FinishGoodSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_number',
        'name',
        'keterangan',
        'quantity',
        'priority',
        'schedule_status',
        'area_id',
        'work_place_id',
        'creator_id',
        'updater_id'
    ];

    protected static function booted()
    {
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
