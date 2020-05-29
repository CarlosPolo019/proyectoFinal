import { HospitalesService } from './../../../services/hospitales.service';
import { Hospitales } from 'src/model/hospitales.model';
import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';


@Component({
  selector: 'app-listar-hospital',
  templateUrl: './listar-hospital.component.html',
  styleUrls: ['./listar-hospital.component.css']
})
export class ListarHospitalComponent implements OnInit {

  hospitales: Hospitales[];

  constructor(private _hospitalService:HospitalesService,private router : Router) { }

  ngOnInit(){

   this.listarHospitales();
  }

  listarHospitales(){
    this._hospitalService.obtenerHospitales().subscribe((data:Hospitales[]) => { 
     this.hospitales = data;
      console.log(this.hospitales);
  });

  }

eliminar(hospital:Hospitales):void {
   
    this._hospitalService.borrarHospital(hospital.id)
    .subscribe(data => {      
      this.ngOnInit();
    });
  }

 editar(hospital:Hospitales) {
    window.localStorage.setItem("editPacienteId", hospital.id.toString());
    this.router.navigate(['hospital/editar']);
  }

  agregarPaciente(){
    this.router.navigate(['hospital/agregar']);
  }
  
 
}
