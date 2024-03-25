<?php 
include('view/header.php'); // Include the header part of the HTML page
?>

<!-- Display Classes -->
<?php if (!empty($classes)) : ?> <!-- Check if there are any classes to display -->
    <section id="list" class="list">
        <header>
            <h1>Vehicle Classes List</h1>
        </header>
        <!-- Loop through the classes and display each one -->
        <?php foreach ($classes as $class) : ?>
            <div class="list__row">
                <div class="list__item">
                    <!-- Display the class name -->
                    <p class="bold"><?= htmlspecialchars($class['className']) ?></p>
                </div>
                <div class="list__removed">
                    <!-- Form to delete the class -->
                    <form action="." method="post">
                        <input type="hidden" name="action" value="remove_class">
                        <input type="hidden" name="class_id" value="<?= $class['classID'] ?>">
                        <button class="remove-button">X</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </section>
<?php else : ?>
    <!-- Display a message if no classes exist -->
    <p>No vehicle classes exist yet.</p>
<?php endif; ?>

<!-- Add Vehicle Class Form -->
<section>
    <h2>Add Vehicle Class</h2>
    <!-- Form for Adding a New Vehicle Class -->
    <form action="." method="post" id="add__form" class="add__form">
        <!-- Input field for the vehicle class name -->
        <input type="hidden" name="action" value="add_class">
        <div class="add__inputs">
            <label>Name:</label>
            <input type="text" name="class_name" maxlength="20" placeholder="Class Name" autofocus required>
        </div>
        <div class="add__addItem">
            <!-- Button to submit the form and add a new class -->
            <button class="add-button bold">Add</button>
        </div>
    </form>
</section>

<?php 
include('view/footer.php'); // Include the footer part of the HTML page
?>
