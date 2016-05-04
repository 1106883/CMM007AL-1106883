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
        <a href="blog.php"><li>All Blog Items</li></a>
        <a href="blog.php"><li>Work Items</li></a>
        <a href="blog.php"><li>University Items</li></a>
        <a href="blog.php"><li>Family Items</li></a>
        <a href="add.php"><li>Insert a Blog Item</li></a>
    </ul>
</nav>

<div id="content">
    <?php

    $dsn = "mysql:host=ap-cdbr-azure-east-c.cloudapp.net;dbname=cmm007aldb-1106883";
    $username = "b7fcddd1b78e04";
    $password = "81126b3f";
    try {
        $conn = new PDO($dsn, $username, $password, array(
            PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true,
   ));
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $sql = "SELECT * FROM blogview";

        $conn->exec($sql);
        $results = $conn->query($sql);


    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }


    try {

        print "<table id='results'>\n";
        foreach ($results as $row) {
            echo "<tr>";
            echo "<td>" . $row["entryTitle"] . " by " . $row['submitter']."</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>" . $row["category"] . "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>" . $row["entrySummary"] . "</td>";
            echo "</tr>";
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