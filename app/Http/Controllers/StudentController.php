<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function getStudentsData(Request $request)
    {
        $page = $request->input('page', 1);
        $limit = $request->input('rows', 10);
        $offset = ($page - 1) * $limit;
        $sortField = $request->input('sidx', 'name');
        $sortOrder = $request->input('sord', 'asc');
        $searchField = $request->input('searchField', '');
        $searchOper = $request->input('searchOper', '');
        $searchString = $request->input('searchString', '');

        $query = Student::query();

        if ($searchString && $searchOper && $searchField) {
            $query->where(function ($q) use ($searchField, $searchOper, $searchString) {
                $q->where($searchField, $searchOper, $searchString);
                // Anda bisa menambahkan kondisi pencarian lain di sini menggunakan OR atau AND
            });
        }

        $totalRecords = $query->count();

        $query->orderBy($sortField, $sortOrder);

        $data = $query->skip($offset)->take($limit)->get();

        $response = [
            'page' => $page,
            'total' => ceil($totalRecords / $limit),
            'records' => $totalRecords,
            'rows' => $data,
        ];

        return response()->json($response);
    }


    public function addStudent(Request $request)
    {
        // Validasi input sesuai kebutuhan Anda
        $this->validate($request, [
            'name' => 'required',
            'nis' => 'required|unique:students',
            'birthdate' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email',
            'class' => 'required',
            'school_year' => 'required',
            'registration_date' => 'required',
            'profile_photo' => 'max:5120',
            'notes' => 'required',
        ]);

        // Ambil data dari input form
        $data = $request->all();

        // Simpan data ke database
        $student = new Student();
        $student->fill($data);
        $student->save();

        // Buat respons data yang sesuai dengan format JqGrid
        $response = [
            'name' => $student->name,
            'nis' => $student->nis,
            'birthdate' => $student->birthdate,
            'gender' => $student->gender,
            'address' => $student->address,
            'phone_number' => $student->phone_number,
            'email' => $student->email,
            'class' => $student->class,
            'school_year' => $student->school_year,
            'registration_date' => $student->registration_date,
            'profile_photo' => $student->profile_photo,
            'notes' => $student->notes,
        ];

        // Berikan respons ke client dalam format JSON
        return response()->json(['success' => true, 'message' => 'Student added successfully', 'data' => $response]);
    }


    public function getEditStudent(Request $request)
    {
        $studentId = $request->input('id');

        $student = Student::find($studentId);

        if (!$student) {
            return response()->json([
                'success' => false,
                'message' => 'Student not found.'
            ]);
        }

        return response()->json([
            'success' => true,
            'data' => $student
        ]);
    }

    public function updateStudent(Request $request)
    {
        $student = Student::find($request->id);

        $validatedData = $request->validate([
            'name' => 'required',
            'nis' =>
            'required|unique:students,nis,' . $student->id,
            'birthdate' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email',
            'class' => 'required',
            'school_year' => 'required',
            'registration_date' => 'required',
            'profile_photo' => 'max:5120',
            'notes' => 'required',
        ]);

        // Ambil data siswa dari request
        $student = Student::find($request->id);

        // Perbarui data siswa dengan data yang diterima dari request
        $student->name = $request->name;
        $student->nis = $request->nis;
        $student->birthdate = $request->birthdate;
        $student->gender = $request->gender;
        $student->address = $request->address;
        $student->phone_number = $request->phone_number;
        $student->email = $request->email;
        $student->class = $request->class;
        $student->school_year = $request->school_year;
        $student->registration_date = $request->registration_date;
        $student->profile_photo = $request->profile_photo;
        $student->notes = $request->notes;
        // Lanjutkan mengisi atribut lainnya sesuai kebutuhan

        // Simpan perubahan
        $student->save();


        // Beri respons JSON berhasil
        return response()->json([
            'success' => true,
            'message' => 'Student data updated successfully.'
        ]);
    }
}
