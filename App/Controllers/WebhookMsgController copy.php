<?php

namespace App\Controllers;

use App\Helpers\Api;
use App\Models\Api as ModelsApi;
use App\Models\Chat;
use App\Models\Contato;
use App\Models\Mensagem;
use App\Models\Position;
use App\Models\Atendimento;

class WebhookMsgController
{
    public function mensagens($webhook)
    {

        # Message
        if ($webhook->getEvent() == 'onmessage' and $webhook->getType() == 'chat') :
            $send = new Api();
            /* $resposta = json_decode($send->chatGPT($webhook->getContent())); 
            echo $send->sendMessage($webhook->getFrom(), $resposta->choices[0]->message->content, $webhook->getSession());
            die; */
            Chat::create([
                'session' => $webhook->getSession(),
                'content' => $webhook->getContent(),
                'from_number' => $webhook->getFrom(),
                'to_number' => $webhook->getTo(),
                'type' => $webhook->getType(),
            ]);
            /* $contatos = Contato::where('session', $webhook->getSession())
                ->where('telefone', $webhook->getFrom())
                ->count();
            if ($contatos == 0) {
                $email = filter_var($webhook->getContent(), FILTER_SANITIZE_EMAIL);
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) :
                    echo $send->sendMessage($webhook->getFrom(), 'Pronto ❤️', $webhook->getSession());
                    if (!$contatos) :
                        Contato::create([
                            'session' => $webhook->getSession(),
                            'nome'  => $webhook->getSenderShortName(),
                            'email' => $webhook->getContent(),
                            'telefone' => $webhook->getFrom()
                        ]);
                        die;
                    endif;
                endif;
                if (strcasecmp($webhook->getContent(), 'SIM') == 0) {
                    echo $send->sendMessage($webhook->getFrom(), 'OK, qual seu E-mail?', $webhook->getSession());
                    die;
                }
                echo $send->sendMessage($webhook->getFrom(), 'Você não esta em nosso banco de dados 🥲.' . "\n" . 'Podemos deixa salvo pra min lembra de vc da proxima vez?😉 *SIM*', $webhook->getSession());
                die;
            }
            if ($webhook->getContent() == '9') {
                echo $send->sendMessage($webhook->getFrom(), 'Não posso falar agora', $webhook->getSession());
                $atendimento = Contato::where('session', $webhook->getSession())
                    ->where('cliente', $webhook->getFrom())
                    ->count();
                Atendimento::create([
                    'session' => $webhook->getSession(),
                    'cliente' => $webhook->getFrom(),
                    'status' => '1'
                ]);
                die;
            } */

            echo $send->sendMessage($webhook->getFrom(), 'Olá,  Sou Assistente Virtual do Instituto PCEP', $webhook->getSession());
            sleep(1);
            echo $send->sendMessage($webhook->getFrom(), 'Como posso ajudar? escolha algumas opção para lhe atender.. ', $webhook->getSession());
            sleep(1);
            $menu = Mensagem::distinct()->pluck('categoria');
            $options = [];
            foreach ($menu as $key => $categoria) {
                $options[] = $key + 1 . '- ' . ucfirst($categoria);
            }
            echo $send->sendMessage($webhook->getFrom(), implode("\n", $options), $webhook->getSession());
            die;
        endif;
    }

    public function position(array $data)
    {
        $apiConfig = ModelsApi::where('session', $data['session'])->first();
        $resultPosition = Position::where('id_session', $apiConfig->id)
            ->where('telefone', $data['fone'])
            ->first();
        return $resultPosition->posicao;
    }
}
