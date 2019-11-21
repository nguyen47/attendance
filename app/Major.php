<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Uuid;

class Major extends Model
{
    /**
     *  Setup model event hooks
     */
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = (string) Uuid::generate(4);
        });
    }
    public $incrementing = false;
    protected $guarded = [];

    public function students()
    {
        return $this->hasMany('App\Student');
    }
}
