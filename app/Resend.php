<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Kyslik\ColumnSortable\Sortable;

class Resend extends Model

{
        use Notifiable,Sortable;
    protected $fillable = [
        'title','sen','gen','ref','ref2','ref3','des','md','sd','rec'
    ];

     public $table = "resends";
     public $primaryKey = 'id';
     public $timestamps = true;

     public function user()
     {
        return $this->belongsTo('App\User');
     }
}
 		