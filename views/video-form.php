
<body>
   <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-body p-4">

                        <h2 class="text-center text-primary mb-4">
                            📹 Cadastro de Vídeo
                        </h2>

                        <form action="" method="POST">

                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome do vídeo</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="nome"
                                    name="nome"
                                    placeholder="Digite o nome do vídeo"
                                >
                            </div>

                            <div class="mb-4">
                                <label for="url" class="form-label">URL do vídeo</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="url"
                                    name="url"
                                    placeholder="https://..."
                                >
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    Salvar Vídeo
                                </button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>