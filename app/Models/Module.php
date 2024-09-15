<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $primaryKey='idmodule';
    protected $fillable = [  
        'idmodule',  
        'idformateur',
        'nommodule',
        'description',
        'prerequis' 
    ];  
}
