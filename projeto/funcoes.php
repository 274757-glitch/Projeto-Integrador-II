<?php

function buscarCartao($cartoes, $id){
    return $cartoes[$id] ?? null;
}

function buscarPorCategoria($cartoes, $categoria){
    $resultado = [];

    foreach($cartoes as $cartao){
        if($cartao["categoria"] === $categoria && $cartao["ativo"] === true){
            $resultado[] = $cartao;
        }
    }

    return $resultado;
}

function registrarHistorico($titulo, $mensagem){
    $_SESSION["historico"][] = [
        "titulo" => $titulo,
        "mensagem" => $mensagem,
        "data" => date("d/m/Y H:i:s")
    ];

    $_SESSION["historico"] = array_slice($_SESSION["historico"], -20);
}

function montarItens($cartoes, $pessoas, $lugares){
    $itens = [];

    foreach($cartoes as $cartao){
        if($cartao["ativo"] === true){
            $itens["c" . $cartao["id"]] = [
                "chave" => "c" . $cartao["id"],
                "titulo" => $cartao["titulo"],
                "icone" => $cartao["icone"],
                "campo" => "cartao_id",
                "valor" => $cartao["id"],
                "grupo" => $cartao["categoria"]
            ];
        }
    }

    foreach($pessoas as $id => $pessoa){
        $itens["p" . $id] = [
            "chave" => "p" . $id,
            "titulo" => $pessoa["nome"],
            "icone" => $pessoa["icone"],
            "campo" => "pessoa_id",
            "valor" => $id,
            "grupo" => "pessoas"
        ];
    }

    foreach($lugares as $id => $lugar){
        $itens["l" . $id] = [
            "chave" => "l" . $id,
            "titulo" => $lugar["nome"],
            "icone" => $lugar["icone"],
            "campo" => "lugar_id",
            "valor" => $id,
            "grupo" => "lugares"
        ];
    }

    return $itens;
}

function buscarFavoritos($itens, $chaves){
    $resultado = [];

    foreach($chaves as $chave){
        if(isset($itens[$chave])){
            $resultado[] = $itens[$chave];
        }
    }

    return $resultado;
}

?>
