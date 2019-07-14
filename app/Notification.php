<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Notification extends Model
{
    protected $fillable = [
        'author_id', 'message'
    ];

    public function author() {
        return $this->belongsTo('App\User', 'author_id');
    }

    protected static function boot() {
        parent::boot();

        static::creating(function ($model) {
            if(isset(Auth::user()->id)){
                $user_id = Auth::user()->id;
            }else{
                $user_id = 0;
            }
            $model->author_id = $user_id;
        });
    }
}
