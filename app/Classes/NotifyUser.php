<?php

namespace App\Classes;

use App\Classes\Notify;
use App\Interfaces\INotification;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NotifyUser extends Notify implements INotification
{

  protected $notification_body;
  protected $postId;

  public function __construct($msg,$post_id)
  {
    $this->notification_body = $msg;
    $this->postId = $post_id;
  }

  /**
   * Get the notification's delivery channels.
   *
   * @param  mixed  $notifiable
   * @return array
   */
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
      return (new MailMessage)
                  ->line($this->notification_body)
                  ->action('See Post', url('posts/'.$this->postId))
                  ->line('Happy reading!');
  }  
}
