<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

$country = isset($_GET['country']) ? $_GET['country'] : '';
$lookup = isset($_GET['lookup']) ? $_GET['lookup'] : '';

// cities lookup
if ($lookup === 'cities') {
    // SQL Join between cities and countries tables
    if (!empty($country)) {
        $stmt = $conn->query("SELECT cities.name, cities.district, cities.population FROM cities JOIN countries ON cities.country_code = countries.code WHERE countries.name LIKE '%$country%'");
    } else {
        $stmt = $conn->query("SELECT name, district, population FROM cities");
    }
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <table>
      <thead>
        <tr>
          <th>Name</th>
          <th>District</th>
          <th>Population</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($results as $row): ?>
          <tr>
            <td><?= htmlspecialchars($row['name']); ?></td>
            <td><?= htmlspecialchars($row['district']); ?></td>
            <td><?= htmlspecialchars($row['population']); ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <?php
} else {
    // countries lookup
    if (!empty($country)) {
        $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
    } else {
        $stmt = $conn->query("SELECT * FROM countries");
    }
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <table>
      <thead>
        <tr>
          <th>Name</th>
          <th>Continent</th>
          <th>Independence</th>
          <th>Head of State</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($results as $row): ?>
          <tr>
            <td><?= htmlspecialchars($row['name']); ?></td>
            <td><?= htmlspecialchars($row['continent']); ?></td>
            <td><?= htmlspecialchars($row['independence_year']); ?></td>
            <td><?= htmlspecialchars($row['head_of_state']); ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <?php
}
?>
