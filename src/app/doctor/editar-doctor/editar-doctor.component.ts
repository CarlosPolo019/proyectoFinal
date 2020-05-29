import { DoctoresApiService } from './../../../services/doctores.service';
import { Component, OnInit } from '@angular/core';
import {FormBuilder, Validators, FormGroup} from "@angular/forms";
import { Router } from '@angular/router';

@Component({
  selector: 'app-editar-doctor',
  templateUrl: './editar-doctor.component.html',
  styleUrls: ['./editar-doctor.component.css']
})

export class EditarDoctorComponent implements OnInit {

  
  editForm:FormGroup;
  hospitales = [];
  options = [
    { name: "O-", value: 1 },
    { name: "O+", value: 2 },
    { name: "A-", value: 3 },
    { name: "A+", value: 4 },
    { name: "B-", value: 5 },
    { name: "B+", value: 6 },
    { name: "AB-", value: 7 },
    { name: "AB+", value: 8 }
];

  constructor(private formBuilder: FormBuilder,private router: Router,private apiService: DoctoresApiService) { }

  ngOnInit(): void {

    this.cargarHospitales();
    this.editForm = this.formBuilder.group({
      id: [],
      nombre: ['', Validators.required],
      direccion: ['', Validators.required],
      telefono: ['', Validators.required],
      tipo_sangre: ['', Validators.required],
      id_hospital: ['', Validators.required],
      experiencia: ['', Validators.required],
      fecha_nacimiento: ['', Validators.required]
    });

    if(!window.localStorage.getItem("editDoctorId")) {
      alert("Ocurrio un error.")
      this.router.navigate(['doctor/listar']);
      return;
    }else{
      this.cargarDetalleDoctor(window.localStorage.getItem("editDoctorId"));
    }

  }

cargarHospitales(){
  this.apiService.obtenerHospitales()
    .subscribe( data => {
      console.log(data)
      data.map( (o)=> this.hospitales.push({name: o.nombre , value: o.id}));
    });

}

  close(){

	this.router.navigate(['doctor/listar']);

  }

  cargarDetalleDoctor(id:string){
    
    this.apiService.obtenerDoctorId(id)
    .subscribe( data => {
      console.log(data)

      this.editForm.setValue(data);
    });
  }

  onSubmit(){
    
    let form = this.editForm.value;
    console.log(form);

    this.apiService.editarDoctor(this.editForm.value)
    .subscribe( data => {
      if(data["resultado"] == "OK"){
       		alert(data["mensaje"]);
          this.router.navigate(['doctor/listar']);
        }
    });

  }


}

