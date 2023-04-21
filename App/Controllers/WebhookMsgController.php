<?php

namespace App\Controllers;

use Carbon\Carbon;
use App\Helpers\Api;
use App\Models\Chat;
use App\Models\Mensagem;
use App\Models\Position;
use App\Models\Api as ModelsApi;

class WebhookMsgController
{
    public function mensagens($webhook)
    {

        # Message
        if ($webhook->getEvent() == 'onmessage' and $webhook->getType() == 'chat') :
            $send = new Api();
            $apiConfig = ModelsApi::where('session', $webhook->getSession())->first();
            $data = [
                'apiId' => $apiConfig->id,
                'session' => $webhook->getSession(),
                'foneClient' => $webhook->getFrom()
            ];
            $positionNunber = $this->position($data);
            Chat::create([
                'session' => $webhook->getSession(),
                'content' => $webhook->getContent(),
                'from_number' => $webhook->getFrom(),
                'to_number' => $webhook->getTo(),
                'type' => $webhook->getType(),
            ]);
            if (!$positionNunber) {
                Position::create([
                    'id_session' =>  $data['apiId'],
                    'telefone' => $data['foneClient'],
                    'posicao' => 'menu-1'
                ]);
            }
            $statusCode = $this->position($data);

            if (!empty($statusCode->valor)) {
                $mensagems = Mensagem::where('categoria', $statusCode->valor)
                    ->where('id_session', $data['apiId'])
                    ->distinct()
                    ->pluck('item');
                foreach ($mensagems as $key => $option) {
                    $options[$key + 1] = $key + 1 . '- ' . ucfirst($option);
                }

                if (array_key_exists(intval($webhook->getContent()), $options)) {
                    if (explode('- ', $options[$webhook->getContent()])[1] == 'Voltar') {
                        Position::where('id_session', $data['apiId'])
                            ->where('telefone', $data['foneClient'])
                            ->update([
                                'valor' => ''
                            ]);
                        $this->default($data);
                    }
                    echo $send->sendMessage($data['foneClient'], explode('- ', $options[$webhook->getContent()])[1], $data['session']);
                    die;
                } else {
                    echo $send->sendMessage($data['foneClient'], 'Não intendi. Escolha algumas opção para poder ajudar.. ', $data['session']);
                    sleep(1);
                    echo $send->sendMessage($data['foneClient'], implode("\n", $options), $data['session']);
                    die;
                }
            } else {
                $mensagems = Mensagem::where('valor', $statusCode->posicao)
                    ->where('id_session', $data['apiId'])
                    ->distinct()
                    ->pluck('categoria');
            }

            $options = [];
            foreach ($mensagems as $key => $option) {
                $options[$key + 1] = $option;
            }

            if (array_key_exists(intval($webhook->getContent()), $options)) {
                $this->options($options[$webhook->getContent()], $data);
            } else {
                $this->default($data);
            }




        /* if ($webhook->getContent() == $key + 1 ) {
                $this->options($categoria->categoria, $data);
            }else {
                $this->default($data);
            } */
        /* $message = match ($statusCode->posicao) { 
                default => ,
            }; */
        endif;
    }

    public function options($result, $data)
    {
        $send = new Api();
        Position::where('id_session', $data['apiId'])
            ->where('telefone', $data['foneClient'])
            ->update([
                'valor' => $result
            ]);
        $menuOptions =  Mensagem::where('categoria', $result)
            ->where('id_session', $data['apiId'])
            ->distinct()
            ->pluck('item');
        $options = [];
        foreach ($menuOptions as $key => $option) {
            $options[] = $key + 1 . '- ' . ucfirst($option);
        }
        echo $send->sendMessage($data['foneClient'], implode("\n", $options), $data['session']);
        die;
    }

    public function menu()
    {
        $menu = Mensagem::where('valor', 'menu-1')->distinct()->pluck('categoria');
        $options = [];
        foreach ($menu as $key => $categoria) {
            $options[] = $key + 1 . '- ' . ucfirst($categoria);
        }
    }


    public function default($data)
    {
        $horaAtual = Carbon::now()->hour;
        $send = new Api();
        $menu = Mensagem::distinct()->pluck('categoria');
        $consult = Position::where('id_session', $data['apiId'])
            ->where('telefone', $data['foneClient'])
            ->first();
        if ($horaAtual >= 0 && $horaAtual < 6) {
            $saudacao = 'Boa noite!';
        } elseif ($horaAtual >= 6 && $horaAtual < 12) {
            $saudacao = 'Bom dia!';
        } elseif ($horaAtual >= 12 && $horaAtual < 18) {
            $saudacao = 'Boa tarde!';
        } else {
            $saudacao = 'Boa noite!';
        }
         
        if ($consult->updated_at->diffInHours(Carbon::now()) < 1) { 
            echo $send->sendMessage($data['foneClient'], $saudacao .'Escolha algumas opção para lhe atender.. ', $data['session']);
            sleep(1);
        } else {
            echo $send->sendMessage($data['foneClient'], 'Olá, Sou uma Assistente Virtual do Instituto PCEP', $data['session']);
            sleep(1);
            echo $send->sendMessage($data['foneClient'], $saudacao .' Como posso ajudar? escolha algumas opção para lhe atender.. ', $data['session']);
            sleep(1);
        }


        $options = [];
        foreach ($menu as $key => $categoria) {
            $options[] = $key + 1 . '- ' . ucfirst($categoria);
        }
        echo $send->sendMessage($data['foneClient'], implode("\n", $options), $data['session']);
        die;
    }

    public function position(array $data)
    {
        $resultPosition = Position::where('id_session', $data['apiId'])
            ->where('telefone', $data['foneClient'])
            ->first();
        return $resultPosition;
    }
}
