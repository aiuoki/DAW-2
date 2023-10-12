import { Component } from '@angular/core';

interface Character {
  name: string;
  strength: number;
  agility: number;
  intelligence: number;
  life: number;
  editable?: boolean;
}

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {

  serverCharacters: Character[] = [];

  _editable: boolean[] = [true, true, true, true, true];
  _btnValue: string[] = ["Edit", "Edit", "Edit", "Edit", "Edit"];
  _paragrafo: string = "";

  boton(posArray: number): void {
    this._editable[posArray] = !this._editable[posArray];

    this._paragrafo = `{"name":"${this.serverCharacters[posArray].name}","strength":${this.serverCharacters[posArray].strength},
      "agility":${this.serverCharacters[posArray].agility},"intelligence":${this.serverCharacters[posArray].intelligence},
      "life":${this.serverCharacters[posArray].life},"editable":${!this._editable[posArray]}}`;

    if (this._editable[posArray] == true) {
      this._btnValue[posArray] = "Edit";
    } else {
      this._btnValue[posArray] = "Save";
    }
  }

  constructor() {
    // Ejemplo de respuesta de un servidor en formato JSON
    const serverJson = `[
      {"name": "Jugger", "strength": 18, "agility": 12, "intelligence": 6, "life": 30 },
      {"name": "Pelegrin", "strength": 20, "agility": 8, "intelligence": 6, "life": 40 },
      {"name": "Dorthak", "strength": 12, "agility": 18, "intelligence": 10, "life": 16 },
      {"name": "Kharak", "strength": 8, "agility": 20, "intelligence": 12, "life": 14 },
      {"name": "Perz", "strength": 10, "agility": 6, "intelligence": 20, "life": 10 }
    ]`;

    // Parseamos la información y la convertimos directamente en un array de "Character"
    this.serverCharacters = JSON.parse(serverJson);
  }
}
