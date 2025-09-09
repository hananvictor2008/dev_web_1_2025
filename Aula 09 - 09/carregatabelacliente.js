let clientes = {
    lista: [
        { nome: "José", id: 2, nascimento: "Bom Jardim" },
        { nome: "Maria", id: 3, nascimento: "Recife" },
        { nome: "Ana", id: 4, nascimento: "Olinda" },
        { nome: "Carlos", id: 5, nascimento: "Caruaru" },
        { nome: "Fernanda", id: 6, nascimento: "Garanhuns" },
        { nome: "João", id: 7, nascimento: "Petrolina" },
        { nome: "Luciana", id: 8, nascimento: "Paulista" },
        { nome: "Marcos", id: 9, nascimento: "Jaboatão dos Guararapes" },
        { nome: "Patrícia", id: 10, nascimento: "Camaragibe" },
        { nome: "Ricardo", id: 11, nascimento: "Gravatá" },
        { nome: "Sônia", id: 12, nascimento: "Vitória de Santo Antão" },
        { nome: "Daniel", id: 13, nascimento: "Arcoverde" },
        { nome: "Rafaela", id: 14, nascimento: "Serra Talhada" },
        { nome: "Bruno", id: 15, nascimento: "Igarassu" },
        { nome: "Larissa", id: 16, nascimento: "Palmares" }
    ]
}

document.addEventListener("DOMContentLoaded", (evento)=>{
    evento.preventDefault();
    let tabela = document.getElementsByTagName("table")[0]//retorna o primeiro table do código
    clientes.lista.forEach(cliente =>{
        const linha = document.createElement("tr")
        const colunaNome = document.createElement("td")
        const colunaNascimento = document.createElement("td")

        colunaNome.textContent = cliente.nome
        colunaNascimento.textContent = cliente.nascimento
        
        tabela.appendChild(linha)
        linha.appendChild(colunaNome)
        linha.appendChild(colunaNascimento)

    })
})