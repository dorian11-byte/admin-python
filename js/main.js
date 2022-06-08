const inputs = document.querySelectorAll(".input");


function addcl(){
	let parent = this.parentNode.parentNode;
	parent.classList.add("focus");
}

function remcl(){
	let parent = this.parentNode.parentNode;
	if(this.value == ""){
		parent.classList.remove("focus");
	}
}


inputs.forEach(input => {
	input.addEventListener("focus", addcl);
	input.addEventListener("blur", remcl);
});

function validarform(){
	var formulario = document.addForm;

	if(formulario.password.value != formulario.cpassword.value){
		document.getElementById("alert").innerHTML = '<div class="alert alert-danger"<a href="" class="close" data-data-dismiss="alert">&times;</a> Contraseñas Diferentes </div>';
		formulario.password.value = "";
		formulario.cpassword.value = "";
		formulario.password.focus();
		return false;
	} else {
		document.getElementById("alert").innerHTML = "";
	}
}






