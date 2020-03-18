<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CaseModels extends Model
{
    protected $table = 'caselist';
    protected $fillable = [
        'country_id','date','confirmed','deaths','recovered'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    
        

    ];
}
