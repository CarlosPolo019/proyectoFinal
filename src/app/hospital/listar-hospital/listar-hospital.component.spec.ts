import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ListarHospitalComponent } from './listar-hospital.component';

describe('ListarHospitalComponent', () => {
  let component: ListarHospitalComponent;
  let fixture: ComponentFixture<ListarHospitalComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ListarHospitalComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ListarHospitalComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
