import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import {PruebaServicioService} from './services/prueba-servicio.service';
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { HttpClientModule } from '@angular/common/http';
import { FormsModule } from '@angular/forms';
import { ModalComponent } from './modal/modal.component';
import { NgbModule } from '@ng-bootstrap/ng-bootstrap';

@NgModule({
  declarations: [
    AppComponent,
    ModalComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,  
    HttpClientModule,
    FormsModule,
    NgbModule

  ],
  providers: [
    PruebaServicioService
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
