const loginUsuForm = document.getElementById('loginUsuForm');

if (loginUsuForm) {
    loginUsuForm.addEventListener('submit', async (e) => {
        e.preventDefault();

        //receber dados dos formulario de login
        const dadosLogin = new FormData(loginUsuForm);

        const dados = await fetch('validar_login.php', {
            method: "POST",
            body: dadosLogin
        });
        const resposta = await dados.json();
        //CRIANDO ALERTA COM SWEET ALERT
        if (resposta['status']) {
            Swal.fire({
                text: resposta['msg'],
                icon: "success",
                confirmButtonColor: "#3085d6",
            }).then(() => {
                // Redireciona para a página templatePages.php após 2 segundos
                setTimeout(() => {
                    window.location.href = "templatePages.php";
                }, 200); // 1 segundos de atraso
            });
        } else {
            Swal.fire({
                text: resposta['msg'],
                icon: "error",
                confirmButtonColor: "#3085d6",
            });
        }
    });
}

document.addEventListener('DOMContentLoaded', function() {
    // Captura o botão de pesquisa pelo ID
const searchButton = document.getElementById('searchButton');

// Adiciona um ouvinte de evento de clique ao botão de pesquisa
searchButton.addEventListener('click', function() {
    // Captura o valor do campo de pesquisa
    const searchTerm = document.getElementById('search').value;

    // Redireciona para a página listarAlunos.php com o parâmetro de pesquisa na URL
    window.location.href = 'pesq_aluno.php?search=' + searchTerm;
    });
});




