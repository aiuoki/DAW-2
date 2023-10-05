class Producto {

    private _nombre: string;
    private _numeroLote: number;

    constructor(nombre: string, numeroLote: number) {
        this._nombre = nombre;
        this._numeroLote = numeroLote;
    }

    get nombre(): string {
        return this._nombre;
    }

    set nombre(nombre: string) {
        this._nombre = nombre;
    }

    get numeroLote(): number {
        return this._numeroLote;
    }

    set numeroLote(numeroLote: number) {
        this._numeroLote = numeroLote;
    }

    mostrarInfo(): void {
        console.log(`Nombre: ${this._nombre}`);
        console.log(`Número de lote: ${this._numeroLote}`);
    }

}

class ProductoFresco extends Producto {

    private _fechaEnvasado: string;
    private _paisOrigen: string;

    constructor(nombre: string, numeroLote: number, fechaEnvasado: string, paisOrigen: string) {
        super(nombre, numeroLote);
        this._fechaEnvasado = fechaEnvasado;
        this._paisOrigen = paisOrigen;
    }

    get fechaEnvasado(): string {
        return this._fechaEnvasado;
    }

    set fechaEnvasado(fechaEnvasado: string) {
        this._fechaEnvasado = fechaEnvasado;
    }

    get paisOrigen(): string {
        return this._paisOrigen;
    }

    set paisOrigen(paisOrigen: string) {
        this._paisOrigen = paisOrigen;
    }

    mostrarInfo(): void {
        super.mostrarInfo();
        console.log(`Fecha de envasado: ${this._fechaEnvasado}`);
        console.log(`País de origen: ${this._paisOrigen}`);
    }

}

class ProductoRefrigerado extends Producto {

    private _codigoOrganismoSupervisionAlimentaria: string;

    constructor(nombre: string, numeroLote: number, codigoOrganismoSupervisionAlimentaria: string) {
        super(nombre, numeroLote);
        this._codigoOrganismoSupervisionAlimentaria = codigoOrganismoSupervisionAlimentaria;
    }

    get codigoOrganismoSupervisionAlimentaria(): string {
        return this._codigoOrganismoSupervisionAlimentaria;
    }

    set codigoOrganismoSupervisionAlimentaria(codigoOrganismoSupervisionAlimentaria: string) {
        this._codigoOrganismoSupervisionAlimentaria = codigoOrganismoSupervisionAlimentaria;
    }

    mostrarInfo(): void {
        super.mostrarInfo();
        console.log(`Código del organismo de supervisión alimentaria: ${this._codigoOrganismoSupervisionAlimentaria}`);
    }

}

class ProductoCongelado extends Producto {

    private _temperaturaCongelacionRecomendada: number;

    constructor(nombre: string, numeroLote: number, temperaturaCongelacionRecomendada: number) {
        super(nombre, numeroLote);
        this._temperaturaCongelacionRecomendada = temperaturaCongelacionRecomendada;
    }

    get temperaturaCongelacionRecomendada(): number {
        return this._temperaturaCongelacionRecomendada;
    }

    set temperaturaCongelacionRecomendada(temperaturaCongelacionRecomendada: number) {
        this._temperaturaCongelacionRecomendada = temperaturaCongelacionRecomendada;
    }

    mostrarInfo(): void {
        super.mostrarInfo();
        console.log(`Temperatura de congelación recomendada: ${this._temperaturaCongelacionRecomendada}`);
    }

}