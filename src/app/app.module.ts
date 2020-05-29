import { BrowserModule } from '@angular/platform-browser';
 import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { ListPacienteComponent } from './paciente/list-paciente/list-paciente.component';
import { AgregarPacienteComponent } from './paciente/agregar-paciente/agregar-paciente.component';
import { HttpClientModule } from '@angular/common/http';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { EditarPacienteComponent } from './paciente/editar-paciente/editar-paciente.component';
import { HomeComponent } from './home/home.component';
import { AgregarDoctorComponent } from './doctor/agregar-doctor/agregar-doctor.component';
import { EditarDoctorComponent } from './doctor/editar-doctor/editar-doctor.component';
import { ListDoctorComponent } from './doctor/list-doctor/list-doctor.component';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { AgregarHospitalComponent } from './hospital/agregar-hospital/agregar-hospital.component';
import { EditarHospitalComponent } from './hospital/editar-hospital/editar-hospital.component';
import { ListarHospitalComponent } from './hospital/listar-hospital/listar-hospital.component'; 

@NgModule({
  declarations: [
    AppComponent,
    ListPacienteComponent,
    AgregarPacienteComponent,
    EditarPacienteComponent,
    HomeComponent,
    AgregarDoctorComponent,
    EditarDoctorComponent,
    ListDoctorComponent,
    AgregarHospitalComponent,
    EditarHospitalComponent,
    ListarHospitalComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule,
    FormsModule,
    ReactiveFormsModule,
    BrowserAnimationsModule
  ],
  providers: [],
  bootstrap: [AppComponent]

})
export class AppModule { }
