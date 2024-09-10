<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cours extends Model
{
    use HasFactory;
    protected $table = 'cours';  
    protected $primaryKey = 'idcours';  
    public $timestamps = false;  

    protected $fillable = [ 
        'idcours', 
        'idchapitre',  
        'idformateur',  
        'titrecours',  
        'contenucours',  
        'illustrationcours',  
    ];  

    public function chapitre()  
    {  
        return $this->belongsTo(Chapitre::class, 'idchapitre');  
    }  
}
