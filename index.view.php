<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>


        .container {
            width: 40%;
            margin: auto;
            height: 47vw;
            background: rgba(0, 0, 0, 0.8);
            border-radius: 20px;
            padding-top: 1vw;
        }

        .text {
            text-align: center;
            color: #ECF0F1;
            font-family: Arial, sans-serif;
        }

        .header, .description {
            margin: 0;
            padding-bottom: 0;
        }

        .search {
            margin: auto;
            width: 50%;
        }

        .location {
            margin: 20px 0 0;
            padding: 0;
            text-align: center;
        }

        .formContainer {
            display: flex;
            flex-direction: row;
            text-align: center;
            justify-content: center;
        }

        button {
            background-color: #3498DB;
            border: 1px solid white;
            outline: none;
            border-radius: 0 5px 5px 0;
            padding: 0 10px;
            height: 30px;
        }

        .formContainer input {
            border: none;
            width: 250px;
            height: 30px;
            border-radius: 5px 0 0 5px;
        }

        .results {
            margin: 50px auto auto;
            border-radius: 10px;
            width: 80%;
            padding-left: 20px;
            background-color: rgba(0, 0, 0, 0.27);
            padding-bottom: 20px;
            padding-top: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="header text">Weather App</h1>
        <h3 class="description text">See the current weather for any location</h3>

        <div class="search">
            <h2 class="text location">Enter Location</h2>
            <div class="formContainer">
                <form method="GET" action="routes.php">
                    <label>
                        <input name="city" type="text" minlength="2" required placeholder="Riga"/>
                    </label>
                    <button name="submit" type="submit" class="text">Go</button>
                </form>
            </div>
        </div>

        <div class="results">
            <?php
                echo "<div class='information text'>
                    <h1>{$_GET['name']}</h1>
                    <p>
                        Weather condition: {$_GET['weather'][0]['description']}
                    </p>
                    <p>
                        Temperature: {$_GET['main']['temp']}°C
                    </p>
                    <p>
                        Pressure: {$_GET['main']['pressure']}hPa
                    </p>
                    <p>
                        Humidity: {$_GET['main']['humidity']}%
                    </p>
                    <p>
                        Wind speed: {$_GET['wind']['speed']} m/s
                    </p>

                    
    
                </div>"
            ?>
        </div>
    </div>
</body>

</html>
