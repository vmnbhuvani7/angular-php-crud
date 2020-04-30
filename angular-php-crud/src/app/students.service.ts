import { Injectable } from '@angular/core';
import { HttpClient} from '@angular/common/http';
import { Students } from './students';

// import { Observable } from 'rxjs/internal/Observable';
// import { Observable } from '@angular/common/http/http';
// import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class StudentsService {
  
  constructor(private http: HttpClient) { }

  getStudents(){
    return this.http.get<Students[]>('http://localhost/angular7php/list.php');
  }

  deleteStudentRecord(sId : number){
    return this.http.delete<Students[]>('http://localhost/angular7php/delete.php?sId='+ sId);
  }

  addStudents(student: Students ) { 
    return this.http.post('http://localhost/angular7php/insert1.php',student);
  } 

  getStudentById(sId: number){
    return this.http.get<Students[]>('http://localhost/angular7php/getById.php?sId='+ sId);
  }

  updateStudent(student: Students ) { 
    return this.http.put('http://localhost/angular7php/update.php'+'?sId='+ student.sId ,student);
  }
} 
