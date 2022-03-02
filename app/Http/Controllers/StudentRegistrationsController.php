<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStudentRegistrationsRequest;
use App\Http\Requests\UpdateStudentRegistrationsRequest;
use App\Repositories\StudentRegistrationsRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\StudentRegistrations;
use App\Models\StudentAssignings;
use App\Models\StudentFeewaive;
use App\Models\Sessions;
use App\Models\Shifts;
use App\Models\Classes;
use App\Models\Sections;
use App\Models\Users;
use Illuminate\Http\Request;
use Flash;
use Response;
use DB;
use PDF;

class StudentRegistrationsController extends AppBaseController
{
    /** @var  StudentRegistrationsRepository */
    private $studentRegistrationsRepository;

    public function __construct(StudentRegistrationsRepository $studentRegistrationsRepo)
    {
        $this->studentRegistrationsRepository = $studentRegistrationsRepo;
    }

    /**
     * Display a listing of the StudentRegistrations.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $data['sessions'] = Sessions::orderBy('id', 'desc')->get();
        $data['classes'] = Classes::all();
        $data['session_id'] = Sessions::orderBy('id', 'desc')->first()->id;
        $data['class_id'] = Classes::orderBy('id', 'asc')->first()->id;

        $data['studentRegistrations'] = StudentAssignings::with(['student', 'feewaive'])->where('session_id', $data['session_id'])->where('class_id', $data['class_id'])->get();

        return view('student_registrations.index', $data);
    }

    public function studentRegistrations_filter(Request $request)
    {
        $data['sessions'] = Sessions::orderBy('id', 'desc')->get();
        $data['classes'] = Classes::all();
        $data['session_id'] = $request->session_id;
        $data['class_id'] = $request->class_id;

        $data['studentRegistrations'] = StudentAssignings::with(['student', 'feewaive'])->where('session_id', $data['session_id'])->where('class_id', $data['class_id'])->get();

        return view('student_registrations.index', $data);
    }

    /**
     * Show the form for creating a new StudentRegistrations.
     *
     * @return Response
     */
    public function create()
    {
        $data['sessions'] = Sessions::orderBy('id', 'desc')->get();
        $data['shifts'] = Shifts::all();
        $data['classes'] = Classes::all();
        $data['sections'] = Sections::all();

        return view('student_registrations.create', $data);
    }

    /**
     * Store a newly created StudentRegistrations in storage.
     *
     * @param CreateStudentRegistrationsRequest $request
     *
     * @return Response
     */
    // public function store(CreateStudentRegistrationsRequest $request)
    // {
    //     $input = $request->all();

    //     $studentRegistrations = $this->studentRegistrationsRepository->create($input);

    //     Flash::success('Student Registrations saved successfully.');

    //     return redirect(route('studentRegistrations.index'));
    // }
    public function store(CreateStudentRegistrationsRequest $request)
    {
        DB::transaction(function () use ($request) {
            $session = substr(Sessions::find($request->session_id)->name, 0, 4);
            $student = Users::where('user_type', 'students')->orderBy('id', 'desc')->first();
            if ($student == null) {
                $id_no = '/0001';
            } else {
                $student_id = Users::where('user_type', 'students')->orderBy('id', 'desc')->first()->id;
                $student_id = $student_id + 1;
                if ($student_id < 10) {
                    $id_no = '/000' . $student_id;
                } else if ($student_id < 100) {
                    $id_no = '/00' . $student_id;
                } else if ($student_id < 1000) {
                    $id_no = '/0' . $student_id;
                } else {
                    $id_no = '/' . $student_id;
                }
            }
            $final_id_no = $session . $id_no;

            $random_number = rand(1000, 9999);

            $users = new Users();
            $users->user_type = 'students';
            $users->id_no = $final_id_no;
            $users->name = $request->name;
            $users->email = $request->email;
            $users->phone = $request->phone;
            $users->dob = date('Y-m-d', strtotime($request->dob));
            $users->gender = $request->gender;
            $users->religion = $request->religion;
            $users->father_name = $request->father_name;
            $users->father_phone = $request->father_phone;
            $users->mother_name = $request->mother_name;
            $users->address_current = $request->address_current;
            $users->address_permanent = $request->address_permanent;
            if ($request->file('image')) {
                $image = $request->file('image');
                $image_name = md5(rand(1111, 9999)) . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/profile_photos'), $image_name);
                $users->profile_photo = $image_name;
            }
            $users->password = bcrypt($random_number);
            $users->generated_password = $random_number;
            $users->save();

            $student_assignings = new StudentAssignings();
            $student_assignings->student_id = $users->id;
            $student_assignings->session_id = $request->session_id;
            $student_assignings->shift_id = $request->shift_id;
            $student_assignings->class_id = $request->class_id;
            $student_assignings->section_id = $request->section_id;
            $student_assignings->save();

            $student_feewaive = new StudentFeewaive();
            $student_feewaive->student_assigning_id = $student_assignings->id;
            $student_feewaive->fees_category_id = 1;
            $student_feewaive->discount = $request->feewaive;
            $student_feewaive->save();
        });

        Flash::success('Student Registrations saved successfully.');

        return redirect(route('studentRegistrations.index'));
    }

