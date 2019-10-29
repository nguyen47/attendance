<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Uuid;

class Image extends Model
{
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = (string) Uuid::generate(4);
        });
    }
    public $incrementing = false;
    protected $guarded = [];

    public function students() {
        return $this->belongsTo('App\Student', 'student_id');
    }
}
