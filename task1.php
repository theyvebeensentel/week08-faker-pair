<?php
require 'vendor/autoload.php';

$faker = Faker\Factory::create('en_PH'); // Localized for the Philippines

// Filipino first, middle, and last names
$filipinoFirstNames = ['Juan', 'Maria', 'Jose', 'Andres', 'Gabriela', 'Emilio', 'Rizal', 'Antonio', 'Isabel', 'Fernando'];
$filipinoMiddleInitials = ['A.', 'B.', 'C.', 'D.', 'E.', 'F.', 'G.', 'H.', 'I.', 'J.'];
$filipinoLastNames = ['Dela Cruz', 'Reyes', 'Santos', 'Garcia', 'Mendoza', 'Torres', 'Ramos', 'Bautista', 'Gonzales', 'Villanueva'];

// Common Philippine locations
$locations = [
    ['province' => 'Metro Manila', 'city' => 'Quezon City', 'barangay' => 'Diliman'],
    ['province' => 'Cebu', 'city' => 'Cebu City', 'barangay' => 'Mabolo'],
    ['province' => 'Davao del Sur', 'city' => 'Davao City', 'barangay' => 'Buhangin'],
    ['province' => 'Pampanga', 'city' => 'San Fernando', 'barangay' => 'Baliti'],
    ['province' => 'Iloilo', 'city' => 'Iloilo City', 'barangay' => 'Jaro']
];

// More Filipino-style job titles
$filipinoJobs = [
    'Call Center Agent', 'Software Developer', 'Nurse', 'Teacher', 'Police Officer',
    'Civil Engineer', 'Marketing Specialist', 'Bank Teller', 'Business Analyst', 'Hotel Manager'
];

// Generate 5 realistic Filipino profiles
$users = [];
for ($i = 0; $i < 5; $i++) {
    $firstName = $filipinoFirstNames[array_rand($filipinoFirstNames)];
    $middleInitial = $filipinoMiddleInitials[array_rand($filipinoMiddleInitials)];
    $lastName = $filipinoLastNames[array_rand($filipinoLastNames)];
    $fullName = "$firstName $middleInitial $lastName";

    // Generate a more natural email format
    $email = strtolower(str_replace(' ', '', "$firstName.$lastName")) . rand(1, 99) . '@gmail.com';

    // More realistic PH phone number
    $phone = '+63 ' . rand(900, 999) . ' ' . rand(100, 999) . ' ' . rand(1000, 9999);

    // Select a random location
    $location = $locations[array_rand($locations)];
    $address = $faker->streetName . ', Barangay ' . $location['barangay'] . ', ' . $location['city'] . ', ' . $location['province'];

    // Birthdate for ages between 21-45
    $birthdate = $faker->date('Y-m-d', '-' . rand(21, 45) . ' years');

    // Select a Filipino-style job title
    $jobTitle = $filipinoJobs[array_rand($filipinoJobs)];

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
    <title>Fake Filipino User Profiles</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            margin-top: 20px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #007BFF;
            color: white;
            text-transform: uppercase;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #e0e0e0;
        }
    </style>
</head>
<body>
    <h2>Fake Filipino User Profiles</h2>
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
