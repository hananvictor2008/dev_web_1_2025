const container = document.querySelector("#produtosContainer")
const qtdProdutos = document.querySelector("#qtdProdutos").value

for(let i = 0; i < qtdProdutos; i++){
    const input = document.createElement("input")
    input.type = "text"
    input.name = "produto" + (i+1)
    input.value = '<?php echo isset($venda->produtosVendidos[' + $i + ']) ? $venda->produtosVendidos[' + $i + '][0] : ""; ?>'
    input.placeholder = '<?php echo isset($venda->produtosVendidos[' + $i + ']) ? $venda->produtosVendidos[' + $i + '][1] : "Produto" + ' + (i+1) + '; ?>'
    container.appendChild(input)
    document.write("<?php $valorTotal += $venda->produtosVendidos[" + i + "][2]; ?>")
}