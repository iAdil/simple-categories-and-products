<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Demo App</title>
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
</head>
<body>
    <section class="section">
        <div class="container">
            <h1 class="title">
                Demo App
            </h1>
            <p class="subtitle">
                With categories and products
            </p>
        </div>

        <hr>
        <div id="app">
            <div class="container">
                <div class="columns">
                    <div class="column is-one-third">
                        <categories></categories>
                    </div>
                    <div class="column">
                        <products></products>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>