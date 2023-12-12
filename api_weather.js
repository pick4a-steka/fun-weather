document.addEventListener('DOMContentLoaded', function () {
    function getWeatherByCity(id) {
        const apiUrl = `https://api.openweathermap.org/data/2.5/weather?id=${id}&appid=569fea614b986fe4d815fc66e3cb0b3a`;

        fetch(apiUrl)
        .then(function (resp) { return resp.json() })
        .then(function (data) {
            console.log(data);

            document.querySelector('.package-name').textContent = data.name;
            document.querySelector('.temperature').innerHTML = Math.round(data.main.temp - 273) + '&deg;';
            document.querySelector('.disclaimer').textContent = data.weather[0]['description'];
            document.querySelector('.icon-weather').src = `http://openweathermap.org/img/wn/${data.weather[0]['icon']}@2x.png`;
        
            document.querySelector('.package-name').classList.add('package-name');
            document.querySelector('.temperature').classList.add('temperature');
            document.querySelector('.disclaimer').classList.add('disclaimer');
            //document.querySelector('.hr-weather').classList.add('hr-weather');
        })
        .catch(function() {
            console.log("Error");
        })
    }

    getWeatherByCity(498817);

    // Добавляем обработчик события для кнопки
    document.getElementById('btn-get-weather').addEventListener('click', function () {
        // Получаем выбранный город из выпадающего списка
        var selectedCity = document.getElementById('city-select').value;
        var id = 404;

        if (selectedCity == "spb") id = 498817;
        else if (selectedCity == "moscow") id = 524894;

        console.log("Selected City:", selectedCity);
        console.log("Corresponding ID:", id);

        // Вызываем функцию для получения данных о погоде по выбранному городу
        getWeatherByCity(id);
    });
});