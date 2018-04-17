function preview_image_foto(event){
    var reader = new FileReader();
    reader.onload = function(){
        var output = document.getElementById('output_image_foto');
        output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}

function preview_image_cedula(event){
    var reader = new FileReader();
    reader.onload = function(){
        var output = document.getElementById('output_image_cedula');
        output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}

function preview_image_planilla(event){
    var reader = new FileReader();
    reader.onload = function(){
        var output = document.getElementById('output_image_planilla');
        output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}

function preview_image_carnet(event){
    var reader = new FileReader();
    reader.onload = function(){
        var output = document.getElementById('output_image_carnet');
        output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}