<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="design.css"/>
    <link rel="stylesheet"
          href="unsemantic-grid-responsive-tablet.css">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1"/>
    <link href='https://fonts.googleapis.com/css?family=PT+Serif' rel='stylesheet' type='text/css'>
    <meta charset="UTF-8">
    <title>myBlog</title>
</head>
<body>

<header>
    <h1>myBlog</h1>
    <p>because the internet needs to know what I think</p>
</header>

<nav>
    <ul>
        <li><a href="blog.php">All Blog Items</a></li>
        <li><a href="blog.php?category=work">Work Items</a></li>
        <li><a href="blog.php?category=university">University Items</a></li>
        <li><a href="blog.php?category=family">Family Items</a></li>
        <li><a href="add.php">Insert a Blog Item</a></li>
    </ul>
</nav>

<div id="content">
    <?php

    $dsn = "mysql:host=ap-cdbr-azure-east-c.cloudapp.net;dbname=cmm007aldb-1106883";
    $username = "b7fcddd1b78e04";
    $password = "81126b3f";
    try {
        $conn = new PDO($dsn, $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $cat = $_GET['category'];
        if (!isset($cat)) {
            $cat = '%';
        }

        $query = "SELECT * FROM blogview WHERE category LIKE '%$cat%'";

        $results = $conn->query($query);

    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    if ($cat!='%'){
        echo "<p id='blogType'>".$cat."</p>";
    }
    else echo "<p id='blogType'>All</p>";

    try {

        print "<table id='results'>\n";
        foreach ($results as $row) {
            echo "<div class='article'>";
            echo "<p>".$row["entryTitle"] . " by " . $row['submitter']."</p>";
            echo "<p>" . $row["category"] . "</p>";
            echo "<p>" . $row["entrySummary"] . "</p>";
            echo "</div>";
        }
        print "</table>\n";
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    ?>

</div>


<section class="grid-100">
    <footer>
        Designed by Kyle Martin, 2016
    </footer>
</section>

</body>

</html>