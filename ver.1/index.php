<!-- php -S localhost:8000 -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Directorio ITSON</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script src="main.js"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body>
    <div class="main-container">
        <div class="title-container">
            <h1>Directorio Web</h1>
        </div>

        <!-- Formulario de búsqueda con ancho limitado -->
        <div class="search-container">
            <form id="searchForm">
                <h2>Búsqueda:</h2>
                <div class="input-group">
                    <input
                        id="search"
                        type="text"
                        placeholder="Ingresa nombre"
                    >
                    <button type="submit">
                        <i data-lucide="search"></i>
                    </button>
                </div>
                <div class="filters">
                    <select id="campus" class="text-center">
                        <option value="">-- Campus --</option>
                        <option value="guaymas">Guaymas</option>
                        <option value="empalme">Empalme</option>
                    </select> 
                    <select id="departamento" class="text-center">
                        <option value="">-- Departamento --</option>
                        <option value="academico">Académico</option>
                        <option value="administrativo">Administrativo</option>
                        <option value="idiomas">Idiomas</option>
                    </select>
                    <select id="puesto" class="text-center">
                        <option value="">-- Puesto --</option>
                        <option value="profesor">Profesor</option>
                        <option value="ingeniero">Ingeniero</option>
                        <option value="administrativo">Administrativo</option>
                    </select>
                </div>
            </form>
        </div>

        <!-- Tabla de ancho completo -->
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Departamento</th>
                        <th>Nombre</th>
                        <th>Puesto</th>
                        <th>Email</th>
                        <th>Área</th>
                        <th>Campus</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Contenido de la tabla -->
                </tbody>
            </table>
        </div>
    </div>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>
