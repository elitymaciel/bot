<?php

namespace App\Controllers\Client;

use App\Models\User;
use App\Models\Anotacao;
use App\Models\Mensagem;
use Illuminate\Database\Schema\ForeignKeyDefinition;

new \App\Models\Drawflow;


class BotController extends ClientController
{
    public function index()
    {

        echo $this->view()->render("chatbot", []);
    }

    public function menssage($data)
    {
    }

    public function front($data)
    {
        $dados = json_decode(file_get_contents('php://input'), true);
        if (is_array($dados)) {
            /* $card = Card::where('div_id', $dados['div_id'])->first();
            if (!empty($card) || count($card) > 0) {
                Card::where('div_id', $dados['div_id'])->update([
                    'div_id' => $dados['div_id'],
                    'x' => $dados['x'],
                    'y' => $dados['y']
                ]);
                die;
            } else {
                Card::create([
                    'div_id' => $dados['div_id'],
                    'x' => $dados['x'],
                    'y' => $dados['y']
                ]);
                die;
            } */
        }

        /*  if ($data['status'] == 'consulta') {
            $consultaCard = Card::where('div_id', $data['div_id'])->first();

            echo json_encode(['div_id' => $consultaCard->div_id, 'x' => $consultaCard->x, 'y' => $consultaCard->y]);
        } */
    }

    public function drawflow()
    {
        $Drawflow = \App\Models\Drawflow::all();

        $data = [];
        $input = [];
        $output = [];
        foreach ($Drawflow as $key => $value) {
            $data[$value['id']] =  array(
                'id' => $value['id'],
                'name' => $value['name'],
                'data' => array(),
                'class' => $value['class'],
                'html' =>  stripslashes($value['html']),
                'typenode' => false,
                'pos_x' => $value['pos_x'],
                'pos_y' => $value['pos_y'],
            );

            $drawflowConnections = \App\Models\DrawflowConexao::get();

            foreach ($data as $key => $value) {
                $input = array();
                $output = array();

                $inputConnections = $drawflowConnections->where('input_id', $value['id']);
                $outputConnections = $drawflowConnections->where('output_id', $value['id']);

                foreach ($inputConnections as $keyOutput => $connectionOutput) {
                    $input[] =  array(
                        'node' => $connectionOutput->output_id,
                        'input' =>  $connectionOutput->output_class
                    );
                }
                if (empty($input)) {
                    $data[$value['id']]['inputs']['input_1']['connections'] = array();
                } else {
                    $data[$value['id']]['inputs']['input_1']['connections'] = $input;
                }

                foreach ($outputConnections as $keyOutput => $connectionOutput) {
                    $output[] = array(
                        'node' => $connectionOutput->input_id,
                        'input' =>  $connectionOutput->input_class
                    );
                }

                if (empty($output)) {
                    $data[$value['id']]['outputs']['output_1']['connections'] = array();
                } else {
                    $data[$value['id']]['outputs']['output_1']['connections'] = $output;
                }
            }
        }

        $addInicioArray = array(
            "drawflow" => array(
                "Home" => array(
                    "data" => $data
                )
            )
        );

        echo json_encode($addInicioArray, true);
        die;
    }

