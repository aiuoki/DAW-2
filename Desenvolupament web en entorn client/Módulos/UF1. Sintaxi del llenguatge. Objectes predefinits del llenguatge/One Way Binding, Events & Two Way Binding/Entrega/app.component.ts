import { Component } from '@angular/core';

interface Personaje {
  nombre?: string;
  fuerza?: number;
  destreza?: number;
  inteligencia?: number;
  constitucion?: number;
}

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {

  fichaPersonaje: Personaje = {}
  personajeGuardado: Personaje = {}

  nombres: string[] = ['Ernesto','Calisto','Lorenzo','Alexis','Adolfo','Gabriel','Fidel','Emiliano','Alfonso','Juan Antonio',
    'Margarita','Francisca','Iraida','Rut','Alondra','Maricarmen','Mireya','Aroa','Estela','Octavia','Luna'];

  numAleatorio(): number {
    return Math.floor(Math.random()*21);
  }

  botonGenerar(): void {
    this.fichaPersonaje.nombre = this.nombres[this.numAleatorio()];
    this.fichaPersonaje.fuerza = this.numAleatorio();
    this.fichaPersonaje.destreza = this.numAleatorio();
    this.fichaPersonaje.inteligencia = this.numAleatorio();
    this.fichaPersonaje.constitucion = this.numAleatorio();
  }

  botonGuardar(): void {
    this.personajeGuardado.nombre = this.fichaPersonaje.nombre;
    this.personajeGuardado.fuerza = this.fichaPersonaje.fuerza;
    this.personajeGuardado.destreza = this.fichaPersonaje.destreza;
    this.personajeGuardado.inteligencia = this.fichaPersonaje.inteligencia;
    this.personajeGuardado.constitucion = this.fichaPersonaje.constitucion;
  }

}
