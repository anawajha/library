<?php
include_once 'database/db_connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Books</title>
    <!-- Boostrap Library -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link type="text/css" href="css/main-style.css" rel="stylesheet"/>
    <script type="text/javascript" src="js/loginmodal.js"></script>
</head>

<body>
<header>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-5 col-lg-5 logo">
                <a href="index.php"> <img src="img/logo.jpg" alt="logo books">
                    <h1>Books</h1></a>
            </div>
            <div class="col-sm-12 col-md-5 col-lg-3 col-md-offset-2 col-lg-offset-4">
                <div id="search-input" style="width: fit-content;border: none;padding-top: 15px;">
                    <div>
                        <a href="search.php"><i class="glyphicon glyphicon-search"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<nav class="navbar navbar-default">
    <div class="container-fluid menuNav">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" aria-expanded="false"><span
                            class="sr-only">Navigation</span> <span class="icon-bar"></span> <span
                            class="icon-bar"></span> <span class="icon-bar"></span></button>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php">Home</a></li>
                    <li><a href="profile_user.php">Profile</a></li>
                    <li><a href="about.php">About us</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>


                <div class="col-lg-7">
                    <div class="row">
                        <div class="col-lg-4 col-lg-offset-7 paddingNone userDropdownMenu">
                            <div class="btn-group iconMenu" role="group" aria-label="...">
                                <!-- // buttons -->
                                <div class="btn-group" role="group">
                                    <a href="admin/login.php">
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="modal"
                                                aria-haspopup="true" aria-expanded="false"><img
                                                    src="img/user_undefined_f_40x40.jpg" class="img-circle"/>
                                            <span>Sign in</span> <span class="fa fa-power-off"></span></button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>


<div class="container content">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <ul class="breadcrumb">
                <li class="active"><i class="fa fa-home" aria-hidden="true"></i>Home</li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <ul class="nav nav-tabs nav-justified">
                <li role="presentation" class="active"><a href="index.php">Books</a></li>
                <li role="presentation"><a href="index_publishing_houses.php">Publishing houses</a></li>
                <li role="presentation"><a href="index_authors.php">Authors</a></li>
                <li role="presentation"><a href="index_categories.php">Categories</a></li>

            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="listItems">
                <div>
                    <div>
                        <div>
                            <div>
                                <div>
                                    <div>
                                        <div>
                                            <div>
                                                <div>
                                                    <div>
                <?php
                $get_books =  "SELECT b.cover, b.id, b.title, b.ISBNNumber,b.authorId,b.catId, b.phId , a.authorName, c.CategoryName, ph.house_name 
                              FROM books as b, authors as a, categories as c, publishing_houses as ph
                              WHERE b.authorId = a.id AND b.catId = c.id AND b.phId = ph.id
                              ORDER BY b.id"; ;
                $result = mysqli_query($connection,$get_books);
                if(mysqli_num_rows($result) > 0){
                   while($row = mysqli_fetch_assoc($result)){

                       echo ' <div>
                <div class="row item">
                    <div class="col-sm-12 col-md-4 col-lg-3">
                        <div class="coverItem"><img src=" '.'http://localhost/finalProject/' . $row['cover'].'"
                                                    class="img-responsive"/>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-8 col-lg-7 informationItem">
                        <h3 class="title">'. $row['title'] .'</h3>
                        <h5 class="authorName">by <a href="author.php?author_id=' .$row['authorId'] . '"> ' . $row['authorName'] . '</a></h5>
                        <span class="ratingValue"> ISBN Number : '. $row['ISBNNumber'] .'</span>
                        <h5 class="authorName">from <a href="publish_house.php?ph_id=' .$row['phId'] . '"> ' . $row['house_name'] . '</a></h5>
                        <h5 class="authorName">from <a href="category.php?cat_id=' .$row['catId'] . '"> ' . $row['CategoryName'] . '</a></h5>

                        </div>
                    </div>
                </div>
                <hr> </div> ';
                   }
                }
                ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="container-fluid">
    <div class="container">
        <div class="row copyright">
            <div class="col-lg-12"><span>Copyright © 2021 Books | All rights reserved.</span></div>
        </div>
    </div>
</footer>
</body>

</html>