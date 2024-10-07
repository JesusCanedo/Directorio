<?php
header('Content-Type: application/json');

try {
    $db = new PDO('sqlite:/home/user/directorio/data.sqlite');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "SELECT id, departamento, nombre, puesto, email, area, campus FROM usuarios WHERE 1=1";
    $params = [];

    $input = json_decode(file_get_contents('php://input'), true);

    if (!empty($input['search'])) {
        $query .= " AND LOWER(nombre) LIKE LOWER(:search)";
        $params[':search'] = '%' . strtolower($input['search']) . '%';
    }
    if (!empty($input['campus'])) {
        $query .= " AND LOWER(campus) = LOWER(:campus)";
        $params[':campus'] = strtolower($input['campus']);
    }
    if (!empty($input['departamento'])) {
        $query .= " AND LOWER(departamento) = LOWER(:departamento)";
        $params[':departamento'] = strtolower($input['departamento']);
    }
    if (!empty($input['puesto'])) {
        $query .= " AND LOWER(puesto) = LOWER(:puesto)";
        $params[':puesto'] = strtolower($input['puesto']);
    }

    $stmt = $db->prepare($query);
    $stmt->execute($params);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($result);

} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
