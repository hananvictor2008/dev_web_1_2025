//abrir a pasta C:\Users\Aluno\Desktop\Hanan\dev_web_1_2025\Aula 09 - 11> no terminal e digitar "node saida.js" ou "node .": ele executa o código e a saida aparece no terminal
//node = ambiente de execução do JS fora do navegador
//console.log = comando para imprimir algo na tela (terminal)

//npm = node package manager (gerenciador de pacotes do node) - é um gerenciador de bibliotecas (pacotes) do node.js
//npm init = cria o arquivo package.json (arquivo de configuração do projeto)
//npm i nome_da_biblioteca = instala uma biblioteca (pacote) no projeto
//prompt-sync = biblioteca que permite ler dados do usuário no terminal (input)

/* 
const prompt = require('prompt-sync')() //importa a biblioteca prompt-sync, mesma coisa que o include no PHP
let idade = prompt('Quantos anos você tem? ') //lê o nome do usuário
console.log(typeof idade) //imprime o tipo da variável nome (string)

Idade = parseInt(idade) //converte a variável nome para inteiro (number)
console.log(typeof Idade) //imprime o tipo da variável nome (int)

console.log(idade + " - " + Idade) //imprime o nome do usuário no terminal
*/

//json-server = biblioteca que cria uma API REST fake (falsa) a partir de um arquivo JSON
//deve criar um arquivo json e executar o próximo comando no terminal para iniciar o servidor com o json-server
//npx json-server --watch db/app.json = comando para iniciar o json-server (API REST fake) no terminal, ou seja, cria um servidor local na porta 3000 com o objeto (http://localhost:3000) que lê os dados do arquivo db/app.json
//ir para Aula 09 - 09 para ver como usar o servidor da API REST com fetch
