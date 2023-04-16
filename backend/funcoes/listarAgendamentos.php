<?php
echo "
    
  ";

// Caso o tipo do usuário for Adm, mostrará o botão que leva a página de cadastro
if ($_SESSION['tipo'] == 'Adm') {
  echo "<a href='$cadFunRoute'>Cadastrar Funcionários</a>";
}

echo "
    <a href='$registroRoute'>Nova Entrada</a>
    <a id='meuBota'>Fechamento</a>
    <a href='$historicoRoute'>Histórico</a>
    <a href='$procLogoffCliRoute'>Sair</a><br>

    <form action='$listaRoute' method='get'>
    <input type='text' placeholder='Pesquise por placas:' name='pesq'><input type='submit' value='Pesquisar'>
    </form>
    </div>
    
    </header>
    
    <h1>Lista de carros cadastrados no estacionamento</h1>
    
    
  ";

if (isset($_SESSION['msgregistrosim'])) {
  echo "<span>" . $_SESSION['msgregistrosim'] . "</span>";
  unset($_SESSION['msgregistrosim']);
}

if (isset($_GET['pesq'])) {
  $pesq = $_GET['pesq'];
} else {
  $pesq = "";
}

// Receber o número da página
$pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

// Setar a quantidade de items por pagina
$qnt_result_pg = 6;

// Calcular o inicio visualização
$inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

// Faz uma query para retornar todos os registros que não foram fechados
$resultado = mysqli_query($conn, "SELECT * FROM registros
  WHERE Horario_saida IS NULL AND Placa like '%$pesq%'
  LIMIT $inicio, $qnt_result_pg");

// Retorna todos os registros coletados na query, e adicionar no array rows
$rows = $resultado->fetch_all();

echo "<div class='cards'>";
// Para cada index no array rows, cria um "card"
foreach ($rows as $row) {
  echo "
        <div>

          <fieldset>
          <legend>Nome</legend>
          <p>$row[2]</p>
          </fieldset>
        
          <fieldset>
          <legend>Horário de saida</legend>
          <p>$row[6]</p>
          </fieldset>
        
          <fieldset>
          <legend>Placa</legend>
          <p>$row[4]</p>
          </fieldset>

          <a href='$procCalculoRoute?id=$row[0]'>Detalhes</a><br>
        </div>
        ";
}
echo "</div><br>";

// Paginação - Somar a quantidade de usuários
$resultado_pg = mysqli_query($conn, "SELECT COUNT(PK_Registro)
  AS num_result FROM registros WHERE Horario_saida IS NULL");
$row_pg = mysqli_fetch_assoc($resultado_pg);
// echo $row_pg['num_result'];

// Quantidade de pagina
$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

// Limitar os link antes depois
$max_links = 2;
echo "
  <div class='pags'>
  <a href='$listaRoute?pagina=1'>Primeira</a>";

for ($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++) {
  if ($pag_ant >= 1) {
    echo "<a href='$listaRoute?pagina=$pag_ant'>$pag_ant</a>";
  }
}

echo $pagina;

for ($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++) {
  if ($pag_dep <= $quantidade_pg) {
    echo "<a href='$listaRoute?pagina=$pag_dep'>$pag_dep</a>";
  }
}

echo "
  <a href='$listaRoute?pagina=$quantidade_pg'>Ultima</a>
  </div>";
  