<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="main.css">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+SC:wght@300;400&family=Edu+TAS+Beginner&family=Ubuntu:wght@300;400;700&display=swap" rel="stylesheet">
    <title>WeatherApp</title>
</head>
<body>

<!--HEADER
---------------------------------------------------------------------------------------->

    <header class="header">
        <div class="container">
            <div class="header__inner">
                <div class="header__logo">
                    <h3 class="logo">fun weather.</h3>
                </div>
                <nav class="header__nav">
                    <a class="nav__link" href="#">Home</a>
                    <a class="nav__link" href="phpinfo.php">Features</a>
                    <?php
                        session_start();
                        if (isset($_SESSION['username'])) {
                            echo '<a class="nav__link" href="log_out.php">Log out</a>';
                        } else {
                            echo '<a class="nav__link" href="login.html">Login</a>';
                            echo '<a class="nav__link" href="register.html">Registration</a>';
                        }
                echo '</nav>';
                    if (isset($_SESSION['username'])) {
                            
                        echo '<div class="profile-icon">';
                            echo '<div class="circle-profile">';
                                echo '<img src="img/circle/profile-icon.jpg" alt="profile icon">';
                            echo '</div>';
                            echo '<div class="text_username">';
                                echo "<span class='username'>" . $_SESSION['username'] . "</span>";
                            echo '</div>';
                        echo '</div>';
                            
                    } else {

                        echo '<div class="header__icons footer__icons">';
                            echo '<a class="social__item" href="#">';
                                echo '<img src="img/social/twitter.png" height=30 alt="">';
                            echo '</a>';
                            echo '<a class="social__item" href="#">';
                                echo '<img src="img/social/instagram.png" height=30 alt="">';
                            echo '</a>';
                            echo '<a class="social__item" href="#">';
                                echo '<img src="img/social/facebook.png" height=30 alt="">';
                            echo '</a>';
                        echo '</div>';

                    }
                ?>
            </div>
        </div>
    </header>

<!--INTRO
---------------------------------------------------------------------------------------->

    <div class="intro">
        <div class="container">
            <div class="intro__inner">
                <div class="description">
                    <h1 class="main__description">
                        Get the most fun  weather app
                    </h1>
                    <div class="sub__description">
                        Simple, nice and user-friendly application of the weather. Only useful information
                    </div>
                    <div class="buttons">
                        <a class="btn btn--red" href="#">Download</a>
                        <a class="btn btn--blue" href="#">Features</a>
                    </div>
                </div>
                <div class="images">
                    <div class="circle circle--red">
                        <div class="text-in-circle">sunny</div>
                    </div>
                    <div class="phone">
                        <img src="img/circle/phone.png" alt="">
                    </div>
                    <div class="circle circle--blue">
                        <div class="text-in-circle">london</div>
                    </div>
                    <div class="circle circle--yellow">
                        <div class="text-in-circle text-in-circle--text_1">rio</div>
                    </div>
                    <div class="circle circle--white">
                        <div class="text-in-circle text-in-circle--text_2">9°</div>
                    </div>
                </div>
            </div>
            <div class="foot__intro__inner">
                <div class="scrolling">
                    <div class="text-in-circle text-in-circle--text_3">˅</div>
                </div>
            </div>
        </div>
    </div>

