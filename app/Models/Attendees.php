<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendees extends Model
{
    public $table = 'attendees';
    protected $fillable = [0];

    public $timestamps = false;
    protected $primaryKey = 'Id';
}
