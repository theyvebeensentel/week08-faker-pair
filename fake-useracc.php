<?php
require 'vendor/autoload.php';

use Faker\Factory;

function generateUUID() {
    return sprintf(
        '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        mt_rand(0, 0xffff), mt_rand(0, 0xffff),
        mt_rand(0, 0xffff),
        mt_rand(0, 0x0fff) | 0x4000,
        mt_rand(0, 0x3fff) | 0x8000,
        mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
    );
}

function generateFakeUsers($count = 10) {
    $faker = Factory::create();
    $users = [];

    for ($i = 0; $i < $count; $i++) {
        $email = $faker->unique()->email;
        $username = explode('@', $email)[0];

        $users[] = [
            'user_id' => generateUUID(),
            'full_name' => $faker->name,
            'email' => $email,
            'username' => strtolower($username),
            'password' => password_hash($faker->password, PASSWORD_BCRYPT),
            'account_created' => $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d H:i:s')
        ];
    }

    return $users;
}

$users = generateFakeUsers();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fake User Accounts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        td {
            word-break: break-word;
        }
        .table-responsive {
            overflow-x: auto;
        }
    </style>
</head>
<body class="container mt-5">
    <h2 class="mb-4 text-center">Fake User Accounts</h2>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>User ID</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Password (Hashed)</th>
                    <th>Account Created</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $index => $user) : ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= htmlspecialchars($user['user_id'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars($user['full_name'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars($user['password'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars($user['account_created'], ENT_QUOTES, 'UTF-8') ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
