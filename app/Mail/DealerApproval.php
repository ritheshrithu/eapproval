<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\DealerForward;
class DealerApproval extends Mailable
{
    use Queueable, SerializesModels;
    protected $approvals;
    
    public function __construct(DealerForward $approvals)
    {
        $this->approvals = $approvals;
    }
    
    public function build()
    {
         return $this->from('sqlservice@addison.co.in')
                ->subject('REQUEST RECEIVED')
                ->markdown('emails.dealerapproval')
                 ->with([
                        'id' => $this->approvals->id,
                        'sen' => $this->approvals->sen,
                        'gen' => $this->approvals->gen,
                        'ref' => $this->approvals->ref,
                        'ref2' => $this->approvals->ref2,
                        'ref3' => $this->approvals->ref3,
                        'location' => $this->approvals->name,
                        'vendorcode' => $this->approvals->address,
                        'created_at' => $this->approvals->updated_at,
                        'url' => '/status/'.$this->approvals->id,
                    ]);
    }
}
