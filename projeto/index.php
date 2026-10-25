<?php

session_start();

require_once "dados.php";
require_once "funcoes.php";

$tela = $_GET["tela"] ?? "inicio";
$categoriaSelecionada = $_GET["categoria"] ?? "";
$mensagem = "";

if(!isset($_SESSION["historico"])){
    $_SESSION["historico"] = [];
}

$itens = montarItens($cartoes, $pessoas, $lugares);
$editar = ($_GET["editar"] ?? "") === "1";

if(!isset($_SESSION["favoritos"])){
    $_SESSION["favoritos"] = ["c1", "c2", "c3"];
}

if($_SERVER["REQUEST_METHOD"] === "POST"){

    if(isset($_POST["cartao_id"])){
        $id = filter_input(INPUT_POST, "cartao_id", FILTER_VALIDATE_INT);

        if($id !== false && $id !== null && isset($cartoes[$id]) && $cartoes[$id]["ativo"] === true){
            $cartao = buscarCartao($cartoes, $id);
            $mensagem = $cartao["mensagem"];
            registrarHistorico($cartao["titulo"], $mensagem);
        } else {
            $mensagem = "Cartão inválido ou indisponível.";
        }

    } elseif(isset($_POST["pessoa_id"])){
        $id = filter_input(INPUT_POST, "pessoa_id", FILTER_VALIDATE_INT);

        if($id !== false && $id !== null && isset($pessoas[$id])){
            $mensagem = $pessoas[$id]["mensagem"];
            registrarHistorico($pessoas[$id]["nome"], $mensagem);
        } else {
            $mensagem = "Pessoa inválida.";
        }

    } elseif(isset($_POST["lugar_id"])){
        $id = filter_input(INPUT_POST, "lugar_id", FILTER_VALIDATE_INT);

        if($id !== false && $id !== null && isset($lugares[$id])){
            $mensagem = $lugares[$id]["mensagem"];
            registrarHistorico($lugares[$id]["nome"], $mensagem);
        } else {
            $mensagem = "Lugar inválido.";
        }

    } elseif(isset($_POST["add_favorito"])){
        $chave = (string)$_POST["add_favorito"];

        if(isset($itens[$chave])){
            if(!in_array($chave, $_SESSION["favoritos"], true)){
                $_SESSION["favoritos"][] = $chave;
            }
            $mensagem = "Favorito adicionado.";
        } else {
            $mensagem = "Item inválido.";
        }

    } elseif(isset($_POST["remover_favorito"])){
        $chave = (string)$_POST["remover_favorito"];
        $_SESSION["favoritos"] = array_values(array_diff($_SESSION["favoritos"], [$chave]));
        $mensagem = "Favorito removido.";

    } elseif(isset($_POST["limpar_historico"])){
        $_SESSION["historico"] = [];
    }
}

switch($tela){
    case "inicio":
        $tituloTela = "Início";
        break;
    case "categorias":
        $tituloTela = "Categorias";
        break;
    case "historico":
        $tituloTela = "Histórico";
        break;
    default:
        $tituloTela = "Início";
        $tela = "inicio";
        break;
}

require_once "includes/header.php";
require_once "views/" . $tela . ".php";
require_once "includes/footer.php";

?>
