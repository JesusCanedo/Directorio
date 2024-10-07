<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Directorio Web ITSON</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="main.js"></script>
</head>
<body class="min-h-screen bg-black text-white flex flex-col items-center justify-center p-4">
    
    <?php include('users.php'); ?>

    <h1 class="text-6xl font-bold mb-4 text-center">
        <span class="text-white">Directorio</span>
        <span class="text-purple-500">Web</span>
        <span class="text-pink-500">ITSON.</span>
    </h1>

    <p class="text-gray-400 text-center mb-8 max-w-2xl">
        El directorio web permite buscar y filtrar información de manera rápida y eficiente.
    </p>

<form method="POST" action="index2.php">
    <div class="flex mb-4">
        <input
            type="text"
            name="search"
            placeholder="Buscar por nombre..."
            class="flex-grow bg-gray-800 border-gray-700 text-white rounded-l px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
            value="<?php echo isset($_POST['search']) ? htmlspecialchars($_POST['search']) : ''; ?>"
        >
        <button type="submit" class="bg-blue-500 hover:bg-blue-600 rounded-r px-4 py-2 flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-4 w-4">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
            <span class="sr-only">Buscar</span>
        </button>
    </div>
    <div class="grid grid-cols-3 gap-4">
        <select name="campus" class="custom-select bg-gray-800 text-white border-gray-700 rounded px-4 py-2 w-full">
            <option value="">-- Campus --</option>
            <option value="empalme" <?php echo (isset($_POST['campus']) && $_POST['campus'] == 'empalme') ? 'selected' : ''; ?>>Empalme</option>
            <option value="guaymas" <?php echo (isset($_POST['campus']) && $_POST['campus'] == 'guaymas') ? 'selected' : ''; ?>>Guaymas</option>
        </select>
        <select name="departamento" class="custom-select bg-gray-800 text-white border-gray-700 rounded px-4 py-2 w-full">
            <option value="">-- Departamento --</option>
            <option value="administracion" <?php echo (isset($_POST['departamento']) && $_POST['departamento'] == 'administracion') ? 'selected' : ''; ?>>Administración</option>
            <option value="idiomas" <?php echo (isset($_POST['departamento']) && $_POST['departamento'] == 'idiomas') ? 'selected' : ''; ?>>Idiomas</option>
            <option value="academico" <?php echo (isset($_POST['departamento']) && $_POST['departamento'] == 'academico') ? 'selected' : ''; ?>>Académico</option>
        </select>
        <select name="puesto" class="custom-select bg-gray-800 text-white border-gray-700 rounded px-4 py-2 w-full">
            <option value="">-- Puesto --</option>
            <option value="ingeniero" <?php echo (isset($_POST['puesto']) && $_POST['puesto'] == 'ingeniero') ? 'selected' : ''; ?>>Ingeniero</option>
            <option value="profesor" <?php echo (isset($_POST['puesto']) && $_POST['puesto'] == 'profesor') ? 'selected' : ''; ?>>Profesor</option>
            <option value="administrativo" <?php echo (isset($_POST['puesto']) && $_POST['puesto'] == 'administrativo') ? 'selected' : ''; ?>>Administrativo</option>
        </select>
    </div>
</form>

    <br>
    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-2 gap-4">
        <?php foreach ($result as $empleado): ?>
            <div class="bg-gray-800 rounded-lg shadow-lg p-4">
                <h2 class="text-xl font-semibold"><?php echo htmlspecialchars($empleado['nombre']); ?></h2>
                <p>Campus: <?php echo htmlspecialchars($empleado['campus']); ?></p>
                <p>Departamento: <?php echo htmlspecialchars($empleado['departamento']); ?></p>
                <p>Puesto: <?php echo htmlspecialchars($empleado['puesto']); ?></p>
                <p>Area: <?php echo htmlspecialchars($empleado['area']); ?></p>
                <p>Email: <?php echo htmlspecialchars($empleado['email']); ?></p>
            </div>
        <?php endforeach; ?>
    </div>

</body>
</html>