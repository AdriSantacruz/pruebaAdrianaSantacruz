import { Component, OnInit } from '@angular/core';
import {PruebaServicioService} from '../services/prueba-servicio.service';
@Component({
  selector: 'app-modal',
  templateUrl: './modal.component.html',
  styleUrls: ['./modal.component.css']
})
export class ModalComponent implements OnInit {
  
  producto2:any;
  constructor(private pruebaServicio: PruebaServicioService) { }

  ngOnInit(): void {
  }
  // updateProducto() {
  //   this.pruebaServicio.updateProducto(this.producto2).subscribe(
  //     datos => {
  //       console.log(datos);
        
        
  //     }
  //   );
  // }

  getProducto(idProducto: any) {
    this.pruebaServicio.getProducto(idProducto).subscribe(
      result => {
        this.producto2=result,
        console.log(this.producto2);
      }
      
      
    );
  }
}
