/**
 * Proyecto: calculadora
 *
 * @author [Daniel Ceban]
 * @version [1.0]
 * @fecha [17/10/2023]
 * 
 * Calculadora avanzada que permite realizar las operaciones de raíz cuadrada y potencia de números reales.
 *
 * Esta clase extiende la clase Calculadora, proporcionando dos métodos adicionales que permiten realizar las operaciones de raíz cuadrada y potencia de números reales.
 *
 * @see Calculadora
 */
public class CalculadoraAvanzada extends Calculadora {
	
    public CalculadoraAvanzada(double num1, double num2) {
        super(num1, num2);
    }
	
    /**
     * Calcula la raíz cuadrada de un número real.
     *
     * @return Raíz cuadrada del número.
     *
     * @see Math#sqrt(double)
     *
     * Ejemplo:
     *
     * ```
     * CalculadoraAvanzada calculadora = new CalculadoraAvanzada(16);
     * double raizCuadrada = calculadora.raizCuadrada();
     *
     * System.out.println(raizCuadrada); // 4
     * ```
     */
	public double raizCuadrada() {
        return (double) Math.sqrt(getNum1());
    }
	
	/**
     * Calcula la potencia de un número real a otro número real.
     *
     * @return Potencia del número.
     *
     * @see Math#pow(double, double)
     *
     * Ejemplo:
     *
     * ```
     * CalculadoraAvanzada calculadora = new CalculadoraAvanzada(2, 3);
     * double potencia = calculadora.potencia();
     *
     * System.out.println(potencia); // 8
     * ```
     */
    public double potencia() {
        return (double) Math.pow(getNum1(), getNum2());
    }
    
}