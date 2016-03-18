/**
 * Created by Reinaldo on 27/02/2016.
 */

  function mascara(t, tipo){
    var mask = "";
    //
    switch (tipo)
    {
        case "cep"  :
            mask = "#####-###";
            break;
        case "cnpj"  :
            mask = "##.###.###/####-##";
            break
        case "data"  :
            mask = "##/##/####";
            break
        case "telefone"  :
            mask = "## ####-####";
            break
        case "celular"  :
            mask = "## #####-####";
            break
    }


    var i = t.value.length;
    var saida = mask.substring(1,0);
    var texto = mask.substring(i)
    if (texto.substring(0,1) != saida){
        t.value += texto.substring(0,1);
    }
}


/**
 * Created by Reinaldo on 27/02/2016.
 */
