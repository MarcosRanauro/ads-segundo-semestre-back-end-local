<?php
if (!empty($_GET['id'])) {
    include_once('../components/config.php');

    $id = $_GET['id'];

    $sqlSelect = "SELECT * FROM usuarios WHERE id = '$id'";
    $result = $conexao->query($sqlSelect);
    // print_r($result);

    if ($result->num_rows > 0) {
        while ($user_data = mysqli_fetch_assoc($result)) {
            $nome = $user_data['usu_nome'];
            $dataNascimento = $user_data['usu_dataNasc'];
            $sexo = $user_data['usu_sexo'];
            $nomeMaterno = $user_data['usu_nomeMaterno'];
            $cpf = $user_data['usu_cpf'];
            $cellPhone = $user_data['usu_celular'];
            $phone = $user_data['usu_telefoneFixo'];
            $endereco = $user_data['usu_endereco'];
            $loginName = $user_data['usu_login'];
            $password = $user_data['usu_senha'];
            $confirmPassword = $user_data['usu_confirmarSenha'];
            $tipoUsuario = $user_data['tipo_usuario'];
        }
        // print_r($nome);
        // print_r($dataNascimento);
        // print_r($sexo);
        // print_r($nomeMaterno);
        // print_r($cpf);
        // print_r($cellPhone);
        // print_r($phone);
        // print_r($endereco);
        // print_r($loginName);
        // print_r($password);
        // print_r($confirmPassword);
    } else {
        header('Location: perfilMaster.php');
    }
} else {
    header('Location: perfilMaster.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/Cadastro.css">
    <title>Editar Cadastro</title>
</head>

<body>
    <header>
        <section class="cabecalho-primario">
            <ul class="navbar-left">
                <li><a class="menu-primario" href="#">Empresas</a></li>
                <li><a class="menu-primario" href="#">Wholesale</a></li>
                <li><a class="menu-primario" href="#">Institucional</a></li>
            </ul>
            <ul class="navbar-right">
                <li><a class="menu-primario" href="#">WhatsApp</a></li>
                <li><a class="menu-primario" href="#">FAQ</a></li>
                <li><a class="menu-primario" href="#">Carreiras</a></li>
                <li><a class="menu-primario" href="#">Contato</a></li>
                <li><a class="menu-primario" href="#">Português</a></li>
                <a class="botao-login" href="./Login.php">
                    <i class="fa-solid fa-user" style="color: #ffffff;"></i>
                    <button class="botao-login-b">Área do Cliente</button>
                </a>
            </ul>
        </section>

        <section class="cabecalho-secundario">
            <a href="../index.php">
                <img src="../img/navbar-logo.png" alt="essa é a logo da Telecall">
            </a>
            <nav>
                <ul class="menu">
                    <li class="navbar"><a class="menu-opcoes" href="#">Internet</a>
                        <ul>
                            <li><a class="submenu" href="#">Internet Dedicada</a></li>
                            <li><a class="submenu" href="#">Banda Larga</a></li>
                            <li><a class="submenu" href="#">Wi-Fi</a></li>
                        </ul>
                    </li>
                    <li class="navbar"><a class="menu-opcoes" href="#">Telefonia</a>
                        <ul>
                            <li><a class="submenu" href="#">PABX IP Virtual</a></li>
                            <li><a class="submenu" href="#">E1/SIP TRUNK</a></li>
                            <li><a class="submenu" href="#">Números 0800 e 40XX</a></li>
                        </ul>
                    </li>
                    <li class="navbar"><a class="menu-opcoes" href="#">Rede e infraestrutura</a>
                        <ul>
                            <li><a class="submenu" href="#">Ponto-a-Ponto</a></li>
                            <li><a class="submenu" href="#">MPLS</a></li>
                            <li><a class="submenu" href="#">Fibra Apagada e Dutos</a></li>
                            <li><a class="submenu" href="#">Co-locations</a></li>
                        </ul>
                    </li>
                    <li class="navbar"><a class="menu-opcoes" href="#">Mobilidade</a>
                        <ul>
                            <li><a class="submenu" href="#">Celular Empresarial</a></li>
                            <li><a class="submenu" href="#">MVNA/E</a></li>
                        </ul>
                    </li>
                    <li class="navbar"><a class="menu-opcoes" href="produto.html">CPaaS</a></li>

                    <li class="navbar"><a class="menu-opcoes" href="#">Outras soluções</a>
                        <ul>
                            <li><a class="submenu" href="#">Outsourcing de Hardware</a></li>
                        </ul>
                    </li>

                </ul>
            </nav>
        </section>
    </header>
    <main class="container-main">
        <section class="container-img">
            <img src="../img/img-cadastro.png" alt="essa é a imagem principal da página">
        </section>
        <section>
            <form action="../components/saveEdit.php" method="POST" class="container" id="form">
                <div class="form-control form-control-lg input-container">
                    <h1>Editar Cadastro</h1>
                    <label for="nome" class="col-form-label">Nome</label>
                    <input class="form-control" type="text" name="nome" id="nome" minlength="15" maxlength="60" require value="<?php echo $nome ?>">

                    <label for="dataNascimento" class="col-form-label">Data de Nascimento:</label>
                    <input class="form-control" type="date" id="dataNascimento" name="dataNascimento" value="<?php echo $dataNascimento ?>">

                    <label class="col-form-label" for="sexo">Sexo:</label>
                    <select class="form-control" id="sexo" name="sexo">
                        <option value="null" selected></option>
                        <option value="masculino" <?php echo ($sexo == 'masculino') ? 'selected' : '' ?>>Masculino</option>
                        <option value="feminino" <?php echo ($sexo == 'feminino') ? 'selected' : '' ?>>Feminino</option>
                        <option value="nao-informar" <?php echo ($sexo == 'nao-informar') ? 'selected' : '' ?>>Prefiro não informar</option>
                    </select>

                    <label for="nomeMaterno" class="col-form-label">Nome Materno</label>
                    <input class="form-control" type="text" name="nomeMaterno" id="nomeMaterno" minlength="15" maxlength="60" value="<?php echo $nomeMaterno ?>">

                    <label class=" col-form-label" for="cpf">CPF:</label>
                    <input class="form-control" type="text" id="cpf" name="cpf" placeholder="XXX.XXX.XXX-XX" required pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" value="<?php echo $cpf ?>">


                    <label for="cell-phone" class="col-form-label">Telefone Celular</label>
                    <input type="tel" name="cell-phone" id="cell-phone" class="cell-phone form-control" value="<?php echo $cellPhone ?>">
                    <div class=" col-auto">
                    <span id="passwordHelpInline" class="form-text">
                        99 99999 9999
                    </span>
                </div>

                <label for="phone" class="col-form-label">Telefone Fixo:</label>
                <input type="tel" id="phone" name="phone" class="phone form-control" value="<?php echo $phone ?>">
                    <span id=" passwordHelpInline" class="form-text">
                99 9999 9999
                </span>

                <label class="col-form-label" for="endereco">Endereço:</label>
                <input class="form-control" type="text" id="endereco" name="endereco" placeholder="Rua, número, bairro, etc." required value="<?php echo $endereco ?>">

                    <label for=" login-name" class="col-form-label">Nome de Login</label>
                <input type="login-name" name="login-name" id="login-name" class="login form-control" value="<?php echo $loginName ?>">
                    <div class=" col-auto">
                <span id="passwordHelpInline" class="form-text">
                    Deve ter exatamente 6 caracteres alfabéticos.
                </span>
                </div>

                <label for="password" class="col-form-label">Senha</label>
                <input type="text" name="password" id="password" class="password form-control" value="<?php echo $password ?>">
                    <div class=" col-auto">
                <span id="passwordHelpInline" class="form-text">
                    A senha deve conter 8 caracteres alfabéticos.
                </span>
                </div>
                <span id="password-error" class="error-message"></span>

                <label for="confirm-password" class="col-form-label">Confirme sua senha</label>
                <input type="text" name="confirm-password" id="confirm-password" class="password form-control" value="<?php echo $confirmPassword ?>">
                <div class="col-auto">
                    <span id="passwordHelpInline" class="form-text">
                        A senha deve ser exatamente igual a anterior.
                    </span>
                </div>
                <label for="tipo_usuario" class="col-form-label">Tipo de Usuário</label>
                <input type="text" name="tipo_usuario" id="tipo_usuario" value="<?php echo $tipoUsuario ?>">
                
                <span id="confirm-password-error" class="error-message"></span>
                <fieldset class="main-agreement">
                    <label for="agreement" id="label-infos">Você concorda com o uso das informações acima?</label>
                    <input type="checkbox" name="agreement" id="agreement">
                </fieldset>
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <input type="submit" id="update" class="submit btn btn-primary" name="update">

                <input type="reset" id="reset-btn" class="reset btn btn-primary" name="reset">
                </div>

            </form>
        </section>
    </main>
    <footer>
        <section class="container-footer">
            <img class="logo-footer" src="../img/telecall-footer.png" alt="Essa é a logo da telecall">
            <div>
                <button class="media-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                        <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                    </svg>
                </button>
                <button class="media-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                        <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                    </svg>
                </button>
                <button class="media-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                        <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z" />
                    </svg>
                </button>
            </div>
            <div>
                <span>Copyright <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-c-circle" viewBox="0 0 16 16">
                        <path d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8Zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0ZM8.146 4.992c-1.212 0-1.927.92-1.927 2.502v1.06c0 1.571.703 2.462 1.927 2.462.979 0 1.641-.586 1.729-1.418h1.295v.093c-.1 1.448-1.354 2.467-3.03 2.467-2.091 0-3.269-1.336-3.269-3.603V7.482c0-2.261 1.201-3.638 3.27-3.638 1.681 0 2.935 1.054 3.029 2.572v.088H9.875c-.088-.879-.768-1.512-1.729-1.512Z" />
                    </svg> 2018 Telecall. Todos os direitos reservados.</span>
            </div>
        </section>
    </footer>

    <script src="../js/cleave.min.js"></script>
    <script src="../js/cleave-phone.br.js"></script>
    <script src="../js/Cadastro.js"></script>

</body>

</html>