    public function drawflowResourse($data)
    {

        if (!empty($data['status']) && $data['status'] == 'nodeCreated') :
            $DrawflowNode = \App\Models\Drawflow::create([
                'name' => $data['titulo'],
                'class'    => $data['titulo'],
                'html'    => $data['html'],
                'typenode'    => false,
                'pos_x'    => '50',
                'pos_y'    => '50'
            ]);
            if ($DrawflowNode) :
                echo json_encode(['status' => 'Salvo com sucesso']);
            endif;

        endif;
        /* status=moved */
        if (!empty($data['status']) && $data['status'] == 'nodeMoved') :
            \App\Models\Drawflow::where('id', $data['id'])->update([
                'pos_x' => $data['x'],
                'pos_y' => $data['y'],
            ]);
            echo json_encode(["status" => "Atualizado"]);
            die();
        endif;

        /* status=Connection Created */
        if (!empty($data['status']) && $data['status'] == 'ConnectionCreated') :
            $DrawflowConexao = \App\Models\DrawflowConexao::where('id_session', $_SESSION['session'])
                ->where('input_class', $data['input_class'])
                ->where('input_id', $data['input_id'])
                ->where('output_class', $data['output_class'])
                ->where('output_id', $data['output_id'])
                ->count();
            if ($DrawflowConexao > 0) :
                \App\Models\DrawflowConexao::where('id_session', $_SESSION['session'])
                    ->where('input_class', $data['input_class'])
                    ->where('input_id', $data['input_id'])
                    ->where('output_class', $data['output_class'])
                    ->where('output_id', $data['output_id'])
                    ->update([
                        'id_session' =>    $_SESSION['session'],
                        'input_class'    => $data['input_class'],
                        'input_id'    => $data['input_id'],
                        'output_class' => $data['output_class'],
                        'output_id'    => $data['output_id'],
                    ]);
                echo json_encode(['status' => 'Atualizado']);
                die;
            endif;
            \App\Models\DrawflowConexao::create([
                'id_session' =>    $_SESSION['session'],
                'input_class'    => $data['input_class'],
                'input_id'    => $data['input_id'],
                'output_class' => $data['output_class'],
                'output_id'    => $data['output_id'],
            ]);
            echo json_encode(['status' => 'Conexão Criada']);
            die;
        endif;

        /*status=nodeRemoved */
        if (!empty($data['status']) && $data['status'] == 'nodeRemoved') :
            \App\Models\Drawflow::where('id', $data['id'])->delete();
            echo json_encode(['status' => 'Card Removido']);
            die;
        endif;

        /*status=ConnectionRemoved */

        if (!empty($data['status']) && $data['status'] == 'ConnectionRemoved') :
            \App\Models\DrawflowConexao::where('id_session', $_SESSION['session'])
                ->where('input_class', $data['input_class'])
                ->where('input_id', $data['input_id'])
                ->where('output_class', $data['output_class'])
                ->where('output_id', $data['output_id'])
                ->delete();
            echo json_encode(['status' => 'conexao excluida']);
            die;
        endif;
    }

    public function tabela()
    {
        $chat = new \App\Helpers\Api();
        $resposta = json_decode($chat->chatGPT('Oi'));
        echo "<pre>";
        print_r(substr($resposta->choices[0]->message->content, 1));
    }

    public function show($data)
    {
        $id = $data['id'];
        $consulta = Anotacao::where("id", $id)->first();

        header("Content-Type: aplication/json");
        echo json_encode($consulta, true);
    }

    public function create($data)
    {
        //$usuario = $this->conn()->query("SELECT * FROM users WHERE email = '".$_SESSION['email']."'")->fetchAll()[0];
        $usuario = User::where("email", $_SESSION['email'])->first();
        //$anotacoes = $this->conn()->query("INSERT INTO anotacoes (idUsuario,titulo,conteudo) VALUES ('".$usuario->id."', '".$data['titulo']."','".$data['descricao']."')");
        $anotacoes = Anotacao::create([
            'idUsuario' => $usuario->id,
            'titulo' => $data['titulo'],
            'conteudo' => $data['descricao']
        ]);
        if ($anotacoes) {
            (new \App\Helpers\Notification())->showToastrNotification('success', 'Anotação salva com sucesso');
        } else {
            (new \App\Helpers\Notification())->showToastrNotification('error', 'Anotação não salva!');
        }
    }

    public function update($data)
    {
        //$resultado = $this->conn()->query("UPDATE anotacoes SET titulo = '" . $data['titulo'] . "', conteudo = '" . $data['descricao'] . "' WHERE id = " . $data['id'] . "");
        $resultado =  Anotacao::find($data['id'])->update([
            'titulo' => $data['titulo'],
            'conteudo' =>  $data['descricao']
        ]);
        if ($resultado) {
            (new \App\Helpers\Notification())->showToastrNotification('success', 'Update com sucesso');
        } else {
            (new \App\Helpers\Notification())->showToastrNotification('error', 'error');
        }
    }
    public function delete($data)
    {
        //$excluir = $this->conn()->query("DELETE FROM anotacoes WHERE id = '".$data['id']."'");
        $excluir = Anotacao::find($data['id'])->delete();
        if ($excluir) {
            (new \App\Helpers\Notification())->showToastrNotification('success', 'Anotação excluida');
        } else {
            (new \App\Helpers\Notification())->showToastrNotification('error', 'Error ao excluir');
        }
    }
} 