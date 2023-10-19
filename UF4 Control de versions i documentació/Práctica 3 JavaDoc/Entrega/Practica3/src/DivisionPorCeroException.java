/**
 * Proyecto: calculadora
 *
 * @author [Daniel Ceban]
 * @version [1.0]
 * @fecha [17/10/2023]
 * 
 * Excepción que se lanza cuando se intenta dividir por cero.
 *
 * Se lanza esta excepción porque dividir por cero no tiene sentido matemático.
 *
* Ejemplo:
 *
 * ```
 * try {
 *     Calculadora calculadora = new Calculadora();
 *     double division = calculadora.dividir(10, 2);
 *     
 *     System.out.println(division); // 5
 * } catch (DivisionPorCeroException e) {
 *     System.out.println(e.getMessage()); // No se puede dividir por cero
 * }
 * ```
 */
public class DivisionPorCeroException extends Exception {
	
	public DivisionPorCeroException() {
		super("No se puede dividir por cero");
    }
	
}