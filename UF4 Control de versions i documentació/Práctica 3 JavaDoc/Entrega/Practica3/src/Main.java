/**
 * Proyecto: calculadora
 *
 * @author [Daniel Ceban]
 * @version [1.0]
 * @fecha [17/10/2023]
 *
 * Este proyecto contiene una calculadora básica y una calculadora avanzada que pueden ser utilizadas para realizar operaciones matemáticas.
 *
 * La calculadora básica permite realizar las operaciones de suma, resta, multiplicación y división.
 *
 * La calculadora avanzada permite realizar las operaciones de raíz cuadrada y potencia.
 *
 * La clase Main proporciona un punto de entrada para utilizar las dos calculadoras.
 */

public class Main {
	
	public static void main(String[] args) {
		
        Calculadora calculadora = new Calculadora(10, 2);
        
        calculadora.cambiarNumeros(15, 8);
        
        System.out.println("CALCULADORA\n");
        
        System.out.println("Numeros: " + calculadora.getNum1() + " y " + calculadora.getNum2() + "\n");

        System.out.println("Suma: " + calculadora.sumar());
        System.out.println("Resta: " + calculadora.restar());
        System.out.println("Multiplicación: " + calculadora.multiplicar());

        try {
            System.out.println("División: " + calculadora.dividir());
        } catch (DivisionPorCeroException e) {
            System.out.println("División: " + e.getMessage());
        }

        CalculadoraAvanzada calculadoraAvanzada = new CalculadoraAvanzada(13, 5);

        System.out.println("\n\nCALCULADORA AVANZADA\n");
        
        System.out.println("Numeros: " + calculadoraAvanzada.getNum1() + " y " + calculadoraAvanzada.getNum2() + "\n");
        
        System.out.println("Raíz cuadrada: " + calculadoraAvanzada.raizCuadrada());
        System.out.println("Potencia: " + calculadoraAvanzada.potencia());
		
	}
	
}