<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CouponNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

     public $coupons;
    public function __construct($coupons)
    {
        //
        $this->coupons = $coupons;
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
        $email =  (new MailMessage)
            ->subject('Coupon Confirmation')
            ->from(config('mail.from.address'),config('mail.from.name'))
            ->replyTo('hello@cartlow.com',config('mail.from.name'))
            ->view('users.coupon',with([
                'coupons'=>$this->coupons
            ]));
            foreach($this->coupons  as $coupon)
            {
                if(!empty($coupon->image))
                {
                    $image = public_path('file').'/'.$coupon->image;
                }
                $email = $email->attach($image);

            }
            return $email;
                   
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
}
