<?php

namespace App\Classes;

use App\Classes\Notify;
use App\Interfaces\INotification;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use \Nexmo\Client as Nexmo;
use Nexmo\Client\Credentials\Basic;

class NotifyPublisher extends Notify implements INotification
{
  protected $messageBody;
  protected $phone_number;
  public function __construct($message,$phone)
  {
    $this->messageBody = $message;
    $this->phone_number = $phone;
  }

  /**
  * Get the notification's delivery channels.
  *
  * @param  mixed  $notifiable
  * @return array
  */
  public function via($notifiable)
  {
    return ['nexmo'];
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
    ->line('The introduction to the notification.')
    ->action('Notification Action', url('/'))
    ->line('Thank you for using our application!');
  }

  /**
  * Get the array representation of the notification.
  *
  * @param  mixed  $notifiable
  * @return array
  */
  public function toArray($notifiable)
  {
    return [
      //
    ];
  }

  public function toNexmo($notifiable)
  {
    $basic = new ntCredentialsBasic('9f91de3a', 'R6sGCP3gnl8qDvUz');
    $client = new Nexmo($basic);
    $message = $client->message->send([
      'to' => $this->phone_number,
      'from' => 'Publisher Blog',
      'text' => $this->messageBody,
    ]);
    Log::debug($message);
  }
}
