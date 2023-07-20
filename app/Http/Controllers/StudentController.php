<?php

namespace App\Http\Controllers;

use domain\Facades\StudentFacade;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StudentController extends ParentController
{
  public function index ()
  {
    return Inertia::render('Pages/Student/Index');
  }

  public function create ()
  {
    return Inertia::render('Pages/Student/Create');
  }

  public function edit($student_id)
  {
    $student = StudentFacade::get($student_id);
    return Inertia::render('Pages/Student/Edit', [
        'student' => $student,
    ]);
  }

  public function store (Request $request)
  {
    StudentFacade::store($request->all());
    return Inertia::render('Pages/Student/Index');
  }

  public function list ()
  {
    $students = StudentFacade::list();
    return response()->json($students);
  }

  public function delete ($student_id)
  {
    return StudentFacade::delete($student_id);
  }

  public function status ($student_id)
  {
    return StudentFacade::status($student_id);
  }

  public function update(Request $request, $student_id)
  {
    return StudentFacade::update($request->all(), $student_id);
    return Inertia::render('Pages/Student/Index');
  }
}