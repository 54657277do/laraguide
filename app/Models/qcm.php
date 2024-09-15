<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class qcm extends Model
{
    use HasFactory;
    protected $table = 'qcm';  
    protected $primaryKey = 'idqcm';  
    public $timestamps = false;  

    protected $fillable = [ 
        'idqcm', 
        'idchapitre',  
        'idformateur',  
        'libelle',
        'illustrationqcm',  
        'option1',
        'option2',
        'option3',  
        'reponse'
    ];  

    public function chapitre()  
    {  
        return $this->belongsTo(Chapitre::class, 'idchapitre');  
    }  

    public function imageUrl():string {
        return Storage::url($this->illustrationqcm);
       }
}
