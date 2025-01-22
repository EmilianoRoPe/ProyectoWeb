const formula=document.getElementById('formula');
const inputs=document.querySelectorAll('#formula input');

const expre={
    nombre: /^[A-Z][a-zA-ZÀ-ÿ\s]{2,39}$/, // Letras y espacios, pueden llevar acentos.  /^[a-zA-ZÀ-ÿ\s]{3,40}$/
	apellidos: /^[A-Z][a-zA-ZÀ-ÿ]{2,39}$/,    ///^[a-zA-ZÀ-ÿ]{3,40}$/,
    bole: /^(PE|PP|\d{2})\d{8}$/,
    curp: /^[A-Z]{4}\d{6}[HM]{1}[A-Z]{5}[0-9A-Z]{2}$/,
	correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	tele: /^\d{10}$/, // Solo 8 números
    numeroext: /^([1-9]|[1-9][0-9])$/,
    Copos: /^\d{5}$/,
    fechanac: /^(199[0-9]|200[0-9])-(0[1-9]|1[0-2])-(0[1-9]|1[0-9]|2[0-9]|3[01])$/
}

const campoval={
    nombre: false,
    apellido1: false,
    apellido2: false,
    boleta: false,
    curp: false,
    correo: false,
    telefono: false,
    Num: false,
    CP: false,
    fechanac: false
}

const Validar=(x)=>{
    switch(x.target.name){
        case "nombre":
            validarCampo(expre.nombre,x.target,'nombre');
        break;
        case "apellido1":
            validarCampo(expre.apellidos,x.target,'apellido1');
        break;
        case "apellido2":
            validarCampo(expre.apellidos,x.target,'apellido2');
        break;
        case "curp":
            validarCampo(expre.curp,x.target,'curp');
        break;
        case "Num":
            validarCampo(expre.numeroext,x.target,'Num');
        break;
        case "CP":
            validarCampo(expre.Copos,x.target,'CP');
        break;
        case "telefono":
            validarCampo(expre.tele,x.target,'telefono');
        break;
        case "Correo":
            validarCampo(expre.correo,x.target,'correo');
        break;
        case "boleta":
            validarCampo(expre.bole,x.target,'boleta');
        break;
        case "fechanac":
            if(expre.fechanac.test(x.target.value)){
                console.log("fecha correcta");
                document.getElementById('group_fechanac').classList.remove('form-group-incorrecto');
                document.getElementById('group_fechanac').classList.add('form-group-correcto');
                document.querySelector('#group_fechanac .formulario_input-error').classList.remove('formulario_input-error-ac'); 
                campoval.fechanac = true;  
            }else{
                console.log("fecha no valida");
                document.getElementById('group_fechanac').classList.add('form-group-incorrecto');
                document.getElementById('group_fechanac').classList.remove('form-group-correcto');
                document.querySelector('#group_fechanac .formulario_input-error').classList.add('formulario_input-error-ac'); 
                campoval.fechanac = false;  
            }
        break;
    }
}


const validarCampo=(expresion,input,campo)=>{
    if(expresion.test(input.value)){
        console.log('correcto');
        document.getElementById(`group_${campo}`).classList.remove('form-group-incorrecto');
        document.getElementById(`group_${campo}`).classList.add('form-group-correcto');
        document.querySelector(`#group_${campo} i`).classList.add('fa-circle-check');
        document.querySelector(`#group_${campo} i`).classList.remove('fa-circle-xmark');
        document.querySelector(`#group_${campo} .formulario_input-error`).classList.remove('formulario_input-error-ac'); 
        campoval[campo] = true;  
        
    }else{
        document.getElementById(`group_${campo}`).classList.add('form-group-incorrecto');
        document.getElementById(`group_${campo}`).classList.remove('form-group-correcto');
        document.querySelector(`#group_${campo} i`).classList.add('fa-circle-xmark');
        document.querySelector(`#group_${campo} i`).classList.remove('fa-circle-check');
        document.querySelector(`#group_${campo} .formulario_input-error`).classList.add('formulario_input-error-ac'); 
        console.log('error de sintaxis');
        campoval[campo] = false;  
    }
}



inputs.forEach((input)=>{
    input.addEventListener('keyup', Validar);
    input.addEventListener('blur', Validar);
}); //Esta funcion se va a ejecutar por cada input de la pagiSna, ya que cuando termine de escribir el dato, evaluara si esta correcto o no cada campo.


function ValidarFormula(){
    var estadoresidencia = document.getElementById("edop").value;
    var disc = document.getElementById("discapacidad").value;
    var escu = document.getElementById("escuelas").value;


    if(campoval.nombre && campoval.apellido1 && campoval.apellido2 && campoval.curp && campoval.Num && campoval.CP && campoval.telefono && campoval.correo && campoval.boleta && campoval.fechanac){
        if($("#discapacidad").val()==="Otro" && $("#otroDiscapacidad").val()===""){
            console.log('error discapacidad');
            alert("Por favor, ingrese información en el campo 'Otro Discapacidad'");
            document.getElementById('form_mensaje').classList.add('form_mensaje-activo');
            return false; 
        }
        if($("#escuelas").val()==="Otro" && $("#otroEscuela").val()===""){
            console.log('error escuelas');
            alert("Por favor, ingrese información en el campo 'Otro Escuela'");
            document.getElementById('form_mensaje').classList.add('form_mensaje-activo');
            return false; 
        }
        if(estadoresidencia===""){
            console.log('error residencia.');
            alert("Por favor, seleccione un estado de residencia.");
            document.getElementById('form_mensaje').classList.add('form_mensaje-activo');
            return false; 
        }
        if(disc===""){
            console.log('error en seleccionar discapacidad.');
            alert("Por favor, determine si tiene alguna discapacidad o no.");
            document.getElementById('form_mensaje').classList.add('form_mensaje-activo');
            return false; 
        }
        if(escu===""){
            console.log('error seleccionar escuela.');
            alert("Por favor, determine de que escuela se graduo.");
            document.getElementById('form_mensaje').classList.add('form_mensaje-activo');
            return false; 
        }
        else{
            console.log('se hizo correctamente');
            window.location.href="../controladores/procesar.php";
            return true;
        }
        
    }
    else{
        console.log('error en algun campo');
        document.getElementById('form_mensaje').classList.add('form_mensaje-activo');
        return false;
        
    }
}


function limpiarFormula(){
    document.getElementById("formula").reset();
    document.querySelectorAll('.form-group-correcto').forEach((icono)=>{
        icono.classList.remove('form-group-correcto');
    });
}

