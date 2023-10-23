import { Component } from '@angular/core';

interface Character {
  name: string;
  strength: number;
  agility: number;
  intelligence: number;
  life: number;
  _btnEdit: boolean;
  _valueBtnEdit: string;
  _btnShow: boolean;
  _valueBtnShow: string;
}

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {

  serverCharacters: Character[] = [];
  _paragrafo: string = "";

  btnEdit(character: Character): void {
    character._btnEdit = !character._btnEdit;

    this._paragrafo = `{"name":"${character.name}","strength":${character.strength},
      "agility":${character.agility},"intelligence":${character.intelligence},
      "life":${character.life},"editable":${!character._btnEdit}}`;

    if(character._btnEdit == true) {
      character._valueBtnEdit = "Edit";
    } else {
      character._valueBtnEdit = "Save";
    }
  }

  btnShow(character: Character): void {
    character._btnShow = !character._btnShow;

    if(character._btnShow == true) {
      character._valueBtnShow = "Show";
    } else {
      character._valueBtnShow = "Hide";
    }
  }

  constructor() {
    // Ejemplo de respuesta de un servidor en formato JSON
    const serverJson = `[
      {"name": "Jugger", "strength": 18, "agility": 12, "intelligence": 6, "life": 30, "_btnEdit": true, "_valueBtnEdit": "Edit", "_btnShow": true, "_valueBtnShow": "Show" },
      {"name": "Pelegrin", "strength": 20, "agility": 8, "intelligence": 6, "life": 40, "_btnEdit": true, "_valueBtnEdit": "Edit", "_btnShow": true, "_valueBtnShow": "Show" },
      {"name": "Dorthak", "strength": 12, "agility": 18, "intelligence": 10, "life": 16, "_btnEdit": true, "_valueBtnEdit": "Edit", "_btnShow": true, "_valueBtnShow": "Show" },
      {"name": "Kharak", "strength": 8, "agility": 20, "intelligence": 12, "life": 14, "_btnEdit": true, "_valueBtnEdit": "Edit", "_btnShow": true, "_valueBtnShow": "Show" },
      {"name": "Perz", "strength": 10, "agility": 6, "intelligence": 20, "life": 10, "_btnEdit": true, "_valueBtnEdit": "Edit", "_btnShow": true, "_valueBtnShow": "Show" }
    ]`;

    // Parseamos la información y la convertimos directamente en un array de "Character"
    this.serverCharacters = JSON.parse(serverJson);
  }
}
