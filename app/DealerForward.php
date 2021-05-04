<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Kyslik\ColumnSortable\Sortable;

class DealerForward extends Model
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
        'rec3',
        'des',
        'readat',      
        'readat1',      
        'readat2',      
        'readat3',      
        'readat4',
        'update',      
        'update1',      
        'update2',      
        'update3',      
        'update4',      
        'ip1',      
        'ip2',      
        'ip3',      
        'ip4',      

        ];

     public $table = "dealerforwards";
     public $primaryKey = 'id';
     public $timestamps = true;
     
     

     public function user()
     {
        return $this->belongsTo('App\User');
     }

}
