//campo obrigatório

function CampoObrigatorio(ObjParam){

         if(ObjParam.value == ''){

				 return false;

				 }else{

				 return true;

				 }

	}

 //número obrigatório

function NumeroObrigatorio(ObjParam){

         if(!CampoObrigatorio(ObjParam)){

				 return false;

         }else if(isNaN(ObjParam.value)){

				 return false;

				 }else{

				 return true;

		}

}

//checando radio

function ValidaRadio(ante,qtd){

				 var Temp;

				 for(var x=0;x<=qtd;x++){

				 Temp=eval(ante+x);

				 if(Temp.checked){

				 break;

			}

	}

	if (x<=qtd){

	return true;

	}else{

	return false;

}

}

//validando select

function ValidaOption(ObjParam){

         for(var x=0;x<ObjParam.length;x++){

				 if(ObjParam(x).checked){

				 break;

			}

	}

	if(x<ObjParam.length){

	return true;

	}else{

	return false;

	}

}

//valida checkbox

function ValidaCheck(StrPre,Qtd){

 var objTemp;

 for(var x=0;x<=Qtd;x++){

 objTemp = eval(StrPre + x);

  if(objTemp.checked){

	break;

	  }

	}

	if(x<=Qtd){

	return true;

	 }else{

	 return false;

	 }

	}

