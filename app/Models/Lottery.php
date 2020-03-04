<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lottery extends Model
{
    protected $table = 'lotterys';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type',
        'winner_number',
        'user_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
		
    ];
}
