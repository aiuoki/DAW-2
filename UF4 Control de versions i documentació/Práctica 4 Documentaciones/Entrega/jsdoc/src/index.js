const { sumar, restar, multiplicar, dividir } = require("./calculadora");

/**
 * @file index.js es el punto de entrada de la aplicación
 * @author Daniel Ceban
 * @version 1.0
 */

/**
 * Nombre
 * @type {string}
 */
const nombre = 'Daniel';

/**
 * Array de temperaturas
 * @type {Array<number>}
 */
const temperatura = [16, 18.5, 20, 24, 25];

/**
 * Objeto persona
 * @type {{id: number, nombre: string}}
 */
const persona = {
    id: 1,
    nombre: 'Daniel'
};

/**
 * Alumno
 * @typedef {Object} Alumno
 * @property {number} id - Id del alumno
 * @property {string} nombre - Nombre del alumno
 * @property {string} apellidos - Apellidos del alumno
 * @property {number} [edad] - Edad del alumno
 */

/**
 * @type {Alumno}
 */
const alumno = {
    id: 1,
    nombre: 'Daniel',
    apellidos: 'Ceban',
    edad: 19
};

/**
 * Clase para crear un objeto persona
 */
class Persona {
    /**
     * 
     * @param {Object} informacionPersona Informacion sobre la persona
     */
    constructor(informacionPersona) {
        /**
         * @property {string} nombre - Nombre de la persona
         */
        this.nombre = informacionPersona.nombre;
        /**
         * @property {number} edad - Edad de la persona
         */
        this.edad = informacionPersona.edad;
    }

    /**
     * @property {Function} mostrarDatos - Muestra los datos de la persona
     * @returns void
     */
    mostrarDatos() {
        console.log(`Nombre: ${this.nombre} Edad: ${this.edad}`);
    }
}

/**
 * Persona 1
 * See {@link Persona}
 */
const persona1 = new Persona({
    nombre: 'Daniel',
    edad: 19
});

console.log(sumar(10, 20));