<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Login - Locadora</title>
<form>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
    }

    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background-color: #f1f3f4;
      padding: 10px 20px;
      border-bottom: 1px solid #ccc;
    }

    main {
      padding: 20px;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 80vh;
    }

    form {
      display: flex;
      flex-direction: column;
      gap: 15px;
      width: 300px;
    }

    form input {
      padding: 10px;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    form button {
      padding: 10px;
      background-color: #4285f4;
      color: white;
      font-size: 16px;
      border: none;
      cursor: pointer;
      border-radius: 5px;
    }

    form button:hover {
      background-color: #357ae8;
    }
  </style>
</head>
<body>
  <header>
    <h2>Locadora</h2>
  </header>

  <main>
    <form action="ListagemdeVeiculos.php" method="POST">
      <h2>Login</h2>
      <label>E_mail</label> <input type="text" name="E-mail" >
       <label>senha</label><input type="number" name="Senha" >

    </form>
  </main>
</body>
</html>
<?php
$E-mail=$_POST["E-mail"];
$senha=$_POST["senha"];

session_star();
if(!isset($["usuario"])){
	$_SESSION["usuario"]=[];
}
if(isset($_POST["E-mail"])&&
isset ($_POST["nome"]){

$E-mail=$_POST["E-mail"];
$nome=$_POST["nome"];
}
$usuarios=[$nome,$E-mail];
}

$usuarios=[
"Nome"=>"usuario";
"E-mail"=>"leticianascimento@gmail.com";
"senha"=>"fj3rjd8"];



?>
 <button type="submit">Login</button>
<label>Modelo do veiculo</label> <input type="text" name="Modelo do Veiculo" name= Modelo do veiculo>
	<select="Montadora">
<option>Honda </option>
<option>Chevrolet </option>
<option>Peugeot </option>   
<option>Volkswagen</option>   
<option>Fiat</option>  
<option>Toyota</option>  
<option>BYD</option> 
<option>Outros</option> 
	</select>
<select required>
        <option disabled selected>Tipo de motor</option>
        <option>1.0</option><option>1.4</option><option>1.6</option>
        <option>2.0</option><option>Elétrico</option><option>Outros</option>
      </select>
      <select required>
        <option disabled selected>Tipo de combustível</option>
        <option>Flex</option><option>Gasolina</option><option>Álcool</option>
        <option>Diesel</option><option>Elétrico</option>
      </select>
      <input type="number" placeholder="Número de lugares" required>
      <input type="number" placeholder="Litragem do bagageiro" required>
      <input type="number" placeholder="Preço do veículo" required>
      <button type="submit">Cadastrar</button>
    
</form>
  </main>
</body>
</html>
 