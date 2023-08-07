<head>
    <link rel="stylesheet" href="https://<?php echo $_SERVER['SERVER_NAME']; ?>/css/cookie.css" type="text/css">
    <!-- <link rel="stylesheet" href="../css/cookie.css" type="text/css"> -->
</head>
<div class="cookie-container">
    <div class="middle">
        <section class="cookie-banner">
            <div class="grid-container-info">
                <img src="https://<?php echo $_SERVER['SERVER_NAME']; ?>/img/cookie.png" alt="cookie" width="40">
                <h5>Diese Website verwendet Cookies.</h5>
            </div>
            <p>
                Durch die weitere Nutzung unserer Website erklären Sie sich mit unserer
                <a target="_blank" href="https://<?php echo $_SERVER['SERVER_NAME']; ?>/agb/agb.html">Datenschutzrichtlinien</a> einverstanden.
            </p>
            <section class="grid-container-button">
                <a href='./?consent=all'>Cookies akzeptieren</a>
                <a href='./?consent=notall'>Nur notwendige Cookies</a>
            </section>
        </section>
    </div>
</div>