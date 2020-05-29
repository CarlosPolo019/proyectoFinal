import { HospitalesService } from './../../../services/hospitales.service';
import { Component, OnInit } from '@angular/core';
import {FormBuilder, Validators, FormGroup} from "@angular/forms";
import { Router } from '@angular/router';



@Component({
  selector: 'app-agregar-hospital',
  templateUrl: './agregar-hospital.component.html',
  styleUrls: ['./agregar-hospital.component.css']
})
export class AgregarHospitalComponent implements OnInit {

  addForm:FormGroup;
  
  constructor(private formBuilder: FormBuilder,private router: Router,private apiService: HospitalesService) { }

  ngOnInit(): void {
    this.addForm = this.formBuilder.group({
      id: [],
      nombre: ['', Validators.required],
      nombre_representante: ['', Validators.required],
      telefono: ['', Validators.required],
      direccion: ['', Validators.required],
      nit: ['', Validators.required],
    });

  }

  close(){

  this.router.navigate(['hospital/listar']);

  }

  onSubmit(){
    
    let form = this.addForm.value;
    console.log(form)

      this.apiService.crearHospital(this.addForm.value)
    .subscribe( data => {
      if(data["resultado"] == "OK"){
        
          this.router.navigate(['hospital/listar']);
        }
    });

  }


}
