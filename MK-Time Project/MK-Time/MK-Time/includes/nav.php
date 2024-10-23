<body>




    <?php if (isset($_SESSION['first_name']) && $_SESSION['first_name'] === "Admin"): ?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand nav-title" href="index.php">MK Time <span style="font-weight:400;">-Admin
                    Dashboard</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse flex-row-reverse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="navbar-link"><a class="nav-link" href="index.php">Products</a></li>
                    <li class="navbar-link">
                        <a class="nav-link" href="create.php">Create</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php"><?php if (isset($_SESSION['name'])) {
                            echo $_SESSION['first_name'];
                        } else {
                            echo "profile";
                        }
                        ?></a>
                    </li>
                    <li class="navbar-link">
                        <a class="nav-link" href="logout.php">
                            <?php if ($_SESSION['loggedin']) {
                                echo 'Logout';
                            } else {
                                echo 'login';
                            } ?>

                        </a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0 width-full" action="search.php" method="GET">
                    <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>
    <?php else: ?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
            <a class="navbar-brand nav-title" href="index.php">MK Time</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse flex-row-reverse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="navbar-link"><a class="nav-link" href="index.php">Products</a></li>
                    <li class="navbar-link">
                        <a class="nav-link" href="cart.php">Cart <?php if (empty($_SESSION['cart'])) {
                            echo " <span></span>";
                        } else {
                            echo "<span class='cart-number'>" . sizeof($_SESSION['cart']) . "</span>";
                        } ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php"><?php if (isset($_SESSION['name'])) {
                            echo $_SESSION['first_name'];
                        }
                        ;
                        ?></a>
                    </li>
                    <li class="navbar-link">
                        <?php if (isset($_SESSION['first_name'])) {
                            echo
                                '<a class="nav-link" href="logout.php">Logout</a>';
                        } else {
                            echo
                                '<a class="nav-link" href="login.php">Login</a>';
                        }
                        ?>

                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0 width-full" action="search.php" method="GET">
                    <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>
    <?php endif; ?>