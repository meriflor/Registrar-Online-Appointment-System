<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AppRemarksUpdate extends Notification
{
    // use Queueable;
    // public $user;
 
    // /**
    //  * Create a new notification instance.
    //  *
    //  * @return void
    //  */
    // 
 
    // /**
    //  * Get the notification's delivery channels.
    //  *
    //  * @param  mixed  $notifiable
    //  * @return array
    //  */
    // public function via($notifiable)
    // {
    //     return ['database'];
    // }
 
    // /**
    //  * Get the mail representation of the notification.
    //  *
    //  * @param  mixed  $notifiable
    //  * @return \Illuminate\Notifications\Messages\MailMessage
    //  */
    // public function toMail($notifiable)
    // {
    //     return (new MailMessage)
    //                 ->line('The introduction to the notification.')
    //                 ->action('Notification Action', url('/'))
    //                 ->line('Thank you for using our application!');
    // }
 
    // /**
    //  * Get the array representation of the notification.
    //  *
    //  * @param  mixed  $notifiable
    //  * @return array
    //  */
    // public function toArray($notifiable)
    // {
    //     return [
    //         'name'  => $this->user->name,
    //         'email' => $this->user->email,
    //         'phone' => $this->user->phone,
    //     ];
    // }
    
    protected $remarks;
    protected $app_id;
    protected $notif_type;
    protected $title;
    protected $doc;
    protected $resched;
    public function __construct($remarks, $app_id, $notif_type, $title, $doc, $resched)
    {
        $this->remarks = $remarks;
        $this->app_id =  $app_id;
        $this->notif_type = $notif_type;
        $this->title = $title;
        $this->doc = $doc;
        $this->resched = $resched;
    }
    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'remarks' => $this->remarks,
            'app_id' => $this->app_id,
            'notif_type' => $this->notif_type,
            'title' => $this->title,
            'doc' => $this->doc,
            'resched' => $this->resched,
        ];
    }
}
