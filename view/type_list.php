<?php 

include("view/header.php"); 
?>

<ul class="flg-flex-2" style="position: fixed;">

<li class="item-5">

    <!-- <h1>types</h1> -->

    </li>

    <li class="item-6">

    <button type="button" onclick="location.href = '.?action=list_vehicles'" class="header-input button-W" style="color: red;">HOME</button>

    </li>

</ul>

<div id="list-wrapper">

<!------    DISPLAY TYPES -->

<?php if (!empty($types)) : ?> 
    <section>

            <div id="list-items-wrap">
      
       <!--   FOR EACH BEGIN -->     
        <?php foreach ($types as $type) : ?>

            <ul class="flg-flex">
           
            <li class="item-4">
               
              
            <span style="font-style: italic;">type Name:</span> <span class="model"> <?php echo htmlspecialchars($type['Type']) ?></span>

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

    <form id="Add_itemForm" action="." method="post">

    <ul class="flg-flex" style="border: none; margin-top:25px; padding-top: 0 !important;">

    <li class="item-4">

        <input type="hidden" name="action" value="add_type">
     
            <label>Name:</label>
       
             <input class="add_input" type="text" name="type" maxlength="30" placeholder="Name" autofocus required>


        </li>
        <li class="item-3">

<button class="add_button" type="submit"><strong>Add <br/>type</strong></button><br>

</li>

    </ul>
    </form>
</section>


<?php 

include("view/footer.php"); 

?>