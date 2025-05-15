<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<table class="table table-bordered table-striped bg-white shadow">
    <thead class="table-dark">
        <tr>
            <th>Book ID</th>
            <th>Book Title</th>
            <th>Author Name</th>
            <th>Book Cover</th>
            <th>Genre</th>
            <th>Publication_Year</th>
            <th>Quantity</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['book_id'] ?></td>
                <td><?= $row['book_title'] ?></td>
                <td><?= $row['author_name'] ?></td>
                <td><?= $row['book_cover'] ?></td>
                <td><?= $row['genre'] ?></td>
                <td><?= $row['publication_year'] ?></td>
                <td><?= $row['quantity'] ?></td>
                <td></td>
               
                <td>
                    <a href="?edit=<?= $row['book_id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="?delete=<?= $row['book_id'] ?>" onclick="return confirm('Delete this book?')"
                        class="btn btn-sm btn-danger">Delete</a>
                    <a href="?view=<?= $row['book_id'] ?>" class="btn btn-sm btn-info">View</a>
                </td>

            </tr>
        <?php endwhile; ?>
    </tbody>
</table>