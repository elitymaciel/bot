<?php

namespace App\Helpers;

use App\Models\User;
use Exception;
use Dotenv\Dotenv;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;


class Api
{

    private $client;
    private $url;
    private $session;
    private $token;

    public function __construct()
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
        $dotenv->load();
        $this->client = new Client();
        $this->url = $_ENV['API']; 
    }

    public function Servidor($method, $url, $body = [])
    {
        if (isset($body['token'])) {
            $header = ['headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $body['token'],
            ]];
        } else {
            $header = ['headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ]];
        }
        foreach ($header as $headers) {
        }
        try {
            $response = $this->client->request($method, $this->url . $url, [
                'headers' => $headers
            ]);

            return $response;
        } catch (RequestException $e) {
            if ($e->hasResponse()) {
                $response = $e->getResponse();
                return $response;
                // processar o conteúdo do erro recebido
            }
        } catch (Exception $e) {
            // tratar outras exceções inesperadas
        }
    }
    public function sessionsList()
    {
        $response = $this->Servidor('GET', 'status-session')->getBody()->getContents();
        return $response;
    }


    public function statusSession($body)
    {
        $response = $this->Servidor('GET', $body['session'] . '/status-session', $body)->getBody()->getContents();
        return $response;
    }

    public function start($body)
    {
        $response = $this->client->request('POST', $this->url . $body['session'] . '/start-session', [
            'headers' => [
                'Content-Type' => 'application/json', 
                'Authorization' => 'Bearer ' .$body['token'],
            ], 'json' => [
                'webhook' => $_ENV['WEBHOOK']
            ], 
        ]);
        return $response->getBody()->getContents();
    }
    public function generatetoken($data)
    { 
         $response = $this->client->request('POST', $this->url. $data['session'].'/'.$_ENV['TOKEN'] .'/generate-token', [
            'headers' => [
                'Content-Type' => 'application/json', 
                'Accept' => 'application/json',   
            ],'json' => [
                'webhook' => $_ENV['WEBHOOK'], 
            ] 
        ]);  
        return json_decode($response->getBody()->getContents());  
    }

    public function sendMessage($phone, $message, $session)
    { 
         
        $usuario = User::where('id_session', $session)->first();
        $response = $this->client->request('POST', $this->url. $session .'/send-message', [
            'headers' => [
                'Content-Type' => 'application/json', 
                'Accept' => 'application/json',  
                'Authorization' => 'Bearer ' . $usuario->token,
            ],'json' => [
                'phone' => $phone,
                'message' => $message,
                'isGroup' => false, 
            ] 
        ]);  
        return $response->getBody()->getContents();  
    }

    /**
     * Lista todos Contatos do telefone
     */
    public function allContacts($session)
    { 
        $usuario = User::where('id_session', $session)->first();
        $response = $this->client->request('GET', $this->url. $session .'/all-contacts', [
            'headers' => [
                'Content-Type' => 'application/json', 
                'Accept' => 'application/json',  
                'Authorization' => 'Bearer ' . $usuario->token,
            ]
        ]);  
        return $response->getBody()->getContents(); 
    }

    /* http://localhost:21465/api/teste/get-battery-level */
    public function battery_level($data)
    {
        $usuario = User::where('id_session', $data['session'])->first();
        $response = $this->client->request('GET', $this->url. $data['session'] .'/get-battery-level', [
            'headers' => [
                'Content-Type' => 'application/json', 
                'Accept' => 'application/json',  
                'Authorization' => 'Bearer ' . $usuario->token,
            ]
        ]);  
        return $response->getBody()->getContents(); 

    }
    
    public function chatGPT($data)
    {
        /* [{"role": "user", "content": "Não sei me fala sobre os cursos"}] */
        $message = $data; 
        $response = $this->client->request('POST', 'https://api.openai.com/v1/chat/completions', [
            'headers' => [
                'Content-Type' => 'application/json',  
                'Authorization' => 'Bearer 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',
            ],'json' => [
                "model" => "gpt-3.5-turbo",
                "total_tokens" => '200',
                "messages" => [
                        ['role' => 'user', 'content' => 'Oi'],
                        ['role' => 'assistant', 'content' => 'Ola, Como posso Ajudar? aqui e Diego do Instituto Pcep, Compo posso lhe ajudar? \n escolha algumas das opções. 1 - curso, \n 2 - Financeiro \n 3 - Escolher unidade', ],
                        ['role' => 'user', 'content' => 'Boa Noite'],
                        ['role' => 'user', 'content' => 'Bom dia'],
                        ['role' => 'assistant', 'content' => 'Olá, aqui e Diego do Instituto Pcep, Compo posso lhe ajudar? \n escolha algumas das opções. 1 - curso, \n 2 - Financeiro \n 3 - Escolher unidade'],
                        ['role' => 'user', 'content' => '3', ],
                        ['role' => 'assistant', 'content' => 'Otimo, temos varias unidade agora com eu Diego no formato assistente posso lhe ajudar mas. Qual unidade deseja? \n 1 - Guaraí -TO \n 2 - Conceição do araguaia -PA \n 3 - Couto Magalhães -TO', ],
                        ['role' => 'user', 'content' => '2', ],
                        ['role' => 'assistant', 'content' => 'Otimó, Conceicão do araguaia, e nova matriz temos uma gama de cursos para lhe atende \n e lebrando somos polo da Uniasselvi voçê pode fazer uma graduação. \n ou um curso basico com a gente tbm \n 1 - Fale mais da  Uniasselvi \n 2 - Cursos\n 3 - Financeiro  ', ],
                        ['role' => 'user', 'content' => 'Unidade', ],
                        ['role' => 'assistant', 'content' => 'Qual unidade deseja? \n 1 - Guaraí -TO \n 2 - Conceição do araguaia -PA \n 3 - Couto Magalhães -TO',],
                        ['role' => 'assistant', 'content' => $message]

                    ]
            ]
        ]);  
        return $response->getBody(); 
    }
}
