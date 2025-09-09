let produtos = {lista:[
    { id: 1, nome: "Arroz", categoria: "Alimentos", preco: 25.90, estoque: true },
    { id: 2, nome: "Feijão", categoria: "Alimentos", preco: 9.50, estoque: true },
    { id: 3, nome: "Detergente", categoria: "Limpeza", preco: 2.50, estoque: false },
    { id: 4, nome: "Shampoo", categoria: "Higiene", preco: 12.90, estoque: true }
  ]};

document.addEventListener("DOMContentLoaded", (evento)=>{
    evento.preventDefault();
    let tabela = document.getElementsByTagName("table")[0]//retorna o primeiro table do código
    produtos.lista.forEach(produto =>{
        const linha = document.createElement("tr")
        const colunaNome = document.createElement("td")
        const colunaPreco = document.createElement("td")
        const colunaCategoria = document.createElement("td")
        const colunaEstoque = document.createElement("td")

        colunaNome.textContent = produto.nome
        colunaPreco.textContent = produto.preco
        colunaCategoria.textContent = produto.categoria
        colunaEstoque.textContent = produto.estoque ? "Com Estoque" : "Sem Estoque"
        
        tabela.appendChild(linha)
        linha.appendChild(colunaNome)
        linha.appendChild(colunaCategoria)
        linha.appendChild(colunaPreco)
        linha.appendChild(colunaEstoque)

    })
})