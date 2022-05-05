<?php 
/**
* Vue : Question
*/
?>


<main>
        <div class="container">
           <div class="current">Question <?php echo $question['question_number']; ?> of <?php echo $total; ?></div>
           <p class="question"> 
                <?php echo $question['text']; ?>

           </p>
           <form method="post" action="process.php">
               <ul class="choices">
                    <?php while($row = $choices->fetch_assoc()): ?>
                        <li><input name="choice" type="radio" value="<?php echo $row['id']; ?>" /><?php echo $row['text']; ?></li>
                    <?php endwhile; ?>

               </ul>
               <input type="submit" value="Submit" />
               <input type="hidden" name="number" value="<?php echo $number; ?>" />
           </form>
        </div>
    </main>