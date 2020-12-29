<?php

namespace App\Listeners;

use App\Events\NovaSerie;
use App\User;
use Illuminate\Support\Facades\Mail;

class SendEmailNewSerie
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NovaSerie  $event
     * @return void
     */
    public function handle(NovaSerie $event)
    {
        $users = User::all();

        $i = 0;
        foreach($users as $user) {
            $i++;
            if($i == 3){
                $indice = 10;
                $i = 0;
            } else {
                $indice = 0;
            }
            $email = new \App\Mail\NovaSerie($event->nome, $event->qtdTemp, $event->qtdEps);
            $email->subject('Nova Série adicionada');

            $timeOut = now()->addSecond($indice);

            Mail::to($user)->later($timeOut ,$email);
        }


    }
}
