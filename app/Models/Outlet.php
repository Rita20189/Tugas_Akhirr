<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function user() {
        return $this->belongsTo(User::class,'user_id');
    }

    public function menu() {
        return $this->hasOne(Menu::class);
    }
}
