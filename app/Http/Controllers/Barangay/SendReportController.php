<?php

namespace App\Http\Controllers\Barangay;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;

class SendReportController extends Controller
{


    public function index()
    {
        $reports = Report::all();
        return view('Barangay.reports.index', compact('reports'));
    }

    public function create()
    {
        return view('barangay.reports.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'file' => 'required|file|mimes:jpg,jpeg,png,gif,pdf,doc,docx,xlsx|max:20480',
        ]);

        $report = new Report();
        $report->user_id = auth()->id();
        $report->title = $request->title;
        $report->description = $request->description;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('media/reports'), $filename);
            $report->file = $filename;
        }

        $report->save();

        return redirect()->route('send-reports.index')->with('success', 'Report created successfully.');
    }

    public function show()
    {
        $report = Report::with('user')->get();
        return view('admin.brgy.reports', compact('report'));
    }

    public function edit($id)
    {
        $report = Report::findOrFail($id);
        return view('barangay.reports.edit', compact('report'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,gif,pdf,doc,docx|max:20480',
        ]);

        $report = Report::findOrFail($id);
        $report->title = $request->title;
        $report->description = $request->description;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('media/reports'), $filename);
            $report->file = $filename;
        }

        $report->save();

        return redirect()->route('send-reports.index')->with('success', 'Report updated successfully.');
    }

    public function destroy($id)
    {
        $report = Report::findOrFail($id);
        $report->delete();
        return redirect()->route('send-reports.index')->with('success', 'Report deleted successfully.');
    }
}
