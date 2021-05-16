<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{
    public $timestamps = false;
    protected $fillable = ['nameoffre', 'nomentreprise', 'localisation','datedepub','dateexpiration','info','discription','exigence'];
}
