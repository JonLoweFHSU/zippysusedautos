<?php 
include('view/header.php'); // Include the header part of the HTML page
?>

<!-- Display Makes -->
<?php if (!empty($makes)) : ?> <!-- Check if there are any makes to display -->
    <section id="list" class="list">
        <header>
            <h1>Vehicle Makes List</h1>
        </header>
        <!-- Loop through the makes and display each one -->
        <?php foreach ($makes as $make) : ?>
            <div class="list__row">
                <div class="list__item">
                    <!-- Display the make name -->
                    <p class="bold"><?= htmlspecialchars($make['makeName']) ?></p>
                </div>
                <div class="list__removed">
                    <!-- Form to delete the make -->
                    <form action="." method="post">
                        <input type="hidden" name="action" value="remove_make">
                        <input type="hidden" name="make_id" value="<?= $make['makeID'] ?>">
                        <button class="remove-button">X</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </section>
<?php else : ?>
    <!-- Display a message if no makes exist -->
    <p>No vehicle makes exist yet.</p>
<?php endif; ?>

<!-- Add Vehicle Make Form -->
<section>
    <h2>Add Vehicle Make</h2>
    <!-- Form for Adding a New Vehicle Make -->
    <form action="." method="post" id="add__form" class="add__form">
        <!-- Input field for the vehicle make name -->
        <input type="hidden" name="action" value="add_make">
        <div class="add__inputs">
            <label>Name:</label>
            <input type="text" name="make_name" maxlength="20" placeholder="Name" autofocus required>
        </div>
        <div class="add__addItem">
            <!-- Button to submit the form and add a new make -->
            <button class="add-button bold">Add</button>
        </div>
    </form>
</section>

<?php 
include('view/footer.php'); // Include the footer part of the HTML page
?>
