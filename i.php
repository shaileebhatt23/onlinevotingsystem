<?php
include 'functions.php';
// Connect to MySQL
$pdo = pdo_connect_mysql();
// MySQL query that selects all the polls and poll answers
$stmt = $pdo->query('SELECT p.*, GROUP_CONCAT(pa.title ORDER BY pa.id) AS answers FROM polls p LEFT JOIN poll_answers pa ON pa.poll_id = p.id GROUP BY p.id');
$polls = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<?=template_header('Polls')?>
<!DOCTYPE html>
<html>
<head>
	<style>
		body
	{
    	counter-reset: Serial;           /* Set the Serial counter to 0 */
	}

	table
	{
    	border-collapse: separate;
	}

	tbody tr td:first-child:before
	{
  	counter-increment: Serial;      /* Increment the Serial counter */
  	content: "" counter(Serial); /* Display the counter */
	}
	</style>
</head>
<body>
	<div class="content home">
	<h2 style="color: black;">Polls</h2>
	<p style="color: black; font-weight:bold;" >Welcome to the index page, you can view the list of polls below.</p>
	<a href="create.php" class="create-poll" style="color:white ; background-color:darkblue;">Create Poll</a>
	<table>
        <thead>
            <tr>
                <td style="color: black;">#</td>
                <td style="color: black;">Title</td>
				<td style="color: black;">Description</td>
                <td style="color: black;">Choices</td>
				<td></td>
   
            </tr>
        </thead>
        <tbody>
            <?php foreach ($polls as $poll): ?>
            <tr>
                <td></td>
                <td><?=$poll['title']?></td>
                <td><?=$poll['desc']?></td>
				<td><?=$poll['answers']?></td>
                <td class="actions">
					<a href="v.php?id=<?=$poll['id']?>" class="view" title="View Poll"><i class="fas fa-eye fa-xs"></i></a>
                    <a href="delete.php?id=<?=$poll['id']?>" class="trash" title="Delete Poll"><i class="fas fa-trash fa-xs"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>


<?=template_footer()?>