class Persona {

    private _nombre: string;
    private _edad: number;
    private _dni: string;
    private _direccion: string;

    constructor(nombre: string = 'Daniel', edad: number = 19, dni: string = '49328439C', direccion: string = 'Avinguda Prat de la Riba, 8') {
        this._nombre = nombre;
        this._edad = edad;
        this._dni = dni;
        this._direccion = direccion;
    }
    
    get getNombre(): string {
        return this._nombre;
    }

    get getEdad(): number {
        return this._edad;
    }
    
    get getDni(): string {
        return this._dni;
    }

    get getDireccion(): string {
        return this._direccion;
    }

    set setNombre(nombre: string) {
        this._nombre = nombre;
    }

    set setEdad(edad: number) {
        this._edad = edad;
    }

    set setDni(dni: string) {
        this._dni = dni;
    }

    set setDireccion(direccion: string) {
        this._direccion = direccion;
    }

    mostrarInfo(): void {
        console.log(`[Nombre: ${this._nombre} | Edad: ${this._edad} | DNI: ${this._dni} | Dirección: ${this._direccion}]`);
    }

}

let persona = new Persona();
let johndoe = new Persona('John', 24, '29384923F', 'Avinguda Alcalde Rovira Roure, 22');
let camavinga = new Persona();

camavinga.setNombre = 'Camavinga';
camavinga.setEdad = 20;
camavinga.setDni = '92039581G';
camavinga.setDireccion = 'Plaça Ricard Vinyes, 4';

persona.mostrarInfo();
johndoe.mostrarInfo();
console.log(`Nombre: ${camavinga.getNombre}, Edad: ${camavinga.getEdad}`);