<?php
require_once __DIR__ . '/inicio-html.php';

use Seminario\Mvc\Entity\News;

/** @var News|null $news */
?>

<body class="login-page sidebar-collapse">
    <div class="page-header clear-filter" filter-color="orange">
        <main class="container mt-5">
            <div class="card card-body text-black">
                <form class="form" method="post" novalidate>
                    <input type="hidden" name="operation" id="operation" value="<?= $_SESSION["operation"] ?>">
                    <h2 class="title text-center" id="titleNews"></h2>
                    <div class="form-group">
                        <label for="title" class="form-label">Título</label>
                        <input type="text" name="title" value="<?= $news?->getTitle() ?? ''; ?>" class="form-control" required placeholder="Digite o título" id="title">
                        <div class="invalid-feedback">
                            Por favor, insira um título.
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="content" class="form-label">Conteúdo</label>
                        <textarea name="content" class="form-control" required placeholder="Digite o conteúdo" id="content"><?= $news?->getContent() ?? ''; ?></textarea>
                        <div class="invalid-feedback">
                            Por favor, insira o conteúdo.
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="author" class="form-label">Autor</label>
                        <input type="text" name="author" value="<?= $news?->getAuthor() ?? ''; ?>" class="form-control" required placeholder="Digite o autor" id="author">
                        <div class="invalid-feedback">
                            Por favor, insira o autor.
                        </div>
                        <div class="form-group">
                            <label for="category" class="form-label">Categoria</label>
                            <select name="category" id="category" class="form-control" required>
                                <option value="">Selecione uma categoria</option>
                                <option value="politica" <?= isset($news) && $news->getCategory() === 'politica' ? 'selected' : ''; ?>>Política</option>
                                <option value="esportes" <?= isset($news) && $news->getCategory() === 'esportes' ? 'selected' : ''; ?>>Esportes</option>
                                <option value="tecnologia" <?= isset($news) && $news->getCategory() === 'tecnologia' ? 'selected' : ''; ?>>Tecnologia</option>
                                <option value="entretenimento" <?= isset($news) && $news->getCategory() === 'entretenimento' ? 'selected' : ''; ?>>Entretenimento</option>
                                <option value="Saude" <?= isset($news) && $news->getCategory() === 'saude' ? 'selected' : ''; ?>>Saúde</option>
                                <option value="viagem" <?= isset($news) && $news->getCategory() === 'viagem' ? 'selected' : ''; ?>>Viagens</option>
                            </select>
                            <div class="invalid-feedback">
                                Por favor, selecione uma categoria.alte
                            </div>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary btn-round">Enviar</button>
                </form>
            </div>
        </main>
    </div>

    <?php

    require_once __DIR__ . '/fim-html.php';
