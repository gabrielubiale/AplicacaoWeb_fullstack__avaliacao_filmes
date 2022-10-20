<?php 
	$conexao = mysqli_connect("localhost:3306", "root", "");
	mysqli_set_charset($conexao, "utf8");
	$banco_ativo = mysqli_select_db($conexao, "filmes_bd");
	$query = "SELECT f.nome AS nome, 
					 AVG(a.enredo) AS enredo,
					 AVG(a.elenco) AS elenco,
					 AVG(a.direcao) AS direcao 
			  FROM avaliacao a JOIN filme f ON a.filme_id = f.id
			  GROUP BY f.id";
	$conj_resultados = mysqli_query($conexao, $query);
	$avaliacoes = mysqli_fetch_all($conj_resultados, MYSQLI_ASSOC);
	mysqli_close($conexao);
?>

<html lang="pt-br">

	<head>
		<title>Média dos filmes | By Gabriel</title>
		<meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	</head>

	<body>

		<header>
			<nav class="navbar navbar-expand-lg navbar-dark bg-success">
				<div class="container-fluid">
					<a class="navbar-brand" href="https://www.linkedin.com/in/gabriel-facchiochi-ubiale/" target="_blank">By Gabriel Ubiale</a>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
					</button>

					<div class="collapse navbar-collapse" id="navbarText">

						<ul class="navbar-nav me-auto mb-2 mb-lg-0">
							<li class="nav-item">
								<a class="nav-link active" aria-current="page" href="index.php">&nbspInício&nbsp</a>
							</li>
							<li class="nav-item">
								<a class="nav-link active" aria-current="page" href="cad_filmes.php">&nbspCadastrar Filmes&nbsp</a>
							</li>
							<li disabled class="nav-item">
								<a class="nav-link active" aria-current="page" href="avaliar_filmes.php">&nbspAvaliar Filmes&nbsp</a>
							</li>
							<li class="nav-item">
								<a class="nav-link active" aria-current="page" href="#">&nbspVer Avaliações&nbsp</a>
							</li>
						</ul>
						<span class="navbar-text">Exercício de desenvolvimento Web - Processo seletivo Estágio CIEE</span>

					</div>

				</div>
			</nav>
		</header>


		<main>

			<h2 style="text-align: center;margin-top: 1%">Média de Avaliações</h2>
			<table class="table table-success" style="width:90%; margin: 1% 5% 1% 5%;">
				<tr>
					<td><b>Nome</b></td>
					<td><b>Enredo</b></td>
					<td><b>Elenco</b></td>
					<td><b>Direção</b></td>
				</tr>
				<?php 
					foreach($avaliacoes as $aval) {
						echo("<tr>");
						echo("<td>".$aval['nome']."</td>");
						echo("<td>".$aval['enredo']."</td>");
						echo("<td>".$aval['elenco']."</td>");
						echo("<td>".$aval['direcao']."</td>");
						echo("</tr>");
					}
				?>
			</table>

		</main>

		<footer>
			<img class="rounded mx-auto d-block" src="mediaFilmes.png">
		</footer>

	</body>

</html>