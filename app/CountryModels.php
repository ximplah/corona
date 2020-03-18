<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CountryModels extends Model
{
    protected $table = 'countrylist';
    protected $fillable = [
        'country'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
       
    ];
}
