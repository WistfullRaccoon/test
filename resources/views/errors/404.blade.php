<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Error 404</title>
    <style>@import url('https://fonts.googleapis.com/css?family=Roboto+Mono:300,500');

        html, body {
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        body {
            background-image: url(https://img1.fonwall.ru/o/wy/wallpaper-earth-atmosphere-galaxy-scary.jpeg);
            background-size: cover;
            background-repeat: no-repeat;
            height: 100vh;
            width: 100vw;
            font-family: "Roboto Mono", "Liberation Mono", Consolas, monospace;
            color: rgba(255,255,255,.87);
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto;
        }

        .container,
        .container > .row,
        .container > .row > div {
            height: 100%;
        }

        #countUp {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        .number {
            font-size: 4rem;
            font-weight: 500;
        }

        + .text {
            margin: 0 0 1rem;
        }

        .text {
            font-weight: 300;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="xs-12 md-6 mx-auto">
            <div id="countUp">
                <div class="number" data-count="404">404</div>
                <div class="text">Page not found</div>
                <div class="text">This may not mean anything.</div>
                <div class="text">I'm probably working on something that has blown up.</div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
