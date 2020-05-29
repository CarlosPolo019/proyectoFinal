import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css']
})
export class HomeComponent implements OnInit {


    constructor(private router: Router) { }


  ngOnInit(): void {
  }


onPress(num){

switch (num){
  case 1:
    this.router.navigate(['hospital/listar']);

  break;
   case 2:
    this.router.navigate(['paciente/listar']);

  break;
   case 3:
    this.router.navigate(['doctor/listar']);

  break;
   case 4:
    this.router.navigate(['triage/']);

  break;

}


}



}
