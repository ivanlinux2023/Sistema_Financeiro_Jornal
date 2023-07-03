<?php
// Carrega as contas a receber e a pagar
$contasReceber = carregarContasReceber();
$contasPagar = carregarContasPagar();

// Gera o relatório
$relatorio = "Relatório Financeiro\n\n";
$relatorio .= "Contas a Receber:\n";
foreach ($contasReceber as $conta) {
    $relatorio .= "Cliente: " . $conta['cliente'] . "\n";
    $relatorio .= "Valor: " . $conta['valor'] . "\n";
    $relatorio .= "Vencimento: " . $conta['vencimento'] . "\n";
    $relatorio .= "\n";
}

$relatorio .= "Contas a Pagar:\n";
foreach ($contasPagar as $conta) {
    $relatorio .= "Fornecedor: " . $conta['fornecedor'] . "\n";
    $relatorio .= "Valor: " . $conta['valor'] . "\n";
    $relatorio .= "Vencimento: " . $conta['vencimento'] . "\n";
    $relatorio .= "\n";
}

// Define o cabeçalho do arquivo
header("Content-type: text/plain");
header("Content-Disposition: attachment; filename=relatorio.txt");

// Exibe o relatório
echo $relatorio;
