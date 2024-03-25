<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zippy Used Autos</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <header>
        <h1>Zippy Used Autos</h1>
    </header>
    <main>
        <section>
            <h2>Inventory</h2>
            <?php
            // Include necessary PHP files
            require_once('model/database.php');
            require_once('model/vehicles_db.php');

            // Retrieve inventory data
            $inventory = get_vehicles_ordered_by_price(); // Implement this function to fetch inventory ordered by price

            // Check for sort order selection
            $sort_order = isset($_GET['sort']) ? $_GET['sort'] : 'price';

            // Check for make, type, or class filter selection
            $filter = isset($_GET['filter']) ? $_GET['filter'] : '';

            // Apply filters
            if (!empty($filter)) {
                $inventory = filter_inventory($inventory, $filter); // Implement this function to filter inventory by make, type, or class
            }

            // Apply sort order
            if ($sort_order === 'year') {
                usort($inventory, function ($a, $b) {
                    return $b['year'] - $a['year'];
                });
            } else {
                // Default to price
                usort($inventory, function ($a, $b) {
                    return $b['price'] - $a['price'];
                });
            }

            // Display inventory
            foreach ($inventory as $vehicle) {
                // Display vehicle details
                echo $vehicle['make'] . ' ' . $vehicle['model'] . ' ' . $vehicle['year'] . ' - $' . $vehicle['price'] . '<br>';
            }
            ?>
            <!-- Sort order and filter form -->
            <form action="" method="get">
                <label for="sort">Sort by:</label>
                <select name="sort" id="sort">
                    <option value="price" <?php echo ($sort_order === 'price') ? 'selected' : ''; ?>>Price</option>
                    <option value="year" <?php echo ($sort_order === 'year') ? 'selected' : ''; ?>>Year</option>
                </select>

                <label for="filter">Filter by:</label>
                <select name="filter" id="filter">
                    <option value="">All</option>
                    <!-- Fetch and populate makes from the database -->
                    <?php
                    $makes = get_makes(); // Implement this function to fetch makes from the database
                    foreach ($makes as $make) {
                        echo "<option value='{$make['makeID']}'>{$make['makeName']}</option>";
                    }
                    ?>
                </select>

                <button type="submit">Apply</button>
            </form>
        </section>
    </main>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Zippy Used Autos. All rights reserved.</p>
    </footer>
</body>
</html>
