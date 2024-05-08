<?php 
include('view/header.php'); 
?>

<script>
  // Select the form and the submit button
  const form = document.getElementById('Add_itemForm');
  const submitButton = document.getElementById('submitButton');

  // Add an event listener to the button
  submitButton.addEventListener('click', function(event) {
    // Prevent the default form submission behavior
    event.preventDefault();

    // Submit the form programmatically
    form.submit();
  });
</script>

<!-- DISPLAY VEHICLES -->
   
    <!-- FILIER VEHICLES BY MAKE-->

   
     <!-- --------------------------------------- VEHICLE LIST -->

     <section>

    <div id="list-wrapper">

    <?php if (!empty($vehicles)) : ?>

        <div id="list-items-wrap">

         <!-- BEGIN FOR EACH -->
        <?php foreach ($vehicles as $vehicle) : ?>

            <ul class="flg-flex" style="border-bottom: 1px solid gray;">

            <li class="item-4">

            <span class="title"><?php echo htmlspecialchars($vehicle['Make']) ?></span>

            <span class="title"><?php echo htmlspecialchars($vehicle['model']) ?></span>

            <p class="desc">Type: <?php echo htmlspecialchars($vehicle['Type']) ?></p>

            <span class="desc">Year: <span class="delete"><?php echo htmlspecialchars($vehicle['year']) ?></span></span>

            <span class="desc">Class: <?php echo htmlspecialchars($vehicle['Class']) ?></span>

            <p class="desc">Price: $<?php echo htmlspecialchars(number_format($vehicle['price'], 2)) ?></p>

                

             </li>

                  <!-- DELETE BUTTON-->
            <li class="item-3">
                <form action="." method="post">
                    <input type="hidden" name="action" value="delete_vehicle">
                    <input type="hidden" name="vehicle_id" value="<?php echo $vehicle['vehicle_id'] ?>">

                    <button type="submit" class="delete"><span class="material-symbols-outlined">delete</span></button>
                </form>

        </li>
          

        </ul>
        <?php endforeach; ?>
    <?php else : ?>
        
         <!-- IF NO VEHICLE MAKE-->

        <p>No vehicles exist<?php echo $make_id ? ' for this make' : '' ?>.</p>
    <?php endif; ?>

    </div>

    </div>

</section>



<section>

    <!---------------------------------------------------------------------------------------------------------- ADD VEHICLE -->

    <form id="Add_itemForm" action="." method="post">

    <ul class="flg-flex-2" style="border: none; margin-top:25px; padding-top: 0 !important;">

    <li class="">

     <ul class="flg-flex-3">

     <li>

      <!----------------------------------------------------------- MAKE -->

      <select  class="add_input" name="make_id" required>

        <option value="">Make</option>

        <!-- BEGIN FOR EACH -->
        <?php foreach ($makes as $make) : ?>
        
            <option value="<?php echo $make['make_id'] ?>">
                <?php echo htmlspecialchars($make['Make']); ?>
            </option>

        <?php endforeach; ?>
        </select>

         <!--------------------------------------------------------- CLASS -->

         <select  class="add_input" name="class_id" required>

            <option value="">Class</option>

            <!-- BEGIN FOR EACH -->
            <?php foreach ($classes as $class) : ?>

                <option value="<?php echo $class['class_id'] ?>">
                    <?php echo htmlspecialchars($class['Class']); ?>
                </option>

            <?php endforeach; ?>
            </select>
          

              <!--------------------------------------------------------- TYPES -->

              <select  class="add_input" name="type_id" required>

                <option value="">Type</option>

                <!-- BEGIN FOR EACH -->
                <?php foreach ($types as $type) : ?>
                
                    <option value="<?php echo $type['type_id'] ?>">
                        <?php echo htmlspecialchars($type['Type']); ?>
                    </option>

                <?php endforeach; ?>
                </select>

        </li>
        <li>
    
        <input class="add_input-2" type="text" name="model" maxlength="30" placeholder="Model" required>
   
        <input class="add_input-2" type="text" name="price" maxlength="50" placeholder="Price" required>

        <input class="add_input-2" type="text" name="year" maxlength="4" placeholder="Year" required>

        </li>

        </ul>
        
        </li>

        </form>

        <li>

        <ul class="footer-right">

            <li>

         

            </li>

                    <!------------------------------------------- MAKES -->

                <li>

                <form action="." method="get">

                <button class="header-input button-W" type="submit" style="color: red;">View</button>

                    <select class="header-input button-W" name="make_id">

                        <option value="0">All Makes&nbsp;&nbsp;</option>

                    <!-- BEGIN FOR EACH -->
                        <?php foreach ($makes as $make) : ?>

                            <option value="<?php echo $make['make_id'] ?>" <?php echo $make_id == $make['make_id'] ? 'selected' : '' ?>>

                                <?php echo htmlspecialchars($make['Make']) ?>

                            </option>
                        <?php endforeach; ?>
                    </select>
                    <button type="button" onclick="location.href = '.?action=list_makes'" class="header-input button-W" style="color: red;">Add</button>
                
                </form>
                        </li>

      

                    <!-------------------------------------------------- TYPES -->

                    <li type="item-6">

                        <form action="." method="get">

                        <button class="header-input button-W" type="submit" style="color: red;">View</button>

                            <select class="header-input button-W" name="type_id">

                                <option value="0">All Types&nbsp;&nbsp;&nbsp;</option>

                            <!-- BEGIN FOR EACH -->
                                <?php foreach ($types as $type) : ?>

                                    <option value="<?php echo $type['type_id'] ?>" <?php echo $type_id == $type['type_id'] ? 'selected' : '' ?>>

                                        <?php echo htmlspecialchars($type['Type']) ?>

                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <button type="button" onclick="location.href = '.?action=list_types'" class="header-input button-W" style="color: red;">Add</button>

                        </form>
                        </li>

                                  <!-------------------------------------------------- CLASSES -->

                    <li class="item-6">

                    <form action="." method="get">

                    <button class="header-input button-W" type="submit" style="color: red;">View</button>

                        <select class="header-input button-W" name="class_id">

                            <option value="0">All Classes</option>

                        <!-- BEGIN FOR EACH -->
                            <?php foreach ($classes as $class) : ?>

                                <option value="<?php echo $class['class_id'] ?>" <?php echo $class_id == $class['class_id'] ? 'selected' : '' ?>>

                                    <?php echo htmlspecialchars($class['Class']) ?>

                                </option>
                            <?php endforeach; ?>
                        </select>
                        <button type="button" onclick="location.href = '.?action=list_classes'" class="header-input button-W" style="color: red;">Add</button>

                    </form>
                    </li>
       
 

        <li id="button-li" type="item-6">

        <button id="submitButton" class="add_button" type="submit" name="action" value="add_vehicle"><strong>Add <br class="spacer"/>Vehicle</strong></button> 
        </li>                              

        </ul>

       
        </li>
        
     

</ul>
                                    
 
</section>




<?php 
include('view/footer.php'); 
?>