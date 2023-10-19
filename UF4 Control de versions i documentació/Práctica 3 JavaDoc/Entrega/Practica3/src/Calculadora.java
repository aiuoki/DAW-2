/**
 * Proyecto: calculadora
 *
 * @author [Daniel Ceban]
 * @version [1.0]
 * @fecha [17/10/2023]
 * 
 * Clase Calculadora que realiza operaciones matemáticas básicas.
 *
 * Esta clase proporciona métodos para sumar, restar, multiplicar y dividir dos números.
 */
public class Calculadora {
	
	private double num1;
	private double num2;
	
	public Calculadora() {
		this.num1 = 0;
		this.num2 = 0;
	}
	
	public Calculadora(double num1, double num2) {
		this.num1 = num1;
		this.num2 = num2;
	}
	
	public double getNum1() {
		return num1;
	}
	
	public double getNum2() {
		return num2;
	}
	
	public void setNum1(double num1) {
		this.num1 = num1;
	}
	
	public void setNum2(double num2) {
		this.num2 = num2;
	}
	
	public void cambiarNumeros(double num1, double num2) {
		this.num1 = num1;
		this.num2 = num2;
	}
	
	/**
	 * Suma dos números.
	 *
	 * @param num1 Primer número.
	 * @param num2 Segundo número.
	 * @return Suma de los dos números.
	 *
	 * Ejemplo:
	 *
	 * ```
	 * Calculadora calculadora = new Calculadora();
	 * double suma = calculadora.sumar(10, 20);
	 *
	 * System.out.println(suma); // 30
	 * ```
	 */
	public double sumar() {
		return num1 + num2;
	}
	
	/**
	 * Resta dos números.
	 *
	 * @param num1 Primer número.
	 * @param num2 Segundo número.
	 * @return Resta de los dos números.
	 *
	 * Ejemplo:
	 *
	 * ```
	 * Calculadora calculadora = new Calculadora();
	 * double resta = calculadora.restar(10, 20);
	 *
	 * System.out.println(resta); // -10
	 * ```
	 */
	public double restar() {
		return num1 - num2;
	}
	
	/**
	 * Multiplica dos números.
	 *
	 * @param num1 Primer número.
	 * @param num2 Segundo número.
	 * @return Multiplicación de los dos números.
	 *
	 * Ejemplo:
	 *
	 * ```
	 * Calculadora calculadora = new Calculadora();
	 * double multiplicacion = calculadora.multiplicar(10, 20);
	 *
	 * System.out.println(multiplicacion); // 200
	 * ```
	 */
	public double multiplicar() {
		return num1 * num2;
	}
	
	/**
	 * Divide dos números.
	 *
	 * @param num1 Primer número.
	 * @param num2 Segundo número.
	 * @return División de los dos números.
	 *
	 * @throws DivisionPorCeroException Si el segundo número es cero.
	 *
	 * Ejemplo:
	 *
	 * ```
	 * Calculadora calculadora = new Calculadora();
	 * double division = calculadora.dividir(10, 2);
	 *
	 * System.out.println(division); // 5
	 * ```
	 */
	public double dividir() throws DivisionPorCeroException {
        if (num2 == 0) {
            throw new DivisionPorCeroException();
        }
        return num1 / num2;
	}
	
}