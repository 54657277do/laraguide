<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapitre extends Model
{
    
    protected $fillable = [  
        'idchapitre',
        'nomchapitre',  
        'idformateur',  
        'idmodule',   
    ];   
    

    public function cours()  
    {  
        return $this->hasMany(Cour::class, 'idchapitre');  
    }  
}
