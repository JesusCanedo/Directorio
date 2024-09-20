<?php
try {
    $db = new PDO('sqlite:/home/user/directorio/data.sqlite');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "SELECT id, departamento, nombre, puesto, email, area, campus FROM usuarios WHERE 1=1";
    $params = [];

    // Verificar si se envió búsqueda por nombre
    if (!empty($_POST['search'])) {
        $query .= " AND LOWER(nombre) LIKE LOWER(:search)";
        $params[':search'] = '%' . strtolower($_POST['search']) . '%';
    }

    // Filtrar por campus
    if (!empty($_POST['campus'])) {
        $query .= " AND LOWER(campus) = LOWER(:campus)";
        $params[':campus'] = strtolower($_POST['campus']);
    }

    // Filtrar por departamento
    if (!empty($_POST['departamento'])) {
        $query .= " AND LOWER(departamento) = LOWER(:departamento)";
        $params[':departamento'] = strtolower($_POST['departamento']);
    }

    // Filtrar por puesto
    if (!empty($_POST['puesto'])) {
        $query .= " AND LOWER(puesto) = LOWER(:puesto)";
        $params[':puesto'] = strtolower($_POST['puesto']);
    }

    // Preparar y ejecutar la consulta
    $stmt = $db->prepare($query);
    $stmt->execute($params);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<!-- Query: " . $query . " -->\n";
    echo "<!-- Params: " . print_r($params, true) . " -->\n";

} catch (PDOException $e) {
    echo "Error en la conexión: " . $e->getMessage();
}