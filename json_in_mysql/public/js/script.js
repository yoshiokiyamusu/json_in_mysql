/* JavaScript DOM TUTORIAL: https://www.youtube.com/watch?v=JlgLDfINXvY */
document.addEventListener('DOMContentLoaded', function(){//para cargar todos los DOM

   var $name_input_phone = ""; //para crear un name al input box del phone number
   var $i = 1;//para contar los click en agregar extra phone numbers
   
   const addForm = document.forms['add-usuario'];///formulario
   const phone_list = addForm.querySelector('#phone-list');
   const add_phone_button = addForm.querySelector('.add_phone_button');

     add_phone_button.addEventListener('click', function(e){
      $i = $i + 1;
     console.log('apretaste el boton' + $i);
     e.preventDefault();//no hay refresh de pagina

     // create elements
     const div_one = document.createElement('div');
     const label = document.createElement('label');
     const div_dos = document.createElement('div');
     const input = document.createElement('input');

     //add clasees
     div_one.setAttribute("class", "form-group row");
     label.setAttribute("class", "col-sm-4 col-form-label");
     label.textContent = 'Extra Phone number';
     div_dos.setAttribute("class", "col-sm-5");
     input.setAttribute("class", "form-control");
     input.setAttribute("type", "text");
     $name_input_phone = "numero_" + $i;
     input.setAttribute("name", $name_input_phone);


     // append to DOM
     div_one.appendChild(label);
     div_dos.appendChild(input);
     div_one.appendChild(div_dos);
     phone_list.appendChild(div_one);

   });//addForm.addEventListener

});//DOM content load
