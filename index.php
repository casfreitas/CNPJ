<script>
//valida o CNPJ digitado
function ValidarCNPJ(ObjCnpj){
        var cnpj = ObjCnpj.value;
        var valida = new Array(6,5,4,3,2,9,8,7,6,5,4,3,2);
        var dig1= new Number;
        var dig2= new Number;
        
        exp = /\.|\-|\//g
        cnpj = cnpj.toString().replace( exp, "" ); 
        var digito = new Number(eval(cnpj.charAt(12)+cnpj.charAt(13)));
                
        for(i = 0; i<valida.length; i++){
                dig1 += (i>0? (cnpj.charAt(i-1)*valida[i]):0);  
                dig2 += cnpj.charAt(i)*valida[i];       
        }
        dig1 = (((dig1%11)<2)? 0:(11-(dig1%11)));
        dig2 = (((dig2%11)<2)? 0:(11-(dig2%11)));
        
        if(((dig1*10)+dig2) != digito)  
                alert('CNPJ Invalido!');
                
}


function txtBoxFormat(strField, sMask, evtKeyPress) {
    var i, nCount, sValue, fldLen, mskLen,bolMask, sCod, nTecla;
   
    if(document.all) { // Internet Explorer
        nTecla = evtKeyPress.keyCode;
    }
    else if(document.layers) { // Nestcape
        nTecla = evtKeyPress.which;
    }
    else if(document.getElementById) { // FireFox
        nTecla = evtKeyPress.which;
    }
   
    if (nTecla != 8) {
   
    sValue = document.getElementById(strField).value;
   
    // Limpa todos os caracteres de formatação que
    // já estiverem no campo.
    sValue = sValue.toString().replace( "-", "" );
    sValue = sValue.toString().replace( "-", "" );
    sValue = sValue.toString().replace( ".", "" );
    sValue = sValue.toString().replace( ".", "" );
    sValue = sValue.toString().replace( "/", "" );
    sValue = sValue.toString().replace( "/", "" );
    sValue = sValue.toString().replace( "(", "" );
    sValue = sValue.toString().replace( "(", "" );
    sValue = sValue.toString().replace( ")", "" );
    sValue = sValue.toString().replace( ")", "" );
    sValue = sValue.toString().replace( " ", "" );
    sValue = sValue.toString().replace( " ", "" );
    sValue = sValue.toString().replace( ":", "" );
    fldLen = sValue.length;
    mskLen = sMask.length;
   
    i = 0;
    nCount = 0;
    sCod = "";
    mskLen = fldLen;
   
    while (i <= mskLen) {
    bolMask = ((sMask.charAt(i) == "-") || (sMask.charAt(i) == ".") || (sMask.charAt(i) == "/"))
    bolMask = bolMask || ((sMask.charAt(i) == "(") || (sMask.charAt(i) == ")") || (sMask.charAt(i) == " "))
    bolMask = bolMask || (sMask.charAt(i) == ":")
   
    if (bolMask) {
    sCod += sMask.charAt(i);
    mskLen++; }
    else {
    sCod += sValue.charAt(nCount);
    nCount++;
    }
   
    i++;
    }
   
    //objForm[strField].value = sCod;
    document.getElementById(strField).value = sCod;
   
    if (nTecla != 8) { // backspace
        if (sMask.charAt(i-1) == "9") { // apenas números...
            return ((nTecla > 47) && (nTecla < 58)); } // números de 0 a 9
        else { // qualquer caracter...
            return true;
        }
    }
    else {
        return true;
    }
    }
}
</script>







MODO DE USAR:
<form action="" method="post" id="formPJ" enctype="multipart/form-data">

<input name="cnpj" type="text" id="cnpj" onBlur="ValidarCNPJ(formPJ.cnpj);"  onKeyPress="return txtBoxFormat(this.id, '99.999.999/9999-99',event);" maxlength="18" />