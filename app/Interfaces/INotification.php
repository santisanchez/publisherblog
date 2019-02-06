<?php

namespace App\Interfaces;


/**
 *
 */
interface INotification
{
  public function via($notifiable);
  public function toMail($notifiable);

}
