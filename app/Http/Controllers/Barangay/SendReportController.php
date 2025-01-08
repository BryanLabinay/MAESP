<?php

namespace App\Http\Controllers\Barangay;

use App\Http\Controllers\Controller;
use App\Models\Farmer;
use App\Models\Report;
use App\Models\User;
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
        $barangays = User::where('usertype', 'barangay')->get();
        return view('admin.brgy.reports', compact('barangays'));
    }

    public function reportsdetails($user_id)
    {
        $reports = Report::where('user_id', $user_id)->get();

        $barangay = User::where('id', $user_id)->where('usertype', 'barangay')->first();
        return view('admin.brgy.reports-details', compact('reports', 'barangay'));
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
