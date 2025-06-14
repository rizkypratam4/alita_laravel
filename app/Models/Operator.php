<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Operator extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'finish_good_schedule_id', 
        'wip_schedule_id', 
        'status_production', 
        'tanggal_selesai', 
        'waktu_selesai', 
        'creator_id', 
        'updater_id'
    ];

    protected static function booted(){
        static::creating(function ($model) {
            $model->created_at = $model->freshTimestamp();
            $model->updated_at = null;
        });
    }
    
    public function finishGoodSchedule()
    {
        return $this->belongsTo(FinishGoodSchedule::class, 'finish_good_schedule_id', 'id');
    }

    public function wipSchedule()
    {
        return $this->belongsTo(WipSchedule::class);
    }
}
