document.addEventListener('DOMContentLoaded', function() {
    const username = document.getElementById('username');
    const logoutButton = document.getElementById('logout');
    const productList = document.getElementById('product-list');
    const addProductButton = document.getElementById('add-product');

    // Simulação de usuário logado
    username.textContent = 'João';

    // Função de logout
    logoutButton.addEventListener('click', function() {
        alert('Você saiu!');
        // Redirecionar para a página de login
        window.location.href = 'login.php';
    });

    // Função para adicionar produto
    addProductButton.addEventListener('click', function() {
        const newRow = document.createElement('tr');
        newRow.innerHTML = `
            <td>1</td>
            <td>Produto Exemplo</td>
            <td>R$ 100,00</td>
            <td>
                <button class="btn btn-warning">Editar</button>
                <button class="btn btn-danger">Excluir</button>
            </td>
        `;
        productList.appendChild(newRow);
    });
});