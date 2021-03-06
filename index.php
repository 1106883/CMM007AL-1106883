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
    <section class="grid-25">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
    </section>
    <section class="grid-25">
        <img src="blog.png">
    </section>
</div>


<section class="grid-100">
    <footer>
        Designed by Kyle Martin, 2016
    </footer>
</section>

</body>

</html>