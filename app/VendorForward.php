<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Kyslik\ColumnSortable\Sortable;

class VendorForward extends Model
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
			'rec3',
			'update1',
           	'update2',
           	'update3',
           	'update4',
            'readat',
            'readat1',
            'readat2',
            'readat3',
            'readat4',
            'ip1',
            'ip2',
            'ip3',
            'ip4',
        ];

     public $table = "vendorforwards";
     public $primaryKey = 'id';
     public $timestamps = true;
     
     

    public function user() {
        return $this->belongsTo('User');
    }
}
