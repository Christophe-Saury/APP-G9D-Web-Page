<?php
/**
* Vue : entête HTML
*/
?>

<main>
        <div class="container">
            <h2>Add A Question</h2>
            <?php 
            if(isset($msg)){
                echo '<p>'.$msg.'</p>';
            }
            ?>

            <form method="post" action ="add.php">
                <p>
                    <label>Question Number</label>
                    <input type="number" value="<?php echo $next; ?>" name="question_number" />    
                </p>
                <p>
                    <label>Question Text</label>
                    <input type="text" name="question_text" />    
                </p>
                <p>
                    <label>Choice #1</label>
                    <input type="text" name="choice1" />    
                </p>
                <p>
                    <label>Choice #2</label>
                    <input type="text" name="choice2" />    
                </p>
                <p>
                    <label>Choice #3</label>
                    <input type="text" name="choice3" />    
                </p>
                <p>
                    <label>Choice #4</label>
                    <input type="text" name="choice4" />    
                </p>
                <p>
                    <label>Choice #5</label>
                    <input type="text" name="choice5" />    
                </p>
                <p>
                    <label>Choice #6</label>
                    <input type="text" name="choice6" />    
                </p>
                <p>
                    <label>Correct Choice Number: </label>
                    <input type="number" name="correct_choice" />    
                </p>
                <p>
                    <input type="submit" name="submit" value="submit" />    
                </p>
            </form>
        </div>
    </main>