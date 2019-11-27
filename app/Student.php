<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Uuid;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Student extends Authenticatable
{
    use Notifiable;
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
    protected $hidden = ['password'];

    public function images()
    {
        return $this->hasMany('App\Image');
    }

    public function majors()
    {
        return $this->belongsTo('App\Major', 'major_id');
    }
}
