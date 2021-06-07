<?php 
//header('Content-Type: application/json');

$respuesta = $_POST;

$respuesta = json_encode($respuesta,JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);


$callback = "Algo ocurrio";
$err = "Ha ocurrido un error";

echo "

<script src='https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js'></script>
<script>

let response = '{$callback}';
let error = '{$err}';

JSON.stringify({$respuesta});

axios.post('http://localhost/proy_raul2/backend/api/usuarios.php', {
    datos: '{$respuesta}',
    mensaje: 'Peticion de creacion de usuario'
  })
  .then(function (response) {
    console.log(response.data);
  })
  .catch(function (error) {
    console.log(error);
  });


</script>

";
header('Location:../formulario.html');
?>
