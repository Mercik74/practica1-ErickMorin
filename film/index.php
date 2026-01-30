<?php
require "../auth/auth.php";
require "../config/db.php";

$stmt = $pdo->query("SELECT film_id, title, release_year, rental_rate FROM film LIMIT 50");
$films = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Películas - Sakila</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <span class="me-3">
                    👤 <?= $_SESSION['username'] ?>
                </span>
                <a href="../auth/logout.php" class="btn btn-danger btn-sm">
                    Logout
                </a>
            </div>
            <h1>Películas (Sakila)</h1>
            <a href="create.php" class="btn btn-primary">➕ Nueva película</a>
        </div>

        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Año</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($films as $film): ?>
                <tr>
                    <td><?= $film['film_id'] ?></td>
                    <td><?= $film['title'] ?></td>
                    <td><?= $film['release_year'] ?></td>
                    <td>$<?= $film['rental_rate'] ?></td>
                    <td>
                        <a href="edit.php?id=<?= $film['film_id'] ?>" class="btn btn-sm btn-warning">✏️</a>
                        <a href="delete.php?id=<?= $film['film_id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro?')">🗑️</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
