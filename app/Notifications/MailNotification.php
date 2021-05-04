<?php

namespace App\Notifications;

use App\Forward;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Queue\SerializesModels;

class MailNotification extends Notification
{
    use Queueable,SerializesModels;


    public $approval;


    public function __construct(Forward $forward)
    {
        $this->approval = $approval;
    }


    public function build()
    {
        return $this->view('forms.email.others.mail');
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        if(!Auth::check()) 
            { 
                return redirect('users/login');
             }
        return (new MailMessage)
                    ->subject('ADDISON APPROVAL')
                    ->greeting('YOUR REQUEST HAS BEEN APPROVED!!!')
                    ->line('Congratulations!')
                    ->action('CHECK OUT', url('/status/'))
                    ->line('THANK YOU!!!')
                    ->view('forms.email.mail')
                    ->with([
                        'title' => $this->approval->title,
                        'sub' => $this->approval->sub,
                    ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */

}
    
