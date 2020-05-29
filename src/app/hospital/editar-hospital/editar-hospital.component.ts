import { Router } from '@angular/router';
import { FormBuilder, Validators } from '@angular/forms';
import { FormGroup } from '@angular/forms';
import { Component, OnInit } from '@angular/core';
import { HospitalesService } from './../../../services/hospitales.service';

@Component({
  selector: 'app-editar-hospital',
  templateUrl: './editar-hospital.component.html',
  styleUrls: ['./editar-hospital.component.css']
})
export class EditarHospitalComponent implements OnInit {

editForm : FormGroup;

 options = [
    { name: "SELECCIONE SU EPS", value: 0 }, 
    { name: "SURA", value: 1 },
    { name: "COOMEVA", value: 2 },
    { name: "SUSALUD", value: 1 },
    { name: "CAFESALUD", value: 2 },
    { name: "VIVA1A", value: 2 }
  ];

  constructor(private formBuilder:FormBuilder,private router:Router,private apiService:HospitalesService) { }


  ngOnInit(): void {
    
    let pacienteId = window.localStorage.getItem("editPacienteId");
    this.editForm = this.formBuilder.group({
       id: [],
      nombre: ['', Validators.required],
      nombre_representante: ['', Validators.required],
      telefono: ['', Validators.required],
      direccion: ['', Validators.required],
      nit: ['', Validators.required],
    });

    if(!pacienteId) {
      alert("Ocurrio un error.")
      this.router.navigate(['']);
      return;
    }else{
      this.cargarDetalleHospital(pacienteId)
    }

  }

  cargarDetalleHospital(id:string){
    
    this.apiService.detalleHospital(id)
    .subscribe( data => { 
      this.editForm.setValue(data);
    });
  }


close(){
          this.router.navigate(['hospital/listar']);

}

  onSubmit(){
    
    this.apiService.editarHospital(this.editForm.value)   
    .subscribe(
      data => {
        if(data["resultado"] == "OK"){
          alert(data["mensaje"]);
          this.router.navigate(['hospital/listar']);
        }
      });

}

}
