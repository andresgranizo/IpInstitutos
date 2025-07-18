<?php require_once 'logic.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Instituto</title>

    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- jQuery y Select2 JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            text-align: center;
        }

        form {
            margin-top: 40px;
        }

        select {
            width: 350px;
            padding: 8px;
        }

        button {
            padding: 8px 16px;
            margin-left: 10px;
        }

        .popup {
            margin-top: 20px;
            background-color: #4CAF50;
            color: white;
            padding: 12px 24px;
            border-radius: 6px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            font-weight: bold;
            animation: fadeout 3s forwards;
            text-align: center;
            max-width: 400px;
            margin-left: auto;
            margin-right: auto;
        }

        @keyframes fadeout {
            0% { opacity: 1; }
            80% { opacity: 1; }
            100% { opacity: 0; display: none; }
        }
    </style>
</head>
<body>
    <h2>Registrar Instituto</h2>
    <form method="POST">
        <label for="instituto">Seleccione el Instituto:</label><br><br>
        <select id="instituto" name="nombre" required>
            <option value="">Buscar Instituto...</option>
            <?php foreach ($institutos as $inst): ?>
                <option value="<?= htmlspecialchars($inst['nombre_completo']) ?>">
                    <?= htmlspecialchars($inst['nombre_completo']) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Registrar</button>
    </form>

    <?php if (isset($_GET['popup']) && $_GET['popup'] === 'ok'): ?>
        <div id="popup" class="popup">✅ Instituto registrado correctamente.</div>
    <?php endif; ?>

    <script>
        $(document).ready(function() {
            $('#instituto').select2({
                placeholder: "Buscar Instituto...",
                allowClear: true
            });
        });
    </script>
</body>
</html>
