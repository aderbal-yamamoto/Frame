

<div class="container mt-5">

    <h2 class="text-center mb-4">Lista de Vídeos</h2>

    <div class="row justify-content-center g-4">

        <?php foreach($videos as $video): ?>

        <div class="col-sm-12 col-md-6 col-lg-4">

            <div class="card shadow-sm border-0 rounded-4 overflow-hidden">

                <?php if($video->getFilePath() !== null): ?>

                    <img 
                        src="img/uploads/<?= $video->getFilePath(); ?>" 
                        class="w-100"
                        style="height: 200px; object-fit: cover;"
                        alt="<?= htmlspecialchars($video->title); ?>"
                    >

                <?php else: ?>

                    <div class="ratio ratio-16x9">
                        <iframe
                            src="<?= $video->url; ?>"
                            title="<?= htmlspecialchars($video->title); ?>"
                            frameborder="0"
                            allowfullscreen>
                        </iframe>
                    </div>

                <?php endif; ?>


                <div class="card-body">

                    <h5 class="card-title text-center">
                        <?= htmlspecialchars($video->title); ?>
                    </h5>


                    <div class="d-flex justify-content-center gap-2 mt-3">

                        <a href="./editar-video?id=<?= $video->id; ?>" 
                           class="btn btn-warning btn-sm">
                            Editar
                        </a>

                        <a href="./remover-capa?id=<?= $video->id; ?>" 
                           class="btn btn-secondary btn-sm">
                            Capa
                        </a>

                        <a href="./remover-video?id=<?= $video->id; ?>" 
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Deseja excluir este vídeo?')">
                            Excluir
                        </a>

                    </div>

                </div>

            </div>

        </div>

        <?php endforeach; ?>

    </div>

</div>