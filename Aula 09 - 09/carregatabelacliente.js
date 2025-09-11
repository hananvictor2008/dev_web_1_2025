//deve iniciar o servidor com o json, ver a Aula 09 - 11
const url = "http://localhost:3000/cliente"

document.addEventListener("DOMContentLoaded", (evento)=>{
    evento.preventDefault();
    const tabela = document.getElementsByTagName("table")[0]//retorna o primeiro table do código

    fetch(url).then( async resposta => { //deve ser async para usar o await
        const clientes = await resposta.json() //converte a resposta para JSON e aguarda a conversão, sem o await, retorna uma Promise, com o await, retorna o JSON
        console.log(clientes)

        clientes.forEach(cliente =>{
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
})