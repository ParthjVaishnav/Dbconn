<?php
namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;


class Studentcontroller extends Controller
{
    // To push data into the database
    public function getinfo(Request $request)
    {
        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->address = $request->address;
        $student->save();

        if ($student) {
            return redirect('show-data');
        }
    }

    // To display data on the UI
    public function showData()
    {
        $students = Student::paginate(4); // Fetch student data with pagination
        return view('show-data', ['students' => $students]); // Pass data to the view
    }

    // For deleting a record
    public function delete($id)
    {
        Student::destroy($id); // Use Eloquent to delete the record
        return redirect('show-data');
    }

    // To edit a record
    public function edit($id)
    {
        $student = Student::find($id);
        return view('edit-student', ['data' => $student]);
    }

    // To update the edited details in the database
    public function editStudent(Request $request, $id)
    {
        $student = Student::find($id);

        if (!$student) {
            return redirect('show-data')->with('error', 'Student not found');
        }

        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->address = $request->address;

        $student->save();

        return redirect('show-data')->with('success', 'Student updated successfully');
    }

    // For searching data
    public function search(Request $request)
    {
        $students = Student::where('name', 'like', "%$request->search%")->paginate(4);
        return view('show-data', ['students' => $students, 'search' => $request->search]);
    }

    // For deleting multiple records
    public function muldlt(Request $request)
    {
        $deleted = Student::destroy($request->ids);
        if ($deleted) {
            return redirect('show-data');
        } else {
            return "Unsuccessful";
        }
    }
    public function sendTestMail(Request $request)
{
    $validated = $request->validate([
        'from_email' => 'required|email',
        'to_email' => 'required|email',
        'created_at' => 'required|date',
        'updated_at' => 'required|date',
    ]);

    // Send the email
    Mail::to($validated['to_email'])->send(new TestMail(
        $validated['from_email'],
        $validated['to_email'],
        $validated['created_at'],
        $validated['updated_at']
    ));

    return back()->with('success', 'Mail sent successfully!');
}
}

