import { Component, OnInit } from '@angular/core';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';
import { StudentsService } from '../students.service';
import { Router, Params, ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-edit',
  templateUrl: './edit.component.html',
  styleUrls: ['./edit.component.css']
})
export class EditComponent implements OnInit {

  constructor(private formBuilder: FormBuilder, private _studentService: StudentsService, private router: Router,
    private routes: ActivatedRoute ) { }

  addForm: FormGroup;

  ngOnInit(): any {
    const routeParams = this.routes.snapshot.params;
    console.log(routeParams.sId);

    this._studentService.getStudentById(routeParams.sId)
    .subscribe((data: any) => {
      console.log(data); 
      this.addForm.patchValue(data);
    });

    this.addForm = this.formBuilder.group({
      sId:[''],
      fname: ['', Validators.required],
      lname: ['', [Validators.required, Validators.maxLength(30)]],
      email: ['', [Validators.required, Validators.maxLength(30)]]
    }); 
  }

  onEdit() {
    // console.log(this.addForm.value);
    this._studentService.updateStudent(this.addForm.value)
    .subscribe(()=>{
      // this.router.navigate(['/']);
    },
    error=>{
      alert(error);
      
    });
  }

}
