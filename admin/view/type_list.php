<?php 

include("view/header.php"); 
?>



<h1 class="admin-h1">Types</h1>

 

    <button type="button" onclick="location.href = '.?action=list_vehicles'" class="button-admin-h1 header-input button-W" style="color: red;">HOME</button>



<div id="list-wrapper">

<!------    DISPLAY TYPES -->

<?php if (!empty($types)) : ?> 
    <section>

            <div id="list-items-wrap">
      
       <!--   FOR EACH BEGIN -->     
        <?php foreach ($types as $type) : ?>

            <ul class="flg-flex">
           
            <li class="item-4">
               
              
            <span style="font-style: italic;">Type:</span> <span class="model"> <?php echo htmlspecialchars($type['Type']) ?></span>

            </li>
            <li class="item-3">
             
                    <form action="." method="post">
                        <input type="hidden" name="action" value="delete_type">

                        <input type="hidden" name="type_id" value="<?php echo $type['type_id'] ?>">
                        
                        <button class="delete-cat"><span class="material-symbols-outlined">delete</span></button>
                    </form>

            </li>
         

        </ul>

        <?php endforeach; ?>

        </div>

    </section>

<?php else : ?>

    <p>No types.</p>

<?php endif; ?>

</div>

<!--------- ADD TYPE -->

<section>

    <form id="Add_itemForm" class="types" action="." method="post">

    <ul class="flg-flex-5" style="border: none; margin-top:25px; padding-top: 0 !important;">

    <li class="item-4">

        <input type="hidden" name="action" value="add_type">
     
            <label>Type Name:</label>
       
             <input class="add_input" type="text" name="type" maxlength="30" placeholder="Name" autofocus required>


        </li>
        <li class="item-3">

<button class="add_button" type="submit"><strong>Add Type</strong></button><br>

</li>

    </ul>
    </form>
</section>



<?php 

include("view/footer.php"); 

?>