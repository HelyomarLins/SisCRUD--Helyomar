<?php
include_once 'templateLogin.php';
?>

<!--MODAL ACESSO -->
<!-- Button trigger modal -->
<button id="login" type="button" class="btn btn-primary custom-buttom" data-bs-toggle="modal"
    data-bs-target="#exampleModal">
    Acessar o CRUD
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">CRUD - PHP</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="loginUsuForm" class="bg-ligth" action="validar_login.php" method="post">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email_usu" name="email_usu">
                        <label for="email_usu">E-mail</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="pass_usu" name="pass_usu">
                        <label for="pass_usu">Senha</label>
                    </div>
                    <div class="checkbox mb-3">
                        <label for="remember">
                            <input type="checkbox" name="remember" value="remember"> Lembrar-me
                        </label>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success w-100">Acessar</button>
                        <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Fechar</button>
                        <a href="cadUsuario.php"
                            class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">
                            <i class="bi bi-pencil-square">Faça o seu cadastro ...</i>

                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>


<?php
include_once './footerLogin.php';
?>