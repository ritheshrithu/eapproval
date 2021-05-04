<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Kyslik\ColumnSortable\Sortable;

class Capex extends Model
{
        use Notifiable,Sortable;
         protected $fillable = [
        'sen',
        'gen',
        'ref',
        'ref2',
        'ref3',
        'title',
        'quantity',
        'reason',
        'manu',
        'import',
        'agent',
        'doc1',
        'doc2',
        'doc3',
        'capacity',
        'base',
        'eqcost',
        'duty',
        'vattable',
        'electrical',
        'total',
        'order',
        'terms',
        'warranty',
        'time',
        'purpose',
        'repname',
        'repold',
        'repreason',
        'repmode',
        'capcat',
        'capadd',
        'capquality',
        'capred',
        'capcomm',
        'capminmaj',
        'capspe',
        'acplants',
        'acfume',
        'acmeasure',
        'acvoltage',
        'acoil',
        'acmaterial',
        'accabin',
        'acfurniture',
        'accivil',
        'acelectrical',
        'space',
        'installapprox',
        'travel',
        'maintenance',
        'speinstruction',
        'training',
        'rec',
        'rec1',
        'rec2',
        'rec3',



    ];

     public $table = "capexes";
     public $primaryKey = 'id';
     public $timestamps = true;
     
     

     public function user()
     {
        return $this->belongsTo('App\User');
     }
}
