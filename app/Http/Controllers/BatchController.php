<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Batch;
use App\Models\Course;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class BatchController extends Controller
{
    public function index(): View
    {
        $batches = Batch::all();
        return view ('batches.index')->with('batches', $batches);
    }

    public function create(): View
    {
        $courses = Course::all();
        return view('batches.create',['courses'=> $courses]);
    }

    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        Batch::create($input);
        return redirect('batches')->with('flash_message', 'batch Added!');
    }

    public function show(string $id): View
    {
        $batches = Batch::find($id);
        return view('batches.show')->with('batches', $batches);
    }

    public function edit(string $id): View
    {
        $batches = Batch::find($id);
        return view('batches.edit')->with('batches', $batches);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $batches = Batch::find($id);
        $input = $request->all();
        $batches->update($input);
        return redirect('batches')->with('flash_message', 'batch Updated!');
    }

    public function destroy(string $id): RedirectResponse
    {
        Batch::destroy($id);
        return redirect('batches')->with('flash_message', 'batch deleted!');
    }
}
?>