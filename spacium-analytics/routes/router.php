<?php

function loadRoute(string $controller, string $action) {
    try {
        $controllerNamespace = "app\\controller\\{$controller}";

        if (!class_exists($controllerNamespace)) {
            throw new Exception("O controller {$controller} não existe");
        }

        $controllerInstance = new $controllerNamespace();

        if (!method_exists($controllerInstance, $action)) {
            throw new Exception("O método {$action} não existe no controller {$controller}");
        }

        $controllerInstance->$action((object) $_REQUEST);
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
}

$routes = [
    'GET' => [
        '/' => fn() => loadRoute('PageController', "index"),
        '/dashboard/' => fn() => loadRoute('InscricaoController', "index"),
        '/dashboard/inscricao' => fn() => loadRoute('InscricaoController', "index"),


    ],
    'POST' => [
        '/login' => fn() => loadRoute('UserController', "store"),
        '/dashborad/inscricao/salvar' => fn() => loadRoute('InscricaoController', "store"),
        '/dashboard/inscricao/remover' => fn() => loadRoute('InscricaoController', "delete"),
        '/dashboard/inscricao/atualizar' => fn() => loadRoute('InscricaoController', "update"),    
        '/dashboard/inscricao/avaliar' => fn() => loadRoute('InscricaoController', "evaluate"),    
    ],
];