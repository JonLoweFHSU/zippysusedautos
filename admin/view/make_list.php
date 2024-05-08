<?php 

include("view/header.php"); 
?>



    <h1 class="admin-h1">Makes</h1>



    <button type="button" onclick="location.href = '.?action=list_vehicles'" class=" button-admin-h1 header-input button-W" style="color: red;">HOME</button>



<div id="list-wrapper">

<!------    DISPLAY makes -->

<?php if (!empty($makes)) : ?> 
    <section>

            <div id="list-items-wrap">
      
       <!--   FOR EACH BEGIN -->     
        <?php foreach ($makes as $make) : ?>

            <ul class="flg-flex">
           
            <li class="item-4">
               
              
            <span style="font-style: italic;">Make:</span> <span class="model"> <?php echo htmlspecialchars($make['Make']) ?></span>

            </li>
            <li class="item-3">
             
                    <form action="." method="post">
                        <input type="hidden" name="action" value="delete_make">

                        <input type="hidden" name="make_id" value="<?php echo $make['make_id'] ?>">
                        
                        <button class="delete-cat"><span class="material-symbols-outlined">delete</span></button>
                    </form>

            </li>
         

        </ul>

        <?php endforeach; ?>

        </div>

    </section>

<?php else : ?>

    <p>No makes.</p>

<?php endif; ?>

</div>

<!--------- ADD make -->

<section>

    <form id="Add_itemForm" class="types" action="." method="post">

    <ul class="flg-flex-5" style="border: none; margin-top:25px; padding-top: 0 !important;">

    <li class="item-4">

        <input type="hidden" name="action" value="add_make">
     
            <label>Make Name:</label>
       
             <input class="add_input" type="text" name="make" maxlength="30" placeholder="Name" autofocus required>


        </li>
        <li class="item-3">

<button class="add_button" type="submit"><strong>Add Make</strong></button><br>

</li>

    </ul>
    </form>
</section>



<?php 

include("view/footer.php"); 

?>