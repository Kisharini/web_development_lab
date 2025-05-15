<?php include 'views/header.php'; ?>

<?php if (!$viewBook): ?>
  <div class="alert alert-danger">Book not found.</div>
<?php else: ?>
  <div class="card shadow p-4">
    <h4 class="mb-3">Book Details</h4>
    <ul class="list-group">
      <li class="list-group-item"><strong>ID:</strong> <?= $viewBook['book_id'] ?></li>
      <li class="list-group-item"><strong>Title:</strong> <?= $viewBook['book_title'] ?></li>
      <li class="list-group-item"><strong>Author:</strong> <?= $viewBook['author_name'] ?></li>
      <li class="list-group-item"><strong>Genre:</strong> <?= $viewBook['genre'] ?></li>
      <li class="list-group-item"><strong>Cover:</strong> <?= $viewBook['book_cover'] ?></li>
      <li class="list-group-item"><strong>Publication Year:</strong> <?= $viewBook['publication_year'] ?></li>
      <li class="list-group-item"><strong>Quantity:</strong> <?= $viewBook['quantity'] ?></li>
    </ul>
    <a href="index.php" class="btn btn-primary mt-3">Back to List</a>
  </div>
<?php endif; ?>
