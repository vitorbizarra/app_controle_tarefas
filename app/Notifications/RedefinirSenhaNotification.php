<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RedefinirSenhaNotification extends Notification
{
    use Queueable;

    public $token;

    public $name;

    public $email;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token, $name, $email)
    {
        $this->token = $token;
        $this->name  = $name;
        $this->email = $email;
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
        $url = 'http://localhost:8000/password/reset/' . $this->token . '?email=' . $this->email;
        $minutos = config('auth.passwords.' . config('auth.defaults.passwords') . '.expire');
        $saudacao = 'Olá, ' . $this->name .'!';

        return (new MailMessage)
            ->subject('Atualização de senha')
            ->greeting($saudacao)
            ->line('Esqueceu a senha? Sem problemas, vamos resolver isso!!!')
            ->action('Clique aqui para modificar a senha', $url)
            ->line("O link acima expira em $minutos minutos")
            ->line('Caso você não tenha requisitado a alteração de senha, então nenhuma ação é necessária.')
            ->salutation('Até breve!');
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
