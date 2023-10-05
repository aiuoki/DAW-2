import { Component } from '@angular/core';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {

  _text: string = "Sample Text";
  _disabled: boolean = true;
  _inputText: string = "";

  botonClickado(event: any): void {
    console.log(event)
  }

}
