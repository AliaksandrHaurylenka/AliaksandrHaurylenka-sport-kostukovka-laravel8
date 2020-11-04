<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\DB;

class NewComment extends Notification
{
    use Queueable;

    private $comment;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($comment)
    {
        $this->comment = $comment;
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
        if(DB::table('comments')->where('status', 0)->first()){
            $url = env('APP_URL_SITE').'/cabinet';
            return (new MailMessage)
                ->subject('Комментарий')
                ->greeting('Привет!')
                ->line('Добавлен комментарий на сайте Спорт-Костюковка.')
                ->action('Опубликовать', $url)
                ->line('Спасибо, что Вы с нами!');
        }

        $url = env('APP_URL_SITE').'/post/'.$this->comment->post->slug;
        return (new MailMessage)
            ->subject('Комментарий')
            ->greeting('Привет!')
            ->line('Добавлен Комментарий на сайте Спорт-Костюковка.')
            ->action('Читать', $url)
            ->line('Спасибо, что Вы с нами!');
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
