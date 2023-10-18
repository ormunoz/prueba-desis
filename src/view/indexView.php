<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votación</title>
    <link rel="stylesheet" href="../public/css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>
    <header>
        <nav>
            <ul>
            <li><a href="/desis/src/view/indexView.php">Formulario</a></li>
                <li><a href="/desis/src/view/votacionesView.php">Ver votaciones</a></li>
                <li><a href="/desis/src/view/infoView.php">Votantes</a></li>
                <li><a href="/desis/src/view/encuestaView.php">Encuestas</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="container">
            <h1>Formulario de Votación</h1>
            <form id="votingForm" autocomplete="off">
                <fieldset>
                    <legend>Datos para la Votación</legend>
                    <div class="form-group">
                        <label for="nombre_apellido">Nombre y apellido:</label>
                        <input type="text" id="nombre_apellido" name="nombre_apellido" required maxlength="60" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="alias">Alias:</label>
                        <input type="text" id="alias" name="alias" required maxlength="20">
                    </div>

                    <div class="form-group">
                        <label for="rut">RUT:</label>
                        <input type="text" id="rut" name="rut" required maxlength="16">
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required maxlength="50">
                    </div>

                    <div class="form-group">
                        <label for="region">Región:</label>
                        <select id="region" name="region" required>
                            <option value="0" disabled>Seleccione una región</option>

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="comuna_id">Comuna:</label>
                        <select id="comuna_id" name="comuna_id" required disabled>
                            <option value="0">Seleccione una comuna</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="candidato_id">Candidato:</label>
                        <select id="candidato_id" name="candidato_id" required>
                            <option value="0">Seleccione un candidato</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Seleccione encuestas:</label>
                        <div id="encuestas" class="checkbox-group">
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Votar">
                    </div>
                </fieldset>
            </form>
        </div>
    </main>

    <footer>
        <div class="footer-content">
            <p>&copy; Prueba Tecnica, Desis 2023 - Todos los derechos reservados</p>
        </div>
    </footer>
</body>

</html>

<script src="../public/js/peticiones.js"></script>
<script src="../public/js/validaciones.js"></script>