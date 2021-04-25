<?php
include 'functions.php';
session_start();
$pdo = pdo_connect_mysql();
$msg = '';
if (!empty($_POST)) {

    if (!(isset($_SESSION["loggedin"]))){
        
        header ('Location: l.php');
        exit;

    }

    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]==true && $_SESSION["id"]==6){
        // Post data not empty insert a new record
    // Check if POST variable "title" exists, if not default the value to blank, basically the same for all variables
    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $desc = isset($_POST['desc']) ? $_POST['desc'] : '';
    // Insert new record into the "polls" table
    $stmt = $pdo->prepare('INSERT INTO polls VALUES (NULL, ?, ?)');
    $stmt->execute([$title, $desc]);
    // Below will get the last insert ID, this will be the poll id
    $poll_id = $pdo->lastInsertId();
    // Get the answers and convert the multiline string to an array, so we can add each answer to the "poll_answers" table
    $answers = isset($_POST['answers']) ? explode(PHP_EOL, $_POST['answers']) : '';
    foreach ($answers as $answer) {
        // If the answer is empty there is no need to insert
        if (empty($answer)) continue;
        // Add answer to the "poll_answers" table
        $stmt = $pdo->prepare('INSERT INTO poll_answers VALUES (NULL, ?, ?, 0)');
        $stmt->execute([$poll_id, $answer]);
    }
    // Output message
    $msg = 'Created Successfully!';
    }
    else{
        die("you are not permitted to create polls");
    }
    
}
?>
<?=template_header('Create Poll')?>

<div class="content update">
	<h2>Create Poll</h2>
    <form action="create.php" method="post">
        <label for="title" style="color: white;">Title</label>
        <input type="text" name="title" id="title">
        <label for="desc" style="color: white;">Description</label>
        <input type="text" name="desc" id="desc">
        <label for="answers" style="color: white;">Answers (per line)</label>
        <textarea name="answers" id="answers" style="color: black;"></textarea>
        <input type="submit" value="Create">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>