<?php require_once 'logic.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Instituto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            text-align: center;
        }

        form {
            margin-top: 40px;
        }

        input[type="text"] {
            padding: 6px;
            width: 300px;
            text-transform: uppercase;
        }

        button {
            padding: 6px 12px;
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
        <label for="nombre">Nombre del Instituto:</label><br>
        <input type="text" id="nombre" name="nombre" required>
        <button type="submit">Registrar</button>
    </form>

    <?php if (!empty($mensaje)): ?>
        <div id="popup" class="popup">✅ <?= htmlspecialchars($mensaje) ?></div>
    <?php endif; ?>
</body>
</html>
