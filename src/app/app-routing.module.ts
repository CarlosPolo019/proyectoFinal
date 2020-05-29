import { EditarPacienteComponent } from './paciente/editar-paciente/editar-paciente.component';
import { AgregarPacienteComponent } from './paciente/agregar-paciente/agregar-paciente.component';
import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { ListPacienteComponent } from './paciente/list-paciente/list-paciente.component';
import { HomeComponent } from './home/home.component';
import { AgregarDoctorComponent } from './doctor/agregar-doctor/agregar-doctor.component';
import { EditarDoctorComponent } from './doctor/editar-doctor/editar-doctor.component';
import { ListDoctorComponent } from './doctor/list-doctor/list-doctor.component';
import { AgregarHospitalComponent } from './hospital/agregar-hospital/agregar-hospital.component';
import { EditarHospitalComponent } from './hospital/editar-hospital/editar-hospital.component';
import { ListarHospitalComponent } from './hospital/listar-hospital/listar-hospital.component'; 


const routes: Routes = [

  { path: "doctor/listar", component: ListDoctorComponent },
  { path: "doctor/agregar", component: AgregarDoctorComponent },
  { path: "doctor/editar", component: EditarDoctorComponent },
  { path: "paciente/listar", component: ListPacienteComponent },
  { path: "paciente/agregar", component: AgregarPacienteComponent },
  { path: "paciente/editar", component: EditarPacienteComponent },
  { path: "hospital/listar", component: ListarHospitalComponent },
  { path: "hospital/agregar", component: AgregarHospitalComponent },
  { path: "hospital/editar", component: EditarHospitalComponent },
  { path: "home", component: HomeComponent },
  { path: "", component: HomeComponent },
  
  
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }

