<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Financeiro</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="header">
        <img src="jornal.png" alt="jornal" class="logo">
        <h1>Sistema Financeiro</h1>
    </div>

    <div class="form-container">
        <h3>Adicionar Conta a Receber</h3>
        <form method="POST" action="">
            <label for="cliente">Cliente:</label>
            <input type="text" name="cliente" id="cliente" required>

            <label for="valor">Valor:</label>
            <input type="number" name="valor" id="valor" required step="0.01">

            <label for="vencimento">Vencimento:</label>
            <input type="date" name="vencimento" id="vencimento" required>

            <input type="submit" name="adicionarReceber" value="Adicionar">
        </form>
    </div>

    <h2>Contas a Receber</h2>
    <table>
        <tr>
            <th>Cliente</th>
            <th>Valor</th>
            <th>Vencimento</th>
            <th>Ações</th>
        </tr>
        <?php
        // Inicialização das variáveis $contasReceber e $contasPagar
        $contasReceber = isset($_POST['contasReceber']) ? $_POST['contasReceber'] : array(); // Contas a Receber
        $contasPagar = isset($_POST['contasPagar']) ? $_POST['contasPagar'] : array(); // Contas a Pagar

        // Adicionar conta a receber
        if (isset($_POST['adicionarReceber'])) {
            $novaContaReceber = array(
                'cliente' => $_POST['cliente'],
                'valor' => $_POST['valor'],
                'vencimento' => $_POST['vencimento']
            );
            $contasReceber[] = $novaContaReceber;
        }

        // Excluir conta a receber
        if (isset($_GET['excluirReceber'])) {
            $indice = $_GET['excluirReceber'];
            if (isset($contasReceber[$indice])) {
                unset($contasReceber[$indice]);
            }
        }

        // Exibe as contas a receber
        foreach ($contasReceber as $index => $conta) {
            echo '<tr>';
            echo '<td>' . $conta['cliente'] . '</td>';
            echo '<td>' . $conta['valor'] . '</td>';
            echo '<td>' . $conta['vencimento'] . '</td>';
            echo '<td><a href="?excluirReceber=' . $index . '">Excluir</a></td>';
            echo '</tr>';
        }
        ?>
    </table>

    <div class="form-container">
        <h3>Adicionar Conta a Pagar</h3>
        <form method="POST" action="">
            <label for="fornecedor">Fornecedor:</label>
            <input type="text" name="fornecedor" id="fornecedor" required>

            <label for="valor">Valor:</label>
            <input type="number" name="valor" id="valor" required step="0.01">

            <label for="vencimento">Vencimento:</label>
            <input type="date" name="vencimento" id="vencimento" required>

            <input type="submit" name="adicionarPagar" value="Adicionar">
        </form>
    </div>

    <h2>Contas a Pagar</h2>
    <table>
        <tr>
            <th>Fornecedor</th>
            <th>Valor</th>
            <th>Vencimento</th>
            <th>Ações</th>
        </tr>
        <?php
        // Adicionar conta a pagar
        if (isset($_POST['adicionarPagar'])) {
            $novaContaPagar = array(
                'fornecedor' => $_POST['fornecedor'],
                'valor' => $_POST['valor'],
                'vencimento' => $_POST['vencimento']
            );
            $contasPagar[] = $novaContaPagar;
        }

        // Excluir conta a pagar
        if (isset($_GET['excluirPagar'])) {
            $indice = $_GET['excluirPagar'];
            if (isset($contasPagar[$indice])) {
                unset($contasPagar[$indice]);
            }
        }

        // Exibe as contas a pagar
        foreach ($contasPagar as $index => $conta) {
            echo '<tr>';
            echo '<td>' . $conta['fornecedor'] . '</td>';
            echo '<td>' . $conta['valor'] . '</td>';
            echo '<td>' . $conta['vencimento'] . '</td>';
            echo '<td><a href="?excluirPagar=' . $index . '">Excluir</a></td>';
            echo '</tr>';
        }
        ?>
    </table>

    <script src="script.js"></script>
</body>
</html>
