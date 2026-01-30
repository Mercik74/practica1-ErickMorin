<?php
require "../auth/auth.php";
require "../config/db.php";

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM film WHERE film_id = ?");
$stmt->execute([$id]);
$film = $stmt->fetch();

if ($_POST) {
    $sql = "UPDATE film SET title = ?, rental_rate = ? WHERE film_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $_POST['title'],
        $_POST['rental_rate'],
        $id
    ]);

    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Película</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="mb-4">Editar Película</h1>
                
                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label">Título:</label>
                        <input type="text" name="title" class="form-control" value="<?= $film['title'] ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Precio renta:</label>
                        <input type="number" step="0.01" name="rental_rate" class="form-control" value="<?= $film['rental_rate'] ?>" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <a href="index.php" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
