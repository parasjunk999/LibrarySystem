<?php

namespace App\Http\Controllers;

use App\Models\IssueLibraryCard;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class IssueLibraryCardController extends Controller
{
    public function index()
    {
        $issueLibraryCards = IssueLibraryCard::with('student')->get();
        return view('issue_library_cards.index', compact('issueLibraryCards'));
    }
    public function create()
    {
        $students = Student::all();
        return view('issue_library_cards.create', compact('students'));
    }

    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'student_id' => [
                    'required',
                    Rule::unique('issue_library_cards')->where(function ($query) use ($request) {
                        return $query->where('student_id', $request->student_id)
                            ->whereNull('deleted_at'); // Check for non-deleted records
                    }),
                ],
                'card_no' => [
                    'required',
                    Rule::unique('issue_library_cards')->where(function ($query) use ($request) {
                        return $query->where('card_no', $request->card_no)
                            ->whereNull('deleted_at'); // Check for non-deleted records
                    }),
                ],
                'issue_date' => 'required|date',
                'card_status' => 'required|in:issued,returned',
            ]);

            IssueLibraryCard::create($request->all());

            return redirect()->route('issue-library-cards-corner')->with('success', 'Library card issued successfully');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }
    public function edit($id)
    {
        $issueLibraryCard = IssueLibraryCard::findOrFail($id);
        $students = Student::all();
        return view('issue_library_cards.edit', compact('issueLibraryCard', 'students'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'student_id' => 'required',
            'card_no' => [
                'required',
                Rule::unique('issue_library_cards')->ignore($id),
            ],
            'issue_date' => 'required|date',
            'card_status' => 'required|in:issued,returned',
        ]);

        $issueLibraryCard = IssueLibraryCard::findOrFail($id);
        $issueLibraryCard->update($request->all());

        return redirect()->route('issue-library-cards-corner')->with('success', 'Library card updated successfully');
    }

    public function destroy($id)
{
    $issueLibraryCard = IssueLibraryCard::findOrFail($id);
    $issueLibraryCard->delete();

    return redirect()->route('issue-library-cards-corner')->with('success', 'Library card deleted successfully');
}

}

