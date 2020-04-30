import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { StudentsService } from '../students.service';
import { Router } from '@angular/router';


@Component({
  selector: 'app-add',
  templateUrl: './add.component.html',
  styleUrls: ['./add.component.css']
})
export class AddComponent implements OnInit {
 
  constructor(private formBuilder: FormBuilder,  private _studentService: StudentsService,private router: Router) { }
  addForm: FormGroup;

  ngOnInit(): any {
    this.addForm = this.formBuilder.group({
      // sId:[],
      fname: ['', Validators.required],
      lname: ['', [Validators.required, Validators.maxLength(30)]],
      email: ['', [Validators.required, Validators.maxLength(30)]]
    });
  }

  onSubmit(){
    console.log(this.addForm.value);
    this._studentService.addStudents(this.addForm.value)
    .subscribe( data => {
      this.router.navigate(['/']);
    })  
  }
 
}


