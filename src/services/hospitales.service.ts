import { Injectable } from '@angular/core';
import {HttpClient} from '@angular/common/http';
import { Observable } from 'rxjs';
import { Hospitales } from 'src/model/hospitales.model';


@Injectable({
  providedIn: 'root'
})
export class HospitalesService {

 constructor(private http:HttpClient) { }


obtenerHospitales(){
    return this.http.get<Hospitales[]>('http://localhost/backend-angular/hospital/listarhospital.php')
  }

   borrarHospital(id:string) : Observable<HospitalesService>{
    return this.http.get<HospitalesService>('http://localhost/backend-angular/hospital/eliminarhospital.php?id='+id);
  }


crearHospital(hospital:Hospitales): Observable<HospitalesService>  {    
    
    return this.http.post<HospitalesService>('http://localhost/backend-angular/hospital/insertarhospital.php', JSON.stringify(hospital));
  }

  editarHospital(hospital:Hospitales): Observable<HospitalesService>  {    
    
    return this.http.post<HospitalesService>('http://localhost/backend-angular/hospital/editarhospital.php', JSON.stringify(hospital));
  }


detalleHospital(id:string) : Observable<HospitalesService>{
    return this.http.get<HospitalesService>('http://localhost/backend-angular/hospital/detallehospital.php?id='+id);
  }

}
