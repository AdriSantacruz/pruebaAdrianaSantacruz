import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { environment } from "../../environments/environment"
import { Productos } from '../class/productos';
@Injectable({
  providedIn: 'root'
})
export class PruebaServicioService {
  baseUrl = environment.baseUrl

  constructor(private http: HttpClient) { }

  getProductos() {
    return this.http.get(`${this.baseUrl}/get_products.php`);
  }

  getProducto(id: number) {
    return this.http.get(`${this.baseUrl}/get_product.php?id=${id}`);
  }

  addProducto(data:any) {
    return this.http.post(`${this.baseUrl}/add_products.php`,data);
  }

  deleteProducto(id: number) {
    return this.http.delete(`${this.baseUrl}/delete_products.php?id=${id}`);
  }

  updateProducto(producto:any) {
    return this.http.put(`${this.baseUrl}update_products.php`, JSON.stringify(producto));
    
    
  }
}