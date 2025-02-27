<?php
require 'vendor/autoload.php';

$faker = Faker\Factory::create('en_PH'); // Localized for the Philippines

// Array of common Filipino first and last names
$filipinoFirstNames = ['Juan', 'Maria', 'Jose', 'Andres', 'Gabriela', 'Emilio', 'Rizal', 'Antonio', 'Isabel', 'Fernando'];
$filipinoLastNames = ['Dela Cruz', 'Reyes', 'Santos', 'Garcia', 'Mendoza', 'Torres', 'Ramos', 'Bautista', 'Gonzales', 'Villanueva'];

// Array of common provinces and cities in the Philippines
$locations = [
    ['province' => 'Metro Manila', 'city' => 'Quezon City'],
    ['province' => 'Cebu', 'city' => 'Cebu City'],
    ['province' => 'Davao del Sur', 'city' => 'Davao City'],
    ['province' => 'Pampanga', 'city' => 'San Fernando'],
    ['province' => 'Iloilo', 'city' => 'Iloilo City']
];

// Generate 5 fake user profiles
$users = [];
for ($i = 0; $i < 5; $i++) {
    $firstName = $filipinoFirstNames[array_rand($filipinoFirstNames)];
    $lastName = $filipinoLastNames[array_rand($filipinoLastNames)];
    $fullName = $firstName . ' ' . $lastName;
    $email = strtolower(str_replace(' ', '', $fullName)) . rand(1, 99) . '@example.com';
    $phone = '+63' . rand(900, 999) . '-' . rand(100, 999) . '-' . rand(1000, 9999);
    
    $location = $locations[array_rand($locations)];
    $address = $faker->streetAddress . ', ' . $location['city'] . ', ' . $location['province'];

    $birthdate = $faker->date('Y-m-d', '-18 years'); // Ensuring the user is at least 18 years old
    $jobTitle = $faker->jobTitle;

    $users[] = [
        'Full Name' => $fullName,
        'Email' => $email,
        'Phone' => $phone,
        'Address' => $address,
        'Birthdate' => $birthdate,
        'Job Title' => $jobTitle
    ];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fake User Profiles (Philippines)</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>
    <h2>Fake User Profiles (Philippines)</h2>
    <table>
        <tr>
            <th>Full Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Birthdate</th>
            <th>Job Title</th>
        </tr>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?php echo htmlspecialchars($user['Full Name']); ?></td>
            <td><?php echo htmlspecialchars($user['Email']); ?></td>
            <td><?php echo htmlspecialchars($user['Phone']); ?></td>
            <td><?php echo htmlspecialchars($user['Address']); ?></td>
            <td><?php echo htmlspecialchars($user['Birthdate']); ?></td>
            <td><?php echo htmlspecialchars($user['Job Title']); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
