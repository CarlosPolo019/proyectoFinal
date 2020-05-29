import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { AgregarHospitalComponent } from './agregar-hospital.component';

describe('AgregarHospitalComponent', () => {
  let component: AgregarHospitalComponent;
  let fixture: ComponentFixture<AgregarHospitalComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ AgregarHospitalComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(AgregarHospitalComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
