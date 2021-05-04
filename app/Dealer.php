<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Kyslik\ColumnSortable\Sortable;
class Dealer extends Model
{
	 use Notifiable,Sortable;
         protected $fillable = [
        'sen',
        'gen',
        'ref',
        'ref2',
        'ref3',
        'reference',
        'name',
        'address',
        'email',
        'pan',
        'constitution',
        'handler',
        'year',
        'gst',
        'state',
        'dealerbank',
        'authdealer',
        'authdirect',
        'selling',
        'cutting',
        'reason',
        'nettake1',
        'nettake2',
        'nettake3',
        'paymentterms',
        'rec',
        'rec1',
        'rec2',
        'rec3'        
        ];

     public $table = "dealers";
     public $primaryKey = 'id';
     public $timestamps = true;
     
     

     public function user()
     {
        return $this->belongsTo('App\User');
     }

}
