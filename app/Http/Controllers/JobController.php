<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{

    public static function search(int $perPage = 10) {
        $search = request('search');

        return Job::with('employer')
            ->when($search, function ($query) use ($search) {
                $searchTerm = '%' . $search . '%';
                $query->where(function ($q) use ($searchTerm) {
                    $q->where('title', 'like', $searchTerm)
                        ->orWhere('company', 'like', $searchTerm)
                        ->orWhere('description', 'like', $searchTerm)
                        ->orWhere('location', 'like', $searchTerm);
                })
                    ->orWhereHas('employer', function ($employerQuery) use ($searchTerm) {
                        $employerQuery->where('name', 'like', $searchTerm);
                    });
            })
            ->orderBy('updated_at', 'desc')
            ->simplePaginate($perPage);
    }
    public function index()
    {
        $jobs = $this->search();

        return view('jobs.index', [
            'jobs' => $jobs
        ]);
    }

    public function show(Job $job)
    {
        $employer = $job->employer;

        return view('jobs.show', [
            'job' => $job,
            'employer' => $employer
        ]);
    }

    public function create()
    {
        $search = request('search');

        $employers = EmployerController::search($search);

        return view('jobs.create', [
            'employers' => $employers
        ]);
    }

    public function store()
    {
        request()->validate([
            'title' => 'required',
            'company' => 'required',
            'location' => 'required',
            'salary' => ['required', 'numeric'],
            'email' => ['required', 'email'],
            'employer_id' => 'required'
        ]);

        Job::create([
            'title' => request('title'),
            'company' => request('company'),
            'location' => request('location'),
            'salary' => request('salary'),
            'description' => request('description'),
            'email' => request('email'),
            'employer_id' => request('employer_id')
        ]);

        return redirect('/jobs');
    }

    public function edit(Job $job)
    {
        $search = request('search');

        $employer = $job->employer;

        $employers = EmployerController::search($search);

        return view('jobs.edit', [
            'job' => $job,
            'employer' => $employer,
            'employers' => $employers
        ]);
    }

    public function update(Job $job)
    {
        request()->validate([
            'title' => 'required',
            'company' => 'required',
            'location' => 'required',
            'salary' => ['required', 'numeric'],
            'email' => ['required', 'email'],
            'employer_id' => 'required'
        ]);
    
        $job->update([
            'title' => request('title'),
            'company' => request('company'),
            'location' => request('location'),
            'salary' => request('salary'),
            'description' => request('description'),
            'email' => request('email'),
            'employer_id' => request('employer_id')
        ]);
    
        return redirect('/jobs/' . $job->id);
    }

    public function destroy(Job $job)
    {
        $job->delete();

        return redirect('/jobs');
    }
}
