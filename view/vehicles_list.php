<?php
// view/vehicles_list.php
include('view/header.php'); // Include the header 
?>

<!-- Display Vehicles List -->
<section>
    <h1>Vehicles List</h1>

    <!-- Check if there are vehicles to display -->
    <?php if (!empty($vehicles)) : ?>
        <!-- Loop through each vehicle and display it -->
        <ul>
            <?php foreach ($vehicles as $vehicle) : ?>
                <li><?= htmlspecialchars($vehicle['year']) ?> <?= htmlspecialchars($vehicle['makeName']) ?> <?= htmlspecialchars($vehicle['modelName']) ?> - $<?= htmlspecialchars($vehicle['price']) ?>
                    <!-- Form to delete the vehicle -->
                    <form action="." method="post">
                        <input type="hidden" name="action" value="delete_vehicle">
                        <input type="hidden" name="vehicle_id" value="<?= $vehicle['vehicleID'] ?>">
                        <button type="submit" class="remove-button">X</button>
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else : ?>
        <!-- Message displayed if no vehicles exist -->
        <p>No vehicles exist yet.</p>
    <?php endif; ?>
</section>

<!-- Add Vehicle Form -->
<section>
    <h2>Add Vehicle</h2>
    <!-- Form for Adding a New Vehicle -->
    <form action="." method="post">
        <!-- Dropdown for selecting the make -->
        <select name="make_id" required>
            <option value="">Select Make</option>
            <?php foreach ($makes as $make) : ?>
                <option value="<?= $make['makeID'] ?>"><?= htmlspecialchars($make['makeName']) ?></option>
            <?php endforeach; ?>
        </select>
        <!-- Dropdown for selecting the type -->
        <select name="type_id" required>
            <option value="">Select Type</option>
            <?php foreach ($types as $type) : ?>
                <option value="<?= $type['typeID'] ?>"><?= htmlspecialchars($type['typeName']) ?></option>
            <?php endforeach; ?>
        </select>
        <!-- Dropdown for selecting the class -->
        <select name="class_id" required>
            <option value="">Select Class</option>
            <?php foreach ($classes as $class) : ?>
                <option value="<?= $class['classID'] ?>"><?= htmlspecialchars($class['className']) ?></option>
            <?php endforeach; ?>
        </select>
        <!-- Input field for the vehicle year -->
        <input type="number" name="year" placeholder="Year" min="1900" max="2099" required>
        <!-- Input field for the vehicle model -->
        <input type="text" name="model" placeholder="Model" required>
        <!-- Input field for the vehicle price -->
        <input type="number" name="price" placeholder="Price" min="0" required>
        <button type="submit" name="action" value="add_vehicle" class="add-button bold">Add</button> <!-- Submit button for adding the vehicle -->
    </form>
</section>

<?php 
include('view/footer.php'); // Include the footer 
?>
