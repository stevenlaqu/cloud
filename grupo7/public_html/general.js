function sendFormContact() {
    var i1 = document.getElementById("i1").value;
    var i2 = document.getElementById("i2").value;
    var i3 = document.getElementById("i3").value;
    var i4 = document.getElementById("i4").value;
    var i5 = document.getElementById("i5").value;

    var json = "{ ";
    json += '"id_sensorhumedad":' + i1 + ", ";
    json += '"lectura": ' + i2 + ", ";
    json += '"fecha": "' + i3 + '",';
    json += '"ult_intervalo": "' + i4 + '",';
    json += '"flg_motivoriego": "' + i5 + '" } ';
    console.log(json);
    var msg = json;
    sendFormData(msg, 'InsertarRegHumedad.php');
}
function sendFormData(msg, url) {
    var xhr = new XMLHttpRequest();
    xhr.open('post', url);
    xhr.responseType = "text";
    //xhr.setRequestHeader("Content-Type", "text/plain;charset=UTF-8");
    xhr.onreadystatechange = function (e) {
        if (xhr.status == 200 && xhr.readyState == 4) {


                alert("Â¡Mensaje Enviado! " + xhr.responseText);



        }
    };
    xhr.send(msg);
}
