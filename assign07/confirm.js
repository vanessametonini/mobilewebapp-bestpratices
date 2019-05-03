/* function for add lectures and create a localStorage */
function addPalestra(palestra){
	if(!localStorage.getItem("palestras")){
		array_palestras = new Array();
		array_palestras.push(palestra);
	}else{
		array_palestras=new Array();
		array_palestras=localStorage.getItem("palestras");
		array_palestras=array_palestras.split(",");
		for (cont=0;cont<array_palestras.length;cont=cont+1){
			if(array_palestras[cont]==palestra){
				array_palestras.splice(cont,1);
				verificador=false;
				break;
			}else{
				verificador=true;
			}
		}
		if (verificador){
			array_palestras.push(palestra);
		}
	}
	
	localStorage.setItem("palestras", array_palestras.join(","));
}

/*show by the alert window the selected lectures, have to be called by a onclick action in a button*/
function mostraLocalStorage(){alert(localStorage.palestras)}

/* clear all selected function */
function limpaLocalStorage(){
	var r=confirm("Are you sure?");
	if (r==true){
		localStorage.clear(); 
	}
	window.location.reload();
}

/* verify the checked lectures */
function verificaPalestras(){
	if(localStorage.getItem("palestras")){
		array_palestras=new Array();
		array_palestras=localStorage.getItem("palestras");
		array_palestras=array_palestras.split(",");
		for (cont=0;cont<array_palestras.length;cont=cont+1){
			palestra=array_palestras[cont];
			if(array_palestras[cont]==document.getElementById(palestra).id){
				document.getElementById(array_palestras[cont]).checked=true;
			}
		}
	}
}