  function marca(txt){
    txt.focus();
    txt.select();
    return false;
  }
  function ponealfinal(txt)
  {
    txt.value=txt.value;
  }
  
  function borrar()
  {
    
	var frm = document.getElementById("formulario");
	for (i=0;i<frm.elements.length;i++)
	{
	    if (frm.elements[i].type=='text'||frm.elements[i].type=='password'){
	       frm.elements[i].value='';
	    }
		
	}
    document.getElementById('consulta').style.display='none';
	
  }
  
  function numero(e)
  {
     key = e.keyCode || e.which;
     tecla = String.fromCharCode(key).toLowerCase();
     letras = "1234567890";
     especiales = [8,9,40];
     tecla_especial = false
     for(var i in especiales){
         if(key == especiales[i]){
          tecla_especial = true;
          break;
         } 
     }
     
            if(letras.indexOf(tecla)==-1 && !tecla_especial)
            {
               // alert('Se aceptan solo numeros');
                return false;
            }
            else {
                return true;
            }

  } 
  function letra(e) 
  {
    
     key = e.keyCode || e.which;
     tecla = String.fromCharCode(key).toLowerCase();
     letras = "áéíóúabcdefghijklmnñopqrstuvwxyz ";
     especiales = [8,9,40];
     
     tecla_especial = false
     for(var i in especiales){
         if(key == especiales[i]){
            tecla_especial = true;
            break;
         } 
     }
     
            if(letras.indexOf(tecla)==-1 && !tecla_especial){
             // alert('No se aceptan numeros');  
              return false;       
            }
            else {
                return true;
            }
         


  }
  function decimal(e) 
  {
    
     key = e.keyCode || e.which;
     tecla = String.fromCharCode(key).toLowerCase();
     letras = "1234567890.";
     especiales = [8,9,40];
     
     tecla_especial = false
     for(var i in especiales){
         if(key == especiales[i]){
            tecla_especial = true;
            break;
         } 
     }
     
            if(letras.indexOf(tecla)==-1 && !tecla_especial){
           //   alert('Solo numeros y .');  
              return false;       
            }
            else {
                return true;
            }
         


  }
  function ambos(e) 
  {
    
     key = e.keyCode || e.which;
     tecla = String.fromCharCode(key).toLowerCase();
     letras = "áéíóúabcdefghijklmnñopqrstuvwxyz1234567890@._- ";
     especiales = [8,9,40];
     
     tecla_especial = false
     for(var i in especiales){
         if(key == especiales[i]){
              tecla_especial = true;
              break;
         } 
     }
     
            if(letras.indexOf(tecla)==-1 && !tecla_especial){
                return false;
            }
            else {
                return true;
            }
                

  }
  
  function mayuscula(p){
    var a = p.selectionStart;
    var c = p.value;
    p.value = c.toUpperCase();
    p.selectionStart = a;
    p.selectionEnd = a;
    return p;
  }

  function getRandomColor() {
  var letters = '0123456789ABCDEF'; /*For anyone who is looking to limit the spectrum to light colors, 
                                      you can set the letters to '789ABCD' and reduce the multiplier 
                                      to letters[Math.round(Math.random() * 6)];. Just to note that I removed
                                       the low and high range just to avoid the extreme colors i.e. white and black.
                                    */          
  var color = '#';                  
  for (var i = 0; i < 6; i++) {
    color += letters[Math.floor(Math.random() * 16)];
  }
  return color;
  }
  
  $(document).ready(function() {
        $("input[name$='discapacidad']").click(function() {
            var test = $(this).val();

            $("div.form-group-text").hide();
            $("#"+test).show();
        });
    });

  $('input.single-checkbox').on('change', function(evt) {
            var limit = 2;
            if($("input[name='id_disciplina[]']:checked").length > limit) {
                this.checked = false;
            }
        });

  $(document).ready(function(){
            var requiredCheckboxes = $('.checkbox-group :checkbox');
            requiredCheckboxes.on('change', function(){
                if(requiredCheckboxes.is(':checked')) {
                    requiredCheckboxes.removeAttr('required');
                } else {
                    requiredCheckboxes.attr('required', 'required');
                }
            });
        });