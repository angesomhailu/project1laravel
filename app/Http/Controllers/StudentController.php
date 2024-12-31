<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class StudentController extends Controller
{
    public function index(): View
    {
        $students = Student::all();
        return view ('students.index')->with('students', $students);
    }

    public function create(): View
    {
        return view('students.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        Student::create($input);
        return redirect('students')->with('flash_message', 'student Added!');
    }

    public function show(string $id): View
    {
        $students = Student::find($id);
        return view('students.show')->with('students', $students);
    }

    public function edit(string $id): View
    {
        $students = Student::find($id);
        return view('students.edit')->with('students', $students);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $students = Student::find($id);
        $input = $request->all();
        $students->update($input);
        return redirect('students')->with('flash_message', 'students Updated!');
    }

    public function destroy(string $id): RedirectResponse
    {
        Student::destroy($id);
        return redirect('students')->with('flash_message', 'student deleted!');
    }
}
?>