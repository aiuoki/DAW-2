import { Component } from '@angular/core';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {

  botonGenerar(): void {
    fichaPersonaje.nombre = nombres[numAleatorio()];
    fichaPersonaje.fuerza = numAleatorio();
    fichaPersonaje.destreza = numAleatorio();
    fichaPersonaje.inteligencia = numAleatorio();
    fichaPersonaje.constitucion = numAleatorio();
  }

  botonGuardar(): void {
    personajeGuardado.nombre = fichaPersonaje.nombre;
    personajeGuardado.fuerza = fichaPersonaje.fuerza;
    personajeGuardado.destreza = fichaPersonaje.destreza;
    personajeGuardado.inteligencia = fichaPersonaje.inteligencia;
    personajeGuardado.constitucion = fichaPersonaje.constitucion;
  }

  protected readonly fichaPersonaje = fichaPersonaje;
  protected readonly personajeGuardado = personajeGuardado;

}

interface Personaje {
  nombre?: string;
  fuerza?: number;
  destreza?: number;
  inteligencia?: number;
  constitucion?: number;
}

let fichaPersonaje: Personaje = {}
let personajeGuardado: Personaje = {}

let nombres: string[] = ['Ernesto','Calisto','Lorenzo','Alexis','Adolfo','Gabriel','Fidel','Emiliano','Alfonso','Juan Antonio',
  'Margarita','Francisca','Iraida','Rut','Alondra','Maricarmen','Mireya','Aroa','Estela','Octavia','Luna'];

function numAleatorio(): number {
  return Math.floor(Math.random()*21);
}
