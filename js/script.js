function iniciarMap() {
  let coord = {
    lat: -32.9422419,
    lng: -60.6532294,
  };
  let map = new google.maps.Map(document.getElementById('map'), {
    zoom: 14,
    center: coord
  });
  let marker = new google.maps.Marker({
    position: coord,
    map: map
  });
}

// Campos de los formularios
const usuarioLogin = document.getElementById('userLogin'); 
const contraLogin = document.getElementById('passLogin');

usuarioLogin.required = "required";
contraLogin.required = "required";



function NumText(string){
  //solo letras y numeros
  var out = '';
  //Se añaden las letras validas
  var filtro = '@-_abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ1234567890'; //Caracteres validos

  for (var i=0; i<string.length; i++){
    if (filtro.indexOf(string.charAt(i)) != -1) {
      out += string.charAt(i);
    }
  }
  return out;
}