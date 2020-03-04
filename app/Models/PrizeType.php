<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrizeType extends Model
{
    protected $table = 'prize_types';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'title',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
		
    ];
}
