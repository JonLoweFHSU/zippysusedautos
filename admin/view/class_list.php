<?php 

include("view/header.php"); 
?>

<h1 class="admin-h1">Classes</h1>

    <button type="button" onclick="location.href = '.?action=list_vehicles'" class="button-admin-h1 header-input button-W" style="color: red;">HOME</button>



<div id="list-wrapper">

<!------    DISPLAY classes -->

<?php if (!empty($classes)) : ?> 
    <section>

            <div id="list-items-wrap">
      
       <!--   FOR EACH BEGIN -->     
        <?php foreach ($classes as $class) : ?>

            <ul class="flg-flex">
           
            <li class="item-4">
               
              
            <span style="font-style: italic;">Class:</span> <span class="model"> <?php echo htmlspecialchars($class['Class']) ?></span>

            </li>
            <li class="item-3">
             
                    <form action="." method="post">
                        <input type="hidden" name="action" value="delete_class">

                        <input type="hidden" name="class_id" value="<?php echo $class['class_id'] ?>">
                        
                        <button class="delete-cat"><span class="material-symbols-outlined">delete</span></button>
                    </form>

            </li>
         

        </ul>

        <?php endforeach; ?>

        </div>

    </section>

<?php else : ?>

    <p>No classes.</p>

<?php endif; ?>

</div>

<!--------- ADD class -->

<section>

    <form id="Add_itemForm" class="types" action="." method="post">

    <ul class="flg-flex-5" style="border: none; margin-top:25px; padding-top: 0 !important;">

    <li class="item-4">

        <input type="hidden" name="action" value="add_class">
     
            <label>Class Name:</label>
       
             <input class="add_input" type="text" name="class" maxlength="30" placeholder="Name" autofocus required>


        </li>
        <li class="item-3">

<button class="add_button" type="submit"><strong>Add Class</strong></button><br>

</li>

    </ul>
    </form>
</section>




<?php 

include("view/footer.php"); 

?>