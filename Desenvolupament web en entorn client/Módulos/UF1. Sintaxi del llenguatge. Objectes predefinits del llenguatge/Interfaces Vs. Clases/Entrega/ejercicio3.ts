class Cafetera {

    private _capacidadMaxima: number;
    private _cantidadActual: number;

    constructor(capacidadMaxima: number = 1000, cantidadActual: number = 0) {
        this._capacidadMaxima = capacidadMaxima;
        this._cantidadActual = cantidadActual;
    }
    
    get getCapacidadMaxima(): number {
        return this._capacidadMaxima;
    }

    get getCantidadActual(): number {
        return this._cantidadActual;
    }

    set setCapacidadMaxima(capacidadMaxima: number) {
        this._capacidadMaxima = capacidadMaxima;
    }

    set setCantidadActual(cantidadActual: number) {
        this._cantidadActual = cantidadActual;
    }

    llenarCafetera(): void {
        this._cantidadActual = this._capacidadMaxima;
    }
    
    servirTaza(cantidad: number): void {
        if(cantidad > this._cantidadActual) {
            this._cantidadActual = 0;
        } else {
            this._cantidadActual -= cantidad;
        }
    }

    vaciarCafetera(): void {
        this._cantidadActual = 0;
    }

    agregarCafe(cantidad: number): void {
        this._cantidadActual += cantidad;
    }

}

let cafetera = new Cafetera(2000, 1500);
console.log(`Capacidad maxima: ${cafetera.getCapacidadMaxima}\nCantidad actual: ${cafetera.getCantidadActual}`);

cafetera.llenarCafetera();
console.log(`Cantidad actual: ${cafetera.getCantidadActual}`);

cafetera.servirTaza(50);
console.log(`Cantidad actual: ${cafetera.getCantidadActual}`);

cafetera.vaciarCafetera();
console.log(`Cantidad actual: ${cafetera.getCantidadActual}`);

cafetera.agregarCafe(450);
console.log(`Cantidad actual: ${cafetera.getCantidadActual}`);