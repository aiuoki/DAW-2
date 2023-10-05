interface Producto {
  nombre: string;
  precio: number;
  oferta?: boolean;
}

const productos: Producto[] = [
  {nombre: "Camisa", precio: 60},
  {nombre: "Pantalones", precio: 45, oferta: true},
  {nombre: "Polo", precio: 35},
  {nombre: "Slip", precio: 15, oferta: true}
];

function mostrarProductosOferta(productos: Producto[]): void {
    console.log(`=============================================`);
    console.log(`Productos en oferta:\n`);
    for (const producto of productos) {
        if (producto.oferta) {
            console.log(`[Nombre: ${producto.nombre} | Precio: ${producto.precio}]`);
        }
    }
    console.log(`=============================================\n\n`);
}

function mostrarProductosOrdenados(productos: Producto[]): void {
    productos.sort((a, b) => b.precio - a.precio);

    console.log(`=============================================`);
    console.log(`Productos ordenados de mayor a menor precio:\n`);

    for (const producto of productos) {
        console.log(`[Nombre: ${producto.nombre} | Precio: ${producto.precio}]`);
    }
    console.log(`=============================================`);
}

mostrarProductosOferta(productos);
mostrarProductosOrdenados(productos);