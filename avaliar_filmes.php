<?php 
	if (isset($_POST['filme'])) {
		$filme_id = $_POST['filme'];
		$enredo = $_POST['enredo'];
		$elenco = $_POST['elenco'];
		$direcao = $_POST['direcao'];
		$conexao = mysqli_connect("localhost:3306", "root", "");
		if (!$conexao) {
			die("Impossível conectar: " . mysqli_connect_error($conexao));
		}
		mysqli_set_charset($conexao, "utf8");
		$banco_ativo = mysqli_select_db($conexao, "filmes_bd");
		$query = "INSERT INTO avaliacao (enredo, elenco, direcao, filme_id)
				  VALUES ($enredo, $elenco, $direcao, $filme_id)";
		$conj_resultados = mysqli_query($conexao, $query);
		if (!$conj_resultados) {
			echo("<b>Erro na inserção da avaliação!</b><br>".mysqli_error($conexao)."<br>");
		}
		mysqli_close($conexao);
	}
?>

<html lang="pt-br">

	<head>
		<title>Avaliação de filmes | By Gabriel</title>
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
								<a class="nav-link active" aria-current="page" href="medias_avaliacoes.php">&nbspVer Avaliações&nbsp</a>
							</li>
							<li class="nav-item">
								<a class="nav-link active" aria-current="page" href="cad_filmes.php">&nbspCadastrar Filmes&nbsp</a>
							</li>
							<li disabled class="nav-item">
								<a class="nav-link active" aria-current="page" href="#">&nbspAvaliar Filmes&nbsp</a>
							</li>
						</ul>
						<span class="navbar-text">Exercício de desenvolvimento Web - Processo seletivo Estágio CIEE</span>

					</div>

				</div>
			</nav>

		</header>
		<br>
		<main>	

			<div class="card text-center" style="margin:0 5% 1% 5%; border: none;">
				<div class="card border-success mb-3">
				<h2 style="margin: 1% 1% 0% 1%">Avaliação de Filmes</h2>
			<?php 
				$conexao = mysqli_connect("localhost:3306", "root", "");
				mysqli_set_charset($conexao, "utf8");
				$banco_ativo = mysqli_select_db($conexao, "filmes_bd");
				$query = "SELECT * FROM filme";
				$conj_resultados = mysqli_query($conexao, $query);
				$filmes = mysqli_fetch_all($conj_resultados, MYSQLI_ASSOC);
			?>
			<div>
			<div class="card-header bg-transparent border-success"></div> <!--Adiciona a linha entre o título do card e os itens abaixo-->

			<div class="card-body text-success">
				<form action="avaliar_filmes.php" method="POST">Filme:
					<select name="filme">
						<?php
							foreach ($filmes as $filme) {
								$filme_id = $filme['id'];
								$filme_nome = $filme['nome'];
								echo("<option value='$filme_id'> $filme_nome </option>");
							}	
						?>
					</select>
					<br/><br>
					Enredo: 
					<div>
						<input type="radio" name="enredo" id="aval" value="1"/> 1
						<input type="radio" name="enredo" id="aval" value="2"/> 2
						<input type="radio" name="enredo" id="aval" value="3"/> 3
						<input type="radio" name="enredo" id="aval" value="4"/> 4
						<input type="radio" name="enredo" id="aval" value="5"/> 5
					</div>
					<br>
					Elenco:
					<div>
						<input type="radio" name="elenco" id="aval" value="1"/> 1
						<input type="radio" name="elenco" id="aval" value="2"/> 2
						<input type="radio" name="elenco" id="aval" value="3"/> 3
						<input type="radio" name="elenco" id="aval" value="4"/> 4
						<input type="radio" name="elenco" id="aval" value="5"/> 5
					</div>
					<br>
					Direcao: 
					<div>
						<input type="radio" name="direcao" id="aval" value="1"/> 1
						<input type="radio" name="direcao" id="aval" value="2"/> 2
						<input type="radio" name="direcao" id="aval" value="3"/> 3
						<input type="radio" name="direcao" id="aval" value="4"/> 4
						<input type="radio" name="direcao" id="aval" value="5"/> 5
					</div>
					<br>
					<input class="btn btn-success" type="submit" value="Enviar"/>
					</div>

				</form>
			</div>

		</main>


		<footer>
			<img class="rounded mx-auto d-block" src="avaFilmes.png">
		</footer>


	</body>

</html> 
