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
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-body p-4">

                        <h2 class="text-center text-primary mb-4">
                            🔐 Login
                        </h2>

                        <form action="" method="POST">

                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail</label>
                                <input
                                    type="email"
                                    class="form-control"
                                    id="email"
                                    name="email"
                                    placeholder="Digite seu e-mail"
                                    required
                                >
                            </div>

                            <div class="mb-4">
                                <label for="password" class="form-label">Senha</label>
                                <input
                                    type="password"
                                    class="form-control"
                                    id="password"
                                    name="password"
                                    placeholder="Digite sua senha"
                                    required
                                >
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    Entrar
                                </button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
</body>