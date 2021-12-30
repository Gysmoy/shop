<?php
if(!isset($_GET['id'])){
    require_once 'database.php';
    $db = new Database();
    /**
     * Declaramos la consulta donde :nombre_cualquiera es
     * la posición de la variable que se le pasará en el 
     * metodo execute()
     */
    $query = $db -> connect() -> prepare('SELECT
        columna_imagen
    FROM mi_tabla
    WHERE id = :id_imagen_get
    ');
    /**
     * Le pasamos la variable del id en :id_imagen_get
     */
    $query -> execute([
        ':id_imagen_get' => $_GET['id'],
        // Pueden ir mas variables según las posiciones
        // declaradas en la consulta (:var1, :var2, :varx)
    ]);
    /**
     * Obtenemos la primera columna con fetch y todas con fetchAll
     */
    $row = $query -> fetch(PDO::FETCH_ASSOC);
    // Verificamos la existencia de alguna columna
    if ($row) {
        header('Content-type: imagen/png');
        /**
         * Content-type: imagen/png declara que el contenido que
         * se mostrará es una imagen png (puede ser jpg también)
         */
        echo $row['columna_imagen'];
        /**
         * Imprime el base64 (string) de la imagen pero el header
         * anterior lo codifica como imagen (multimedia)
         */
    } else {
        echo 'La imagen para el id ' . $_GET['id'] . 'No esta disponible';
    }
} else {
    echo 'Se require un id para mostrar una imagen';
}
?>