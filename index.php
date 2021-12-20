<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>

    <title>Hello, world!</title>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg&callback=initMap&libraries=&v=weekly&channel=2"
        async></script>

</head>


<body>
    <div class="container mt-5 col-4" style="background-color: rgba(125, 195, 197, 0.541);padding-bottom: 20px;" >
        <h2 style="text-align: center ; padding-top: 30px;"><b> พยากรณ์อากาศ</b></h2> <br />
        <form class="container text-center">
            <div class="from-group mb-3 mx-5 " style="padding-top: 15px;">
                <span class="from-group-text">Latitude :</span>
                <input type="text" class="control-label " placeholder="ละติจูด " aria-label="Latitude"
                    aria-describedby="Latitude" id="Latitude">
            </div>

            <div class="container mx-">
                <div class="from-group mb-3 mx-4">
                    <span class="from-group-text">Longitude :</span>
                    <input type="text" class="control-label" placeholder=" ลองจิจูด" aria-label="Longitude"
                        aria-describedby="Longitude" id="Longitude">
                </div>
                <div class="container-fluid mt-4 d-flex justify-content-center">
                    <button type="button" class="btn" style="background-color: antiquewhite;" id="btnSearch">search</button>
                </div>
            </div>
            <br />
            <div class="card text-center">
                <div class="container  mt-5 d-flex justify-content-center">
                    <div class="card" id="cardWeather" style="width: 30rem; ">
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
<script>
    function setmap() {
        var urlmap = "https://api.openweathermap.org/data/2.5/weather?lat=8.7212448&lon=99.9401481&appid=95cf28a7cf4a3c07fadfb5df2841ca18";
        $.getJSON(urlmap)
            .done((data) => {
                var place = (data.name);
                var temp = ((data.main["temp"] - 273).toFixed(0) + " °C");
                var humid = (data.main["humidity"] + "%");
                var datetime = convertHMS(data.dt);
                var sunrise = convertHMS(data.sys["sunrise"]);
                var sunset = convertHMS(data.sys["sunset"]);
                var windSpeed = (data.wind["speed"]);
                $.each(data.weather[0], (key, value) => {
                    for (let i = 0; i < (data.weather[0]).length; i++) {
                        console.log(value);
                    }
                })
                var line = "<div id='dataWeather'>";
                line += "<img src='https://scontent.furt3-1.fna.fbcdn.net/v/t1.6435-9/141258182_488347999230196_1385999023431067631_n.jpg?_nc_cat=106&ccb=1-5&_nc_sid=0debeb&_nc_eui2=AeGy1qzjIMuuyAk0fUbtt5hRCMSyRbn9XVMIxLJFuf1dU1aw8fULQtBRi-cUzjSIvY-4da8mrXtjEg8P8_-5AH6x&_nc_ohc=X-a9zO4LY6wAX89Yjx0&_nc_ht=scontent.furt3-1.fna&oh=00_AT8meo6chB_aAZpt1EBU4SsHvuwTKT6WnRknBkthOmxnXA&oe=61E546D9' class='card-img-top' >"
                line += "<h5 class='card-title my-3 '>" + place + "</h5>";
                line += "<p class='card-text'>อุณหภูมิ : " + temp + "</p>";
                line += "<p class='card-text'>ความชื้นสัมพัทธ์ : " + humid + "</p>";
                line += "<p class='card-text'>อาทิตย์ขึ้นเวลา : " + sunrise + "</p>";
                line += "<p class='card-text'>อาทิตย์ตกเวลา : " + sunset + "</p>";
                line += "<p class='card-text'>ณ เวลา: " + datetime + "</p>";
                line += "</div>"
                $("#cardWeather").append(line);
            }).fail((xhr, status, error) => { })
    }
    function LoadForcast() {
        var lat = $("#Latitude").val();
        var long = $("#Longitude").val();
        var url = "https://api.openweathermap.org/data/2.5/weather?lat=" + lat + "&lon=" + long + "&appid=5027d32a6595c47215bce1fef98e1b2b"
        $.getJSON(url)
            .done((data) => {
                var datetime = convertHMS(data.dt);
                var sunrise = convertHMS(data.sys["sunrise"]);
                var sunset = convertHMS(data.sys["sunset"]);
                var place = (data.name);
                var windSpeed = (data.wind["speed"]);
                var temp = ((data.main["temp"] - 273).toFixed(0) + " °C");
                var humid = (data.main["humidity"] + "%");
                $.each(data.weather[0], (key, value) => {
                    for (let i = 0; i < (data.weather[0]).length; i++) {
                        console.log(value);
                    }
                })
                var line = "<div id='dataWeather'>";
                line += "<img src='https://f.ptcdn.info/956/054/000/p0aptc4qcArP51VCQh5-s.jpg' class='card-img-top' ><div class='card-body'>"
                line += "<h5 class='card-title my-3'> " + place + "</h5>";
                line += "<p class='card-text'>อุณหภูมิ : " + temp + "</p>";
                line += "<p class='card-text'>ความชื้นสัมพัทธ์ : " + humid + "</p>";
                line += "<p class='card-text'>อาทิตย์ขึ้นเวลา : " + sunrise + "</p>";
                line += "<p class='card-text'>อาทิตย์ตกเวลา : " + sunset + "</p>";
                line += "<p class='card-text'>ณ เวลา: " + datetime + "</p>";
                line += "</div>"
                $("#cardWeather").append(line);
            }).fail((xhr, status, error) => { })
    }

    function convertHMS(value) {
        let time = value;
        var convert = new Date(time * 1000);
        var hours = convert.getHours();
        var minutes = "0" + convert.getMinutes();
        var seconds = "0" + convert.getSeconds();
        return (hours + ':' + minutes.substr(-2) + ':' + seconds.substr(-2));

    }



    $(() => {
        setmap();
        $("#btnSearch").click(() => {
            LoadForcast();
            $("#dataWeather").hide();

        });
    });
</script>

</html>
