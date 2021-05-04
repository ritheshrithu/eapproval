<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Kyslik\ColumnSortable\Sortable;

class Vendor extends Model
{
	use Notifiable,Sortable;

	protected $fillable = [
			'location',
			'vendorcode',
			'paymentterms',
			'currency',
			'paymentmode',
			'class',
			'name',
			'address1',
			'address2',
			'address3',
			'city',
			'country',
			'state',
			'pincode',
			'phone',
			'fax',
			'email',
			'proposed',
			'doc1',
			'doc2',
			'doc3',
			'justification',
			'paymentofterm',
			'reference',
			'pan',
			'esi',
			'vendortype',
			'gststate',
			'gstin',
			'hsncode',
			'saccode',
			'rec',
			'rec1',
			'rec2',
			'rec3'
        ];

     public $table = "vendors";
     public $primaryKey = 'id';
     public $timestamps = true;
     
     

    public function user() {
        return $this->belongsTo('User');
    }

}
