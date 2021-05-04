<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Forward;
 
class Others extends Mailable
{
    use Queueable, SerializesModels;
    protected $approvals;
    
    public function __construct(Forward $approvals)
    {
        $this->approvals = $approvals;
    }
    
    public function build()
    {
         return $this->from('sqlservice@addison.co.in')
                ->subject('REQUEST APPROVED')
                ->markdown('emails.others')
                 ->with([
                        'id' => $this->approvals->id,
                        'sen' => $this->approvals->sen,
                        'gen' => $this->approvals->gen,
                        'ref' => $this->approvals->ref,
                        'ref2' => $this->approvals->ref2,
                        'ref3' => $this->approvals->ref3,
                        'title' => $this->approvals->title,
                        'sub' => $this->approvals->sub,
                        'des' => $this->approvals->des,
                        'md' => $this->approvals->md,
                        'sd' => $this->approvals->sd,
                        'updated_at' => $this->approvals->updated_at,
                        'url' => '/status/'.$this->approvals->id,
                    ]);
    }
}
