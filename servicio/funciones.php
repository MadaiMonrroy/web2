<?php
function guardarCurso($nombre_curso, $precio, $categoria) {
    include("config.php");
    $sql = "INSERT INTO cursos(nombre_curso, precio, categoria) VALUES ('$nombre_curso', $precio, '$categoria')";
    $execonsulta = $mysqli->query($sql);
    if($execonsulta) {
        return "Agregado";
    } else {
        return "";
    }
}
function obtenerCursos() {
    include("config.php"); // Suponiendo que este archivo contiene la conexión a la base de datos
	
		$sql = "SELECT * FROM cursos;"; // Seleccionamos todos los atributos de los cursos
	
		$resultado = $mysqli->query($sql);
	
		$cursos = array(); // Inicializamos el array de JSONs
	
		if($resultado->num_rows > 0) {
			// Iteramos sobre los resultados y agregamos cada c como un objeto asociativo al array
			while($fila = $resultado->fetch_assoc()) {
				$c = array(
					'Nombre' => $fila['nombre_curso'],
					'Precio' => $fila['precio'],
					'Categoria' => $fila['categoria']
				);
				$cursos[] = $c; // Agregamos el objeto asociativo al array
			}
	
			// Devolvemos el array de objetos asociativos
			return $cursos;
		} else {
			return ""; // Devolvemos cadena vacía si no hay resultados
		}
    
}
function mostrarAtributo($nombre_curso, $dato){
	include ("config.php");
	$sql = "SELECT $dato FROM cursos WHERE nombre_curso  = '$nombre_curso';";
	$result = $mysqli-> query($sql);
	if($result -> num_rows>0){
		$fila = $result->fetch_assoc();
		return $fila;
	}else {
		return "";
	}

}


?>
