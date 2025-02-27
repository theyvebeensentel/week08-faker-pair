<?php

require 'vendor/autoload.php';

use Faker\Factory;

function generateFakeBooks($count = 15) {
  $faker = Factory::create();
  $genres = ['Fiction', 'Mystery', 'Science Fiction', 'Fantasy', 'Romance', 'Thriller', 'Historical', 'Horror'];
  $books = [];

  for ($i=0; $i < $count; $i++) { 
    $books[] = [
      "title" => ucwords($faker -> sentence(rand(2,5), true)),
      "author" => $faker -> name,
      "genre" => $faker -> randomElement($genres),
      "publication-year" => $faker->numberBetween(1900, date('Y')),
      "isbn" => $faker -> isbn13,
      "summary" => $faker -> paragraph
    ];
  }

  return $books;

}

$books = generateFakeBooks();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Book Table</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2 class="mb-4 text-center">Fake Book Lists</h2>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th></th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Genre</th>
                    <th>Publication Year</th>
                    <th>ISBN</th>
                    <th>Summary</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($books as $index => $book) : ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= htmlspecialchars($book['title'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars($book['author'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars($book['genre'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars($book['publication-year'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars($book['isbn'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars($book['summary'], ENT_QUOTES, 'UTF-8') ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>