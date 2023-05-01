<?php
include "scripts/configura.php";
include "scripts/funcoes.inc.php";
verificaSessao();
?>
<HTML>

<HEAD>
	<meta charset="utf-8" />
	<title>SELETO - Cadastro candidatos</title>

</HEAD>

<body>
	<table ALIGN=CENTER border=0 width=90% cellspacing=1>

		<Tr>
			<td></td>
		</tr>
	</table>
	<table ALIGN=CENTER border=0 width=90% cellspacing=1>
		<tr>
			<td width=100% bgcolor=C0C0C0 valign=middle>
				<center>
					<font face=Verdana color=black><b>

							<FONT SIZE=2>
								<p>
									<?php
									$conexao = mysqli_connect("$host", "$user", "$pass", "$bd");
									$cand_dt_inscricao = "2023-05-$_POST[dia_inscricao]";
									// $cand_nascimento = "$_POST[ano_nascimento]-$_POST[mes_nascimento]-$_POST[dia_nascimento]";

									$cand_inscricao = sprintf("%06d", $_POST['cand_inscricao']); // Completa com 0 o num. inscricao da Ficha
									echo $cand_inscricao;

									$pega_id = mysqli_query($conexao, "SELECT max(cand_id) ULT_ID FROM candidatos");

									$pega_id2 = mysqli_fetch_assoc($pega_id);
									$ultimo_idx = $pega_id2["ULT_ID"];
									$ultimo_id = $ultimo_idx + 1;

									$id_inscricao = sprintf("%04d", $ultimo_id);
									$cand_car_id = sprintf("%02d", $_POST['cand_car_id']);
									$cand_inscricao_sistema = "$cand_car_id-$id_inscricao";

									$insere = mysqli_query(
										$conexao,
										"INSERT INTO CANDIDATOS (
											cand_inscricao,
											cand_nome,
											cand_nascimento,
											cand_endereco,
											cand_fone,
											cand_pai,
											cand_mae,
											cand_doc_identificacao,
											cand_tipo_doc_ident,
											cand_car_id,
											cand_unidade_lotacao,
											cand_usu_id,
											cand_dt_inscricao,
											cand_dt_sistema
										)
									VALUES (
											'$_POST[candidato_inscricao]',
											'$_POST[candidato_nome]',
											'$_POST[data_nascimento]',
											'$_POST[candidato_endereco]',
											'$_POST[candidato_telefone]',
											'$_POST[candidato_pai]',
											'$_POST[candidato_mae]',
											'$_POST[candidato_documento_identificacao]',
											'$_POST [candidato_tipo_identidade]',
											'$_POST[candidato_cargo_id]',
											'0',
											'$_SESSION[id]',
											'$cand_dt_inscricao',
											'$_POST[cand_data_cadastro]'
										)"
									);
									//mysqli_close();
									echo "<center>
											<b><font size=3 color=red>CANDIDATO INSERIDO COM SUCESSO!<p></font>
											</B></CENTER>";
									?>
</body>

</html>