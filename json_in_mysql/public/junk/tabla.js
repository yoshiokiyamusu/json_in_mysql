document.addEventListener('DOMContentLoaded', function(){

    const tablamarco = document.querySelector('#data-table');
    rendertabla();

      function rendertabla() {
        var target = document.querySelector('#tablebody');
        var url = 'ajax/tabla.php';


        //crear objeto XMLHttpRequest
        var xhr = new XMLHttpRequest();
        xhr.open('GET', url, true);
        //open request
        xhr.onreadystatechange = function () {
          //console.log('readyState: ' + xhr.readyState );
          if(xhr.readyState == 2) {
            target.innerHTML = 'Loading...';
          }
          if(xhr.readyState == 4 && xhr.status == 200) {
            target.innerHTML = xhr.responseText;

          }
        }
        xhr.send();//se llena cuando se usa POST method
      }



});//DOM content load
