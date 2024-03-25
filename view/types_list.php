<?php 
include('view/header.php'); // Include the header part of the HTML page
?>

<!-- Display Types -->
<?php if (!empty($types)) : ?> <!-- Check if there are any types to display -->
    <section id="list" class="list">
        <header>
            <h1>Vehicle Types List</h1>
        </header>
        <!-- Loop through the types and display each one -->
        <?php foreach ($types as $type) : ?>
            <div class="list__row">
                <div class="list__item">
                    <!-- Display the type name -->
                    <p class="bold"><?= htmlspecialchars($type['typeName']) ?></p>
                </div>
                <div class="list__removed">
                    <!-- Form to delete the type -->
                    <form action="." method="post">
                        <input type="hidden" name="action" value="remove_type">
                        <input type="hidden" name="type_id" value="<?= $type['typeID'] ?>">
                        <button class="remove-button">X</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </section>
<?php else : ?>
    <!-- Display a message if no types exist -->
    <p>No vehicle types exist yet.</p>
<?php endif; ?>

<!-- Add Vehicle Type Form -->
<section>
    <h2>Add Vehicle Type</h2>
    <!-- Form for Adding a New Vehicle Type -->
    <form action="type.php" method="post" id="add__form" class="add__form">
        <!-- Input field for the vehicle type name -->
        <input type="hidden" name="action" value="add_type">
        <div class="add__inputs">
            <label>Name:</label>
            <input type="text" name="type_name" maxlength="20" placeholder="Name" autofocus required>
        </div>
        <div class="add__addItem">
            <!-- Button to submit the form and add a new type -->
            <button class="add-button bold">Add</button>
        </div>
    </form>
</section>

<?php 
include('view/footer.php'); // Include the footer part of the HTML page
?>
