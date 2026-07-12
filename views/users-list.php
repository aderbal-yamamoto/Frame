<?php
session_start();

if (isset($_SESSION['flash'])):
?>

<div class="alert alert-<?= $_SESSION['flash']['type'] ?>">
    <?= $_SESSION['flash']['message'] ?>
</div>

<?php
unset($_SESSION['flash']);
endif;
?>
<div class="container mt-5">
    <div class="card shadow mx-auto" style="max-width: 900px;">
        <div class="card-body">

            <h2 class="text-center mb-4">Lista de Usuários</h2>

            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Email</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $usuario): ?>
                    <tr>
                        <td><?= $usuario->id; ?></td>
                        <td><?= htmlspecialchars($usuario->email); ?></td>
                        <td>
                            <a href="./edit-user?id=<?= $usuario->id; ?>" class="btn btn-warning btn-sm">Editar</a>
                            <a href="./excluir-usuario?id=<?= $usuario->id; ?>" class="btn btn-danger btn-sm">Excluir</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>