<?php

require_once __DIR__ . '/../vendor/autoload.php';


// incluir o arquivo de configuração do Slim
require_once __DIR__ . '/../config/config.php';

session_start();

// classe de autenticação
use Services\Auth;

// inicia por mensagem de erro
$mensagem = '';


// instanciar a classe de autenticação
$auth = new Auth();


// verificar se o usuário já está logado
if (Auth::verificarLogin()){

    // redirecionar para a página inicial
    header('Location:index.php');
    exit;

}

// verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // obter os dados do formulário
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // verificar se o usuário e a senha estão corretos
    if ($auth->login($username, $password)) {
        // redirecionar para a página inicial
        header('Location: index.php');
        exit;
    } else {
        // exibir mensagem de erro
        $mensagem = 'Usuário ou senha inválidos.';
    }
}


?>

<?php


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <title>Locação veiculos-Login</title>

    <style>
        .olho {
            display: none;
        }

        .ativo { 
            display: block;
        }

        .login-container {
            max-width: 400px;
            margin: 100px auto;
        }
        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }
        
    </style>

</head>
<body class="bg-light">
    <div class="login-container">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-1">Login</h4>
            </div>
            <div class="card-body">


                <?php if ($mensagem): ?>
                    <div class="alert alert-danger">
                        <?= htmlspecialchars($mensagem) ?>
                    </div>
                <?php endif; ?>


                <form action="post" class="needs-validation" novalidate>
                    <input type="hidden">

                    <div class="mb-3">
                        <label for="user" class="form-label">Usuário:</label>
                        <input type="text" name="username" class="form-control border-lg" required autocomplete="off" placeholder="Digite o Usuário">
                    </div>

                    <div class="mb-3 position-relative">
                        <label for="password">Senha:</label>
                        <input type="password" class="form-control" id="password" placeholder="Digite sua Senha"required>
                        <span class="password-toggle mt-3" onclick="togglePassword()"><i class="bi bi-eye olho ativo "></i>
                        <i class="bi bi-eye-fill olho"></i></span>
                    </div>

                    <button type="submit" class="btn btn-danger w-100">Entrar</button>
                </form>


            </div>
        </div>
    </div>

    <script>
        let ativo = 0;


        function togglePassword(){
            let passwordInput = document.getElementById('password');
            passwordInput.type = (passwordInput.type === 'password') ? 'text' : 'password';


            let lista = document.querySelectorAll('.olho');
            let desativar = document.querySelector('.ativo');

            if(ativo == 0){
                desativar.classList.remove('ativo');
                lista[1].classList.add('ativo');
                ativo = 1;
            } else if (ativo == 1){
                desativar.classList.remove('ativo');
                lista[0].classList.add('ativo');
                ativo = 0;
            }



            
        };
    </script>

</body>
</html>