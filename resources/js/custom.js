$(document).ready(function(){
    $.getJSON("https://restcountries.eu/rest/v2/all", function (result) {
        var countries = result;
        var options = '';
        var continentOptions = '';
        var allContinents = [];
        for(var i = 0; i < countries.length; i++){
            options += "<option value='" + countries[i].name + "'>";
            allContinents.push(countries[i].region);
        }

        var uniqueContinents = [];
            $.each(allContinents, function(i, el){
            if($.inArray(el, uniqueContinents) === -1) uniqueContinents.push(el);
            });

        for(var i = 0; i < uniqueContinents.length; i++){
            continentOptions += "<option value='" + uniqueContinents[i] + "'>";
        }
      
        document.getElementById('countries').innerHTML = options;
        document.getElementById('continents').innerHTML = continentOptions;
    })
});