import { Component, OnInit,ViewChild, TemplateRef } from '@angular/core';
import {PruebaServicioService} from './services/prueba-servicio.service';
import { NgbModal } from '@ng-bootstrap/ng-bootstrap';
import { ProductoI } from './interface/producto.interface';
@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent implements OnInit {
  productos: any ;
  producto2:any;
  productoNuevo:ProductoI;
  listaprod:ProductoI[];
  producto={
    id:null,
    nombre: '',
    descripcion:'',
    precio:0
  };
  @ViewChild("myModalInfo", { static: false })
  myModalInfo!: TemplateRef<any>;
  constructor(private pruebaServicio: PruebaServicioService, private modalService: NgbModal) { 
    this.listaprod=[{
      id:0,
      nombre:'',
      descripcion:'',
      precio:0
    }];
    this.productoNuevo={
      id:0,
      nombre:'',
      descripcion:'',
      precio:0
    }
  }

  ngOnInit() {
   
    this.getProductos();
  }
  mostrarModalInfo(){
    this.modalService.open(this.myModalInfo);
  }
  getProductos() {
    this.pruebaServicio.getProductos().subscribe(
      data => {
        this.productos = data;
        console.log('datos',this.productos);

      }
    );
  }
  getProducto(idProducto: any) {
    this.pruebaServicio.getProducto(idProducto).subscribe(
      result => {
        
        this.producto2=result,
        console.log(this.producto2);
        
      } 
    );
    
  }

  addProducto() {
    this.pruebaServicio.addProducto(this.producto).subscribe(
      data => {
          console.log('data',this.producto);
          
        }
    );
  }

  deleteProducto(idProducto: any) {
    this.pruebaServicio.deleteProducto(idProducto).subscribe(
      datos => {
       console.log(idProducto);
       
          this.getProductos();
        
      }
    );
  }

  updateProducto() {
   
    this.productoNuevo.id=this.producto2[0].id;
    this.productoNuevo.nombre=this.producto2[0].nombre;
    this.productoNuevo.descripcion=this.producto2[0].descripcion;
    this.productoNuevo.precio=this.producto2[0].precio;
     this.pruebaServicio.updateProducto(this.productoNuevo).subscribe(
      res=>{
        console.log(res);
        this.getProductos();
        
      }
    );
    

  }

  hayRegistros() {
    if(this.productos == null) {
      return false;
    } else {
      return true;
    }
  }

}

