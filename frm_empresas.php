<?php
$nit_emp = $_REQUEST["nit_emp"];
$nom_emp = $_REQUEST["nom_emp"];
$tel_emp = $_REQUEST["tel_emp"];
$dir_emp = $_REQUEST["dir_emp"];

$host = "localhost";
$dbname = "tim";
$username = "root";
$password = "";

$cnx = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

$sql = "INSERT INTO empresas (nit_emp,nom_emp,tel_emp,dir_emp) values('$nit_emp', '$nom_emp','$tel_emp','$dir_emp');";

$q = $cnx->prepare($sql);

$result = $q->execute();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>TIM</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
  <h2>Transporte integrado de Manizales</h2>
  <br>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#CrearEmpresa">Crear Empresa</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#CrearConductor">Crear Conductores</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="CrearEmpresa" class="container tab-pane active"><br>
      <h3>Crear Empresa</h3>
      <form action="/frm_empresas.php" method="post">
        <div class="form-group">
          <label for="nit">Nit empresa:</label>
          <input type="text" class="form-control" name="nit_emp" placeholder="Ingrese Nit">
        </div>
        <div class="form-group">
          <label for="nombre">Nombre Empresa</label>
          <input type="text" class="form-control" name="nom_emp" placeholder="Ingrese Nombre">
        </div>
        <div class="form-group">
          <label for="telefono">Telefono</label>
          <input type="text" class="form-control" name="tel_emp" placeholder="Ingrese Telefono">
        </div>
        <div class="form-group">
          <label for="direccion">Dirrecion</label>
          <input type="text" class="form-control" name="dir_emp" placeholder="Ingrese Dirrecion">
        </div>
        <button type="submit" class="btn btn-primary" value="guardar Empresa">Crear</button>
      </form>


    </div>
    <?php
    $host = "localhost";
    $dbname = "tim";
    $username = "root";
    $password = "";

    $cnx = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    $sql = "SELECT nit_emp, nom_emp FROM empresas";

    $q = $cnx->prepare($sql);

    $result = $q->execute();

    $empresas = $q->fetchAll();

    ?>
    <div id="CrearConductor" class="container tab-pane active"><br>
      <h3>Crear Conductor</h3>
      <form action="/frm_conductores.php" method="post">
        <div class="form-group">
          <label for="cc">Cedula Conductor:</label>
          <input type="text" class="form-control" name="cod_cond" placeholder="Ingrese c.c">
        </div>
        <div class="form-group">
          <label for="nombre">Nombre Conductor</label>
          <input type="text" class="form-control" name="nom_cond" placeholder="Ingrese Nombre">
        </div>
        <div class="form-group">
          <label for="telefono">Telefono</label>
          <input type="text" class="form-control" name="tel_cond" placeholder="Ingrese Telefono">
        </div>
        <div class="form-group">
          <label for="direccion">Empresa donde Labora </label>
          <select class="form-control" name="nit_emp" placeholder="Seleccione">>
            <?php
            for ($i=0; $i <count($empresas) ; $i++) {
            ?>
            <option values="<?php echo $empresas[$i]["nit_emp"]?>">
              <?php echo $empresas[$i]["nom_emp"] ?>
            </option>
            <?php
            }
             ?>

         </select>
        </div>
        <button type="submit" class="btn btn-primary" value="guardar Empresa">Crear</button>
      </form>


    </div>
</div>

</body>
</html>
