<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Datos</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body>
    <div class="search-container">
    <h1 class="font-bold text-4xl">Registrar >
            <label for="extension">Extension:</label>
            <input type="text" id="extension" name="extension" required>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
            <label for="departamento">Departamento:</label>
            <input type="text" id="departamento" name="departamento" required>
            <label for="puesto">Puesto:</label>
            <input type="text" id="puesto" name="puesto" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="area">Área:</label>
            <input type="text" id="area" name="area" required>
            <label for="campus">Campus:</label>
            <input type="text" id="campus" name="campus" required>
            <button type="submit" class="bg-blue-500 hover:bg-black-700 text-white font-bold py-2 px-4 rounded">
            Registrar
            </button>
    </form>
    </div>


</body>
</html>
