<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMedicalFileRequest;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateMedicalFileRequest;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function store(StoreStudentRequest $request){
        $student=Student::query()->create($request->validated());
        return $this->Success($student,201,'Student created succeffully');

    }

    public function StoreMedicalFileForStudent(StoreMedicalFileRequest $request,$id){
        $student=Student::query()->findOrFail($id);
        if ($student->medicalFile()->exists()) {
        return $this->success(null,'Student already has a medical file', 409);
    }
    $medicalFile = $student->medicalFile()->create($request->validated());
    return $this->success($medicalFile, 201, 'Medical file created successfully for student');
    }

    public function getStudentWithMedicalFile($id)
    {
        $student = Student::with('medicalFile')->findOrFail($id);
        return $this->success($student, 200, 'Student with medical file retrieved successfully');
    }

    public function getMedicalFileByStudent($id){
    $student = Student::with('medicalFile')->findOrFail($id);
    if (!$student->medicalFile) {
        return $this->success(null,'Medical file not found', 404);
    }

    return $this->success($student->medicalFile, 200, 'Medical file retrieved successfully');
    }


    public function updateMedicalFile(UpdateMedicalFileRequest $request,$id) {
        $student = Student::with('medicalFile')->findOrFail($id);

        if (!$student->medicalFile) {
            return $this->success( null,'Medical file not found', 404);
        }

        $student->medicalFile->update($request->validated());

        return $this->success($student->medicalFile, 200, 'Medical file updated successfully');
    }



}
