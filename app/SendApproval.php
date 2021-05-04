<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Kyslik\ColumnSortable\Sortable;

class SendApproval extends Model
{
    use Notifiable,Sortable;
         protected $fillable = [
        'type','sen','gen','ref','ref2','ref3','title','sub','des','md','sd','rec','rec1','rec2','rec3'
    ];

     public $table = "sendapprovals";
     public $primaryKey = 'id';
     public $timestamps = true;
     
     

     public function user()
     {
        return $this->belongsTo('App\User');
     }
}
