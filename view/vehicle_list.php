<?php 
include('view/header.php'); 
?>
 
<!--------------------------------------- FILTER VEHICLES -->


<section class="dropdown-select">

<ul class="flg-flex-2">

<li class="item-5">

    <!------------------------------------------- MAKES -->
           

 <form action="." method="get">


    <select class="header-input button-W" name="make_id">

        <option value="0">All Makes&nbsp;&nbsp;</option>

    <!-- BEGIN FOR EACH -->
        <?php foreach ($makes as $make) : ?>

            <option value="<?php echo $make['make_id'] ?>" <?php echo $make_id == $make['make_id'] ? 'selected' : '' ?>>

                <?php echo htmlspecialchars($make['Make']) ?>

            </option>
        <?php endforeach; ?>
    </select>

    <!-------------------------------------------------- TYPES -->

    <select class="header-input button-W" name="type_id">

        <option value="0">All Types&nbsp;&nbsp;&nbsp;</option>

        <!-- BEGIN FOR EACH -->
        <?php foreach ($types as $type) : ?>

            <option value="<?php echo $type['type_id'] ?>" <?php echo $type_id == $type['type_id'] ? 'selected' : '' ?>>

                <?php echo htmlspecialchars($type['Type']) ?>

            </option>
        <?php endforeach; ?>
        </select>
 


    <!-------------------------------------------------- CLASSES -->


        <select class="header-input button-W" name="class_id">

            <option value="0">All Classes</option>

        <!-- BEGIN FOR EACH -->
            <?php foreach ($classes as $class) : ?>

                <option value="<?php echo $class['class_id'] ?>" <?php echo $class_id == $class['class_id'] ? 'selected' : '' ?>>

                    <?php echo htmlspecialchars($class['Class']) ?>

                </option>
            <?php endforeach; ?>
        </select>
    



                </li>

    
                <li class="item-6 white-t">

            <label for="sort">Sort By:</label>

            <input type="radio" name="sort" value="price" <?php echo ('price') ? 'checked' : ''; ?>> Price
            <input type="radio" name="sort" value="year" <?php echo ('year') ? 'checked' : ''; ?>> Year

            <button class="header-input button-W" type="submit" style="color: red;">Submit</button>
         

        </form>

                </li>
                </ul>

</section>

     <!-- -------------------------------------------------------------------------------------------- VEHICLE LIST -->

     <section>

    <div id="list-wrapper">

    <?php if (!empty($vehicles)) : ?>

        <div id="list-items-wrap">

         <!-- BEGIN FOR EACH -->
        <?php foreach ($vehicles as $vehicle) : ?>

            <ul class="flg-flex">

            <li class="item-4">

                <span class="title"><?php echo htmlspecialchars($vehicle['Make']) ?></span>

                <span class="title"><?php echo htmlspecialchars($vehicle['model']) ?></span>

                <p class="desc">Type: <?php echo htmlspecialchars($vehicle['Type']) ?></p>

                <span class="desc">Year: <span class="delete"><?php echo htmlspecialchars($vehicle['year']) ?></span></span>

                <span class="desc">Class: <?php echo htmlspecialchars($vehicle['Class']) ?></span>

                <p class="desc">Price: $<?php echo htmlspecialchars(number_format($vehicle['price'], 2)) ?></p>

                

             </li>

              
            <li class="item-3">
        

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

<?php 
include('view/footer.php'); 
?>