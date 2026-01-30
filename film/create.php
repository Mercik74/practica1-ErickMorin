<?php
require "../auth/auth.php";
require "../config/db.php";

if ($_POST) {
    $sql = "INSERT INTO film 
        (title, language_id, rental_duration, rental_rate, replacement_cost, last_update)
        VALUES (?, 1, 3, ?, 20.00, NOW())";

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $_POST['title'],
            $_POST['rental_rate']
        ]);

        header("Location: index.php");
        exit;

    } catch (PDOException $e) {
        die("Error al insertar: " . $e->getMessage());
    }

}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Película</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="mb-4">Nueva Película</h1>
                
                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label">Título:</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Precio renta:</label>
                        <input type="number" step="0.01" name="rental_rate" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-success">Guardar</button>
                    <a href="index.php" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
