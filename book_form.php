<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<form method="POST" enctype="multipart/form-data" class="mb-4 p-3 bg-white rounded shadow">
    <h5><?= $editData ? 'Edit' : 'Add' ?> Book</h5>
    <input type="hidden" name="id" value="<?= $editData['book_id'] ?? '' ?>">

    <div class="row g-2">
        <div class="col-md-3"><input type="text" name="book_title" class="form-control" placeholder="Book Title"
                required value="<?= $editData['book_title'] ?? '' ?>"></div>
        <div class="col-md-3"><input type="text" name="author_name" class="form-control" placeholder="Author Name" required
                value="<?= $editData['author_name'] ?? '' ?>"></div>
        <div class="col-md-3"><input type="file" name="book_cover" class="form-control" <?= $editData ? '' : 'required' ?>>
             <?php if ($editData): ?>
              <p>Current cover: <?= $editData['book_cover'] ?></p>
              <?php else: ?>
              <p>Choose book's cover image</p>
            <?php endif; ?>
       </div>
        <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" id="genreDropDown" aria-expanded="false"><?= $editData['genre'] ?? "Choose book's genre"?></button>
        <ul class="dropdown-menu" aria-labelledby="genreDropDown">
           <?php
             $genres = ['Romance', 'Thriller', 'Action', 'Comedy', 'Horror'];
             foreach ($genres as $genre) {
             echo "<li><a class='dropdown-item' data-value='$genre'>$genre</a></li>";
              }
        ?>
        </ul>
      </div>

       <input type="hidden" name="genre" id="selectedGenre" value="<?= $editData['genre'] ?? '' ?>">
        <div class="col-md-2"><input type="date" name="publication_year" class="form-control" required
                value="<?= $editData['publication_year'] ?? '' ?>"><?= "Choose book's publication year"?></div>
        <div class="col-md-3"><input type="number" name="quantity" class="form-control" placeholder="Quantity" required
                value="<?= $editData['quantity'] ?? '' ?>"></div>

    </div>

    <div class="mt-4">
        <button type="submit" name="save" class="btn btn-success "><?= $editData ? 'Update' : 'Save' ?></button>
        <?php if ($editData): ?>
            <a href="index.php" class="btn btn-secondary">Cancel</a>
        <?php endif; ?>
    </div>
</form>

<script>
    document.querySelectorAll('.dropdown-item').forEach(item => {
        item.addEventListener('click', function(e) {
            e.preventDefault();

            const value = this.getAttribute('data-value');

            document.getElementById('genreDropDown').innerText = value;

            document.getElementById('selectedGenre').value = value;
        })
    })
</script>