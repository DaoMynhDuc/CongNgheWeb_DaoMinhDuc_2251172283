<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Issue;
use App\Models\Computer;

class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $issues = Issue::with('Computer')->paginate(10); // Lấy 10 bản ghi mỗi trang
        return view('issues.index', compact('issues'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $computers = Computer::all(); // Lấy danh sách sinh viên để chọn
        return view('issues.create', compact('computers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'computer_id' => 'required|exists:computers,id',
            'reported_by' => 'required|max:255',
            'reported_date' => 'required',
            'urgency' => 'required|max:255',
            'status' => 'required|max:255',
        ]);

        Issue::create($request->all());

        return redirect()->route('issues.index')->with('success', 'Bản ghi được thêm công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $issue = Issue::findOrFail($id);
        $computers = Computer::all(); // Lấy danh sách sinh viên để chọn
        return view('issues.edit', compact('issue', 'computers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'computer_id' => 'required|exists:computers,id',
            'reported_by' => 'required|max:255',
            'reported_date' => 'required',
            'urgency' => 'required|max:255',
            'status' => 'required|max:255',
        ]);

        $issue = Issue::find($id);
        $issue->update($request->all());

        return redirect()->route('issues.index')->with('success', 'Bản ghi được cập nhật công!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $issue = Issue::find($id);
        $issue->delete();
        return redirect()->route('issues.index')->with('success', 'Bản ghi được xóa công!');
    }
}
