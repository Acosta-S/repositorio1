let numero1 = prompt("Ingrese un numero");
numero1 = Number.parseInt(numero1);
let operacion = prompt("Ingrese una operacion");
let numero2 = prompt("Ingrese un segundo numero");
numero2 = Number.parseInt(numero2);

function calcular (numero1, operacion, numero2){
    if (operacion == '+'){
        return numero1 + numero2;
    }
    else if (operacion == '-'){
        return numero1 - numero2;
    }
    else if (operacion == '*'){
        return numero1 * numero2;
    }
    else if (operacion == '/' && numero2 > 0){
        return numero1 / numero2;
    }else{
        
    }
};
let resultado = calcular(numero1, operacion, numero2);
console.log(resultado);
