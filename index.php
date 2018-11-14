<!DOCTYPE html>
<?php session_start() ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Library</title>
        <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.0/normalize.css"/>
        <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
    </head>
    <body>
        <header><!-- Begin Header -->

        <!-- Logo -->
        <div class="logo">Logotip</div>

        <!-- Input to search books/authors -->
        <label for="search" class="hidden">Search</label>
        <input class="search" onfocus="this.placeholder=''" onblur="this.placeholder='Search a book'" name="search" placeholder="Search Book"> <!-- falta sa lupa <i class="fas fa-search"></i>, eliminar placeholder amb jquery quan esta focus-->

        <!-- Right Buttons-->
        <div class="buttons-header">
            <!--If user hasn't login we show login and register buttons -->
            <?php if(!isset($_SESSION['user'])): ?>
                <a href="includes/login/Login.php" class="button dark_blue">Login</a>
                <a href="includes/register/Register.php" class="button dark_turquoise">Register</a>
            <?php else: ?> <!-- If he is, we show this nav -->
                <!-- If it has logged in, login and register button disappear -->
                <nav>
                    <ul>
                        <li>
                            <a  href=""><i class="fas fa-square"></i><i class="fas fa-angle-down"></i></a>

                            <ul class='subclass'>
                                <li>
                                    <a href="">Profile</a>
                                </li>
                                <li>
                                    <a href="">My reservations</a>
                                </li>
                                <li>
                                    <a href="includes/CloseSession.php">Logout</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            <?php endif; ?>
        </div>
    </header> <!-- End Header -->
    <div class="destacados">
        <?php
            require_once 'database/Database.php';
            
            $db = new Database();
            
            $books = $db->getStationedBooks();
            echo sizeof($books);
        ?>
    </div>
    </body>
</html>
