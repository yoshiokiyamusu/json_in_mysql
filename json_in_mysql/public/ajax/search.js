
document.addEventListener('DOMContentLoaded', function(){


    const addForm = document.forms['buscar_input'];
    const searchboton = addForm.querySelector('.cla_busca_boton');

    searchboton.addEventListener('click', function(e){
      e.preventDefault();//no hay refresh de pagina

      render_tabla();
    });



      function render_tabla() {
        const addForm = document.forms['buscar_input'];
        var $search_val = addForm.querySelector('#inputsearch').value;

        var target = document.querySelector('#tablebody');
        var url = 'public/ajax/searchdos.php?buscar=' + $search_val;


        //crear objeto XMLHttpRequest
        var xhr = new XMLHttpRequest();
        xhr.open('GET', url, true);
        //open request
        xhr.onreadystatechange = function () {

          if(xhr.readyState == 2) {
            target.innerHTML = 'Loading..a.';
          }
          if(xhr.readyState == 4 && xhr.status == 200) {
            target.innerHTML = xhr.responseText;

          }
        }
        xhr.send();//se llena cuando se usa POST method
      }//END funcion




});//DOM content load
