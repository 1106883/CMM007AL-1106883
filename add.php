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
        $conn = new PDO($dsn, $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

        if($_SERVER['REQUEST_METHOD'] === 'GET'){
            ?>
    <form id="blogEntry" action="<?{$_SERVER['PHP_SELF'];}?>" method="POST">
        <table>
            <tr>
                <td><label for="title">Entry Title:</label></td>
                <td><input id="title" name="title" type="text" required/></td>
            </tr>

            <tr>
                <td><label for="summary">Entry Summary:</label></td>
                <td><textarea id="summary" name="summary" required></textarea></td>
            </tr>

            <tr>
                <td><label for="category">Entry Category:</label></td>
                <td><select name='category' id="category">
                        <option value="Work">Work</option>
                        <option value="University">University</option>
                        <option value="Family">Family</option>
                    </select></td>
            </tr>

            <tr>
                <td><label for="submitted">Submitted By:</label></td>
                <td><input id="submitted" name="submitted" type="text"/></td>
            </tr>

            <tr>
                <td></td><td><input id="submit" type="submit" value="Submit"></td>
            </tr>
        </table>
    </form>

    <?
    }

    elseif($_SERVER['REQUEST_METHOD'] === 'POST'){
        $title = $_POST['title'];
        $summary = $_POST['summary'];
        $submitted = $_POST['submitted'];
        $category = $_POST['category'];

        $sql = "INSERT INTO blogview (entryTitle, entrySummary, category, submitter) VALUES ('$title', '$summary', '$category', '$submitted')";

        $conn->exec($sql);

        header("Location:blog.php");

    }
    else {
        header("Location:index.php");
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