<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Draw extends Model
{
    protected $table = 'draws';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'draw_number',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
		
    ];
}