<!--MAIN
---------------------------------------------------------------------------------------->

    <div class="main">
        <div class="container">
            <div class="main__inner">
                <div class="weather-block">
                    <div class="text-weather-block">
                        <p class="text-weather">weather now</p>
                    </div>
                    <script src="api_weather.js"></script>
                    <div class="weather">
                        <p class="package-name"></p>
                        <hr class="hr-weather">
                        <p class="temperature"></p>
                        <p class="disclaimer"></p>
                        <hr class="hr-weather">
                        <img class="icon-weather" src="" alt="">
                        <hr class="hr-weather">
                        <div class="weather-widget">
                            <label for="city-select">Select City:</label>
                                <select id="city-select">
                                    <option value="spb">Saint Petersburg</option>
                                    <option value="moscow">Moscow</option>
                                </select>
                            <div class="block-btn">
                                <button id="btn-get-weather">Get Weather</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block-comments">
                    <div class="headline-block-comments">
                        <p class="text-headline-block-comments">Comments</p>
                    </div>
                    <?php
                        if (isset($_SESSION['username'])) {
                    ?>
                            <form action="input_comment.php" id="commentForm" method="post">
                                <textarea class="field-comment" type="commentText" name="commentText" placeholder="Leave a comment"></textarea>
                                <div class="btn-comments">
                                    <button class="btn btn--darkblue" type="submit">Post comment</button>
                                </div>
                            </form>
                    <?php
                        }
                    ?>

                    <ul id='LIST'>
                        <li class="comment">
                            <div class="left-block">
                                <div class="user">Admin</div>
                                <div class="timestamp">05.12.2023 10:00</div>
                            </div>
                            <div class="comment-text">Thank you for your choice</div>
                        </li>
                    </ul>
                    <script src="comments_js.js"></script>
                </div>
                <div class="perfect_features">
                    <div class="lines_smb">
                        <div class="headline_smb">perfect features</div>
                        <div class="subline_smb">Only necessary</div>
                    </div>
                    <div class="features">
                        <div class="usability --block-features">
                            <div class="img">
                                <img src="img/features/diamant.png" alt="">
                            </div>
                            <div class="text-block">
                                <div class="headline">Usability</div>
                                <div class="text">
                                    Sometimes the simplest things are the hardest to find. So we created a new line for everyday life
                                </div>
                            </div>
                        </div>
                        <div class="parallax_effect --block-features">
                            <div class="img">
                                <img src="img/features/parallax.png" alt="">
                            </div>
                            <div class="text-block">
                                <div class="headline">Parallax Effect</div>
                                <div class="text">
                                    Sometimes the simplest things are the hardest to find. So we created a new line for everyday life
                                </div>
                            </div>
                        </div>
                        <div class="unlimites_colors --block-features">
                            <div class="img">
                                <img src="img/features/colors.png" alt="">
                            </div>
                            <div class="text-block">
                                <div class="headline">Unlimites Colors</div>
                                <div class="text">
                                    Sometimes the simplest things are the hardest to find. So we created a new line for everyday life
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main__inner">
                <div class="simple_widgets">
                    <div class="lines_smb">
                        <div class="headline_smb">simple widgets</div>
                        <div class="subline_smb">Drag on drop</div>
                    </div>
                    <script src="code_widget.js"></script>
                    <div class="slideshow__inner">
                        <div class="slides-one --enter_one">
                            <img class="wid" src="img/widgets/wdg2.png" alt="">
                            <div class="block-shadow">
                                <img class="shadow" src="img/widgets/shadow-left.png" alt="">
                            </div>                            
                        </div>
                        <div class="slides-two --enter_two">
                            <img class="wid" src="img/widgets/wdg1.png" alt="">
                            <div class="block-shadow">
                                <img class="shadow" src="img/widgets/shadow-med.png" alt="">
                            </div>                 
                        </div>
                        <div class="slides-three --enter_three">
                            <img class="wid" src="img/widgets/wdg3.png" alt="">
                            <div class="block-shadow">
                                <img class="shadow" src="img/widgets/shadow-right.png" alt="">
                            </div>
                        </div>
                    </div>                    
                </div>               
            </div>
            <div class="main__inner main__inner--screenshots">
                <div class="screenshots">
                    <div class="lines_smb lines_smb--screenshots">
                        <div class="headline_smb">screenshots</div>
                        <div class="subline_smb">The brightest images</div>
                    </div>
                    <div class="screenshots__description">
                        <div class="block-screenshots__phone">
                            <div class="screenshots__phone">
                                <img class="screenshots__phone__inner" src="img/screenshots/phone_cloudy.png" alt="">
                            </div>
                            <div class="block-circle">
                                <div class="circle on__screen-circle-blue --blue">
                                    <div class="text-in-circle --text__on-screen-weather">Cloudy</div>
                                </div>
                                <div class="circle on__screen-circle-yellow --yellow">
                                    <div class="text-in-circle --text__on-screen">15°</div>
                                </div>
                            </div>
                            <div class="comment-weather">
                                Cloudy
                            </div>
                        </div>
                        <div class="subscreen__description">
                            <div class="icon__description --margin">
                                <img src="img/screenshots/icon_cloudy.png" alt="">
                            </div>
                            <div class="headline-screen__description --margin">
                                when the clouds
                            </div>
                            <div class="subline-screen__description --margin">
                                Variable information on the air humidity, the
                                feeling of the weather, and the ability to
                                share this with your friends
                            </div>
                            <div class="icons-screen__description">
                                <img src="img/screenshots/icons_circle.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="screenshots__description">
                        <div class="subscreen__description">
                            <div class="icon__description --margin">
                                <img src="img/screenshots/icon_sunny.png" alt="">
                            </div>
                            <div class="headline-screen__description --margin">
                                when the sunny
                            </div>
                            <div class="subline-screen__description --margin">
                                Sometimes the simplest things are the
                                hardest to find. So we created a new line
                                for everyday live. Sometimes the simplest
                            </div>
                            <div class="icons-screen__description">
                                <img src="img/screenshots/icons_circle.png" alt="">
                            </div>
                        </div>
                        <div class="block-screenshots__phone">
                            <div class="screenshots__phone">
                                <img class="screenshots__phone__inner" src="img/screenshots/phone_sunny.png" alt="">
                            </div>
                            <div class="block-circle">
                                <div class="circle on__screen-circle-blue --orange">
                                    <div class="text-in-circle --text__on-screen-weather">Sunny</div>
                                </div>
                                <div class="circle on__screen-circle-yellow --red">
                                    <div class="text-in-circle --text__on-screen">35°</div>
                                </div>
                            </div>
                            <div class="comment-weather">
                                Sunny
                            </div>
                        </div>
                    </div>
                    <div class="screenshots__description">
                        <div class="block-screenshots__phone">
                            <div class="screenshots__phone">
                                <img class="screenshots__phone__inner" src="img/screenshots/phone_rainy.png" alt="">
                            </div>
                            <div class="block-circle">
                                <div class="circle on__screen-circle-blue --aquamarin">
                                    <div class="text-in-circle --text__on-screen-weather text-weather--rainy">Rainy</div>
                                </div>
                                <div class="circle on__screen-circle-yellow --black-blue">
                                    <div class="text-in-circle --text__on-screen">9°</div>
                                </div>
                            </div>
                            <div class="comment-weather">
                                Rainy
                            </div>
                        </div>
                        <div class="subscreen__description subscreen__description--last">
                            <div class="icon__description --margin">
                                <img src="img/screenshots/icon_rainy.png" alt="">
                            </div>
                            <div class="headline-screen__description --margin">
                                when the rainy
                            </div>
                            <div class="subline-screen__description --margin">
                                Sometimes the simplest things are the
                                hardest to find. So we created a new line
                                for everyday live. Sometimes the simplest
                            </div>
                            <div class="icons-screen__description">
                                <img src="img/screenshots/icons_circle.png" alt="">
                            </div>
                        </div>
                    </div>                 
                </div>
            </div>
        </div> <!--container-->
    </div> <!--main-->

    <!--FOOTER
---------------------------------------------------------------------------------------->

    <footer class="footer">
        <div class="container">
            <div class="header__inner footer__inner">
                <div class="header__logo footer__logo">
                    <h3 class="logo">
                        <span class="logo--orange">fun</span>
                        <span class="logo--blue">weather.</span>
                    </h3>
                </div>
                <nav class="header__nav footer__nav">
                    <a class="nav__link" href="#">Home</a>
                    <a class="nav__link" href="#">Features</a>
                    <a class="nav__link" href="login.html">Login</a>
                    <a class="nav__link" href="register.html">Registration</a>
                </nav>
                <div class="header__icons footer__icons">
                    <a class="social__item" href="#">
                        <img src="img/social/twitter.png" height=30 alt="">
                    </a>
                    <a class="social__item" href="#">
                        <img src="img/social/instagram.png" height=30 alt="">
                    </a>
                    <a class="social__item" href="#">
                        <img src="img/social/facebook.png" height=30 alt="">
                    </a>
                </div>
            </div>
            <div class="borderline"></div>
            <div class="author">©️ 2023 Michal Kolmogorov. O729Corporation !-*^_^*-!</div>
        </div>
    </footer>

</body>
</html>