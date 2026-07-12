<div class="container mt-5">
    <div class="card shadow mx-auto" style="max-width: 600px;">
        <div class="card-body">

            <h2 class="text-center mb-4">Editar Usuário</h2>

            <form action="./edit-user" method="POST">

                <input type="hidden" name="id" value="<?= $user['id']; ?>">

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input 
                        type="email" 
                        class="form-control" 
                        id="email" 
                        name="email"
                        value="<?= htmlspecialchars($user['email']); ?>"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Nova senha</label>
                    <input 
                        type="password" 
                        class="form-control" 
                        id="password" 
                        name="password"
                        placeholder="Digite uma nova senha"
                    >
                </div>

                <div class="d-flex justify-content-between">
                    <a href="./users" class="btn btn-secondary">
                        Voltar
                    </a>

                    <button type="submit" class="btn btn-primary">
                        Salvar alterações
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>