<?php

namespace App\Controllers;

use App\Helpers\Api;
use App\Models\Chat;
use App\Helpers\Util;
use App\Models\Session;
use App\Helpers\Response;
use App\Models\Api as ModelsApi;

class WebhookController
{

    public function index()
    {
        $webhook = new Response($this->options());
        $util = new Util();
          if ($webhook->getEvent() == 'qrcode'):
            $api = ModelsApi::where('session', $webhook->getSession())->first();
            $session = Session::where('id_session', $api->id)->count();
            
            if (empty($session) && $session == 0) {
                Session::create([
                    'id_session' => $api->id,
                    'type' => 'QrCode',
                    'urlcode' => $webhook->getUrlcode()
                ]);
            } else {
                Session::query('id_session', $api->id)->update([
                    'id_session' => $api->id,
                    'type' => 'QrCode',
                    'urlcode' => $webhook->getUrlcode()
                ]);
            }
            
        endif; 
        

        if ($webhook->getStatus() == 'qrReadSuccess' || $webhook->getStatus() == 'browserClose') :
            $consulta = Chat::query('id_session', $webhook->getSession())
                            ->first();
            if ($consulta) :
                $api = ModelsApi::where('session', $webhook->getSession())->first();
                Session::query('id_session', $api->id)
                        ->update([
                                    'id_session' => $api->id,
                                    'type' => $webhook->getStatus(),
                                    'urlcode' => ' '
                                ]);

            endif;
        endif; 

        /* Mensages */
        (new WebhookMsgController())->mensagens($webhook); 

        # File: Audio / Imagem / Arquivo / Video / Sticker
        if (
            $webhook->getEvent() == 'onmessage' and
            ($webhook->getType() == 'ptt' or
                $webhook->getType() == 'image' or
                $webhook->getType() == 'document' or
                $webhook->getType() == 'video' or
                $webhook->getType() == 'sticker'
            )
        ) :
            $file = $util->base64ToFile(
                $webhook->getBody(),
                $webhook->getMimetype(),
                $webhook->getFilesFolder()
            );
            Chat::create([
                'session' => $webhook->getSession(),
                'from_number' => $webhook->getFrom(),
                'to_number' => $webhook->getTo(),
                'type' => $webhook->getType(),
                'file_name' => $file,
            ]);
        endif;
    }

    public function options()
    {
        return [
            'library' => [
                'default' => 'wppconnect',
                'wppconnect' => [
                    'files_folder' => 'files'
                ]
            ],
            'logs' => [
                'enable' => true,
                'folder' => 'logs'
            ]
        ];
    }
}
