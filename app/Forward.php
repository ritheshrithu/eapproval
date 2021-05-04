<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Kyslik\ColumnSortable\Sortable;

class Forward extends Model
{
        use Notifiable,Sortable;
        protected $fillable = [
        'title','sen','gen','ref','ref2','ref3','des','sub','md','sd','rec','rec1','rec2','rec3','update1','update2','update3','update4','ip1','ip2','ip3','ip4'
    ];

     public $table = "forwards";
     public $primaryKey = 'id';
     public $timestamps = true;

      public function user()
     {
        return $this->belongsTo('App\User');
     }
}

