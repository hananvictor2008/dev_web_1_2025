document.addEventListener("DOMContentLoaded", () => {
    const container = document.querySelector("#produtosContainer");
    const buttonAddProd = document.querySelector("#qtdProdutos");
    const numProdutos = document.querySelector("#numProdutos");
    let i = 0;

    // Função para criar select de produto
    function criarSelect(produtoId = "") {
        const select = document.createElement("select");
        select.name = "produto" + (i + 1);

        const optionVazio = document.createElement("option");
        optionVazio.value = "";
        optionVazio.textContent = "-- Selecione um produto --";
        select.appendChild(optionVazio);

        produtosDisponiveis.forEach(prod => {
            const option = document.createElement("option");
            option.value = prod.id;
            option.textContent = prod.nome;
            if (prod.id == produtoId) option.selected = true;
            select.appendChild(option);
        });

        container.appendChild(select);
        i++;
        numProdutos.value = i;
    }

    // Preencher selects já existentes (edição)
    if (typeof produtosVendidos !== "undefined" && produtosVendidos.length > 0) {
        produtosVendidos.forEach(p => criarSelect(p.id));
    }

    // Botão para adicionar novos produtos
    buttonAddProd.addEventListener("click", () => criarSelect());
});
