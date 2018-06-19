function Request(url, metodo, mensaje, callback) {
  /*
  Para realizar la Request es necesaria una peticion asincronica.
  */
  var asincronica = true;
  /*
  Se crea la peticion y la abrimos indicando metodo y url.
  */
  var xhr = new XMLHttpRequest();
  xhr.open(metodo, url, asincronica);
  /*
  Se envia el header de la peticion.
  */
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  /*
  Cuando cambie el estado de la peticion ejecutamos una funcion.
  */
  xhr.onreadystatechange = function() {
      if(xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
        /*
        Se ejecuta la funcion de callback, por la cual utilizamos la respuesta
        en la pagina html que envio el Request.
        */
        callback(xhr.responseText);
      }
  }
  /*
  Se envia el mensaje al servidor.
  */
  xhr.send(mensaje);
}
