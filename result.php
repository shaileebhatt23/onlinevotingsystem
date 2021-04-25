<?php
include 'functions.php';
?>

<?=template_header('Poll Results')?>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
.dropbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
  display: block;
}

.dropdown:hover .dropbtn {
  background-color: #3e8e41;
}
</style>
</head>

<body>

<h1>Select a poll to view the result</h1>

<div class="dropdown">
  <button class="dropbtn">Choose from here</button>
  <div class="dropdown-content">
    <?php
    $pdo = pdo_connect_mysql();
    $poll = $pdo->query("SELECT * FROM polls")->fetchAll();
    
    if ($poll) {
        foreach($poll as $row){
            // echo "<option value='". $row['title'] ."'>" .$row['title'] ."</option>";
            echo "<a href='SelResult.php?id=" . $row['id'] . "'>" . $row['title'] . "</a>";
        }

    } else {
        die ('No polls yet');
    }

        ?>
  </div>
</div>


</body>

<?=template_footer()?>