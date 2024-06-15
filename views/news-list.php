<?php

require_once __DIR__ . '/inicio-html.php';

use Seminario\Mvc\Entity\News;

/** @var News[] $newsList */
?>

<body class="login-page sidebar-collapse">
  <div class="page-header clear-filter" filter-color="orange">
    <main class="container mt-5">
      <div class="card card-body text-black">
        <h2 class="title text-center">Lista de Notícias</h2>
        <input type="hidden" name="operation" id="operation" value="news-list">
        <p class="card-category text-center">Aqui estão as notícias mais recentes</p>
        <div class="table-responsive">
          <table class="table">
            <thead class="text-primary">
              <tr>
                <th>Título</th>
                <th>Conteúdo</th>
                <th>Autor</th>
                <th>Data</th>
                <th>Categoria</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($newsList as $news): ?>
                <tr>
                  <td><?= htmlspecialchars($news->getTitle(), ENT_QUOTES, 'UTF-8'); ?></td>
                  <td><?= htmlspecialchars($news->getContent(), ENT_QUOTES, 'UTF-8'); ?></td>
                  <td><?= htmlspecialchars($news->getAuthor(), ENT_QUOTES, 'UTF-8'); ?></td>
                  <td><?= htmlspecialchars($news->getDate(), ENT_QUOTES, 'UTF-8'); ?></td>
                  <td><?= htmlspecialchars($news->getCategory(), ENT_QUOTES, 'UTF-8'); ?></td>
                  <td>
                    <a href="/editar-noticia?id=<?= $news->getId(); ?>" class="btn btn-info btn-round btn-sm">Editar</a>
                    <a href="/remover-noticia?id=<?= $news->getId(); ?>" class="btn btn-danger btn-round btn-sm">Excluir</a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </main>
  </div>

<?php require_once __DIR__ . '/fim-html.php'; ?>
