<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Kyslik\ColumnSortable\Sortable;
class CreditForward extends Model
{
    use Notifiable,Sortable;
         protected $fillable = [
        'sen',
        'gen',
        'ref',
        'ref2',
        'ref3',
        'reference',
        'title',
        'address',
        'telephone',
        'constitution',
        'year',
        'email',
        'mobile',
        'pan',
        'cin',
        'gst',
        'state',
        'currency',
        'bankname',
        'bankbranch',
        'bankaccno',
        'bankifsc',
        'setup',
        'component',
        'supplied',
        'cuttools',
        'duration',
        'source',
        'brands',
        'sales1',
        'sales2',
        'sales3',
        'employees',
        'transaction',
        'annual',
        'payment',
        'justify',
        'remarks',
        'doc1',
        'doc2',
        'doc3',
        ];

     public $table = "creditforwards";
     public $primaryKey = 'id';
     public $timestamps = true;
     
     

     public function user()
     {
        return $this->belongsTo('App\User');
     }

}