    /**
     * Display the specified StudentRegistrations.
     *
     * @param int $id
     *
     * @return Response
     */
    // public function show($id)
    // {
    //     $studentRegistrations = $this->studentRegistrationsRepository->find($id);

    //     if (empty($studentRegistrations)) {
    //         Flash::error('Student Registrations not found');

    //         return redirect(route('studentRegistrations.index'));
    //     }

    //     return view('student_registrations.show')->with('studentRegistrations', $studentRegistrations);
    // }
    public function show($student_id)
    {
        $data['studentRegistrations'] = StudentAssignings::with(['student', 'feewaive'])->where('student_id', $student_id)->first();

        $pdf = PDF::loadView('student_registrations.show_fields', $data);
        return $pdf->stream('document.pdf');
    }

    /**
     * Show the form for editing the specified StudentRegistrations.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($student_id)
    {
        $data['sessions'] = Sessions::orderBy('id', 'desc')->get();
        $data['shifts'] = Shifts::all();
        $data['classes'] = Classes::all();
        $data['sections'] = Sections::all();

        $studentRegistrations = StudentAssignings::with(['student', 'feewaive'])->where('student_id', $student_id)->first();

        if (empty($studentRegistrations)) {
            Flash::error('Student Registrations not found');

            return redirect(route('studentRegistrations.index'));
        }

        return view('student_registrations.edit', $data)->with('studentRegistrations', $studentRegistrations);
    }

    public function studentPromotion_edit(Request $request)
    {
        if ($request->ajax()) {
            $data['sessions'] = Sessions::orderBy('id', 'desc')->get();
            $data['shifts'] = Shifts::all();
            $data['classes'] = Classes::all();
            $data['sections'] = Sections::all();
            return response(StudentAssignings::with(['student', 'feewaive'])->where('student_id', $request->id)->first(), $data);
        }
    }

    /**
     * Update the specified StudentRegistrations in storage.
     *
     * @param int $id
     * @param UpdateStudentRegistrationsRequest $request
     *
     * @return Response
     */
    public function update($student_id, UpdateStudentRegistrationsRequest $request)
    {
        DB::transaction(function () use ($request, $student_id) {
            $users = Users::where('id', $student_id)->first();
            $users->name = $request->name;
            $users->email = $request->email;
            $users->phone = $request->phone;
            $users->dob = date('Y-m-d', strtotime($request->dob));
            $users->gender = $request->gender;
            $users->religion = $request->religion;
            $users->father_name = $request->father_name;
            $users->father_phone = $request->father_phone;
            $users->mother_name = $request->mother_name;
            $users->address_current = $request->address_current;
            $users->address_permanent = $request->address_permanent;
            if ($request->file('image')) {
                @unlink(public_path('images/profile_photos/' . $users->profile_photo));
                $image = $request->file('image');
                $image_name = md5(rand(1111, 9999)) . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/profile_photos'), $image_name);
                $users->profile_photo = $image_name;
            }
            $users->save();

            $student_assignings = StudentAssignings::where('id', $request->student_assigning_id)->where('student_id', $student_id)->first();
            $student_assignings->session_id = $request->session_id;
            $student_assignings->shift_id = $request->shift_id;
            $student_assignings->class_id = $request->class_id;
            $student_assignings->section_id = $request->section_id;
            $student_assignings->save();

            $student_feewaive = StudentFeewaive::where('student_assigning_id', $request->student_assigning_id)->first();
            $student_feewaive->discount = $request->feewaive;
            $student_feewaive->save();
        });

        Flash::success('Student Registrations updated successfully.');

        return redirect(route('studentRegistrations.index'));
    }
    public function studentPromotion_update(Request $request)
    {
        DB::transaction(function () use ($request) {
            $student_assignings = new StudentAssignings();
            $student_assignings->student_id = $request->student_id;
            $student_assignings->session_id = $request->session_id;
            $student_assignings->class_id = $request->class_id;
            $student_assignings->save();

            $student_feewaive = new StudentFeewaive();
            $student_feewaive->student_assigning_id = $request->student_assigning_id;
            $student_feewaive->fees_category_id = 1;
            $student_feewaive->discount = $request->feewaive;
            $student_feewaive->save();
        });

        Flash::success('Student Registrations updated successfully.');

        return redirect(route('studentRegistrations.index'));
    }

    /**
     * Remove the specified StudentRegistrations from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $studentRegistrations = $this->studentRegistrationsRepository->find($id);

        if (empty($studentRegistrations)) {
            Flash::error('Student Registrations not found');

            return redirect(route('studentRegistrations.index'));
        }

        $this->studentRegistrationsRepository->delete($id);

        Flash::success('Student Registrations deleted successfully.');

        return redirect(route('studentRegistrations.index'));
    }
}
