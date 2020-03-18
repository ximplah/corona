<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GlobalDataModels extends Model
{
    protected $table = 'globaldata';
    protected $fillable = [
        'cases','deaths','recovered'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
       
    ];
}
