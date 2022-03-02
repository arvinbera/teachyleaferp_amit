<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('sessions', App\Http\Controllers\SessionsController::class);
Route::get('/sessions_edit', ['as' => 'sessions_edit', 'uses' => 'App\Http\Controllers\SessionsController@edit']);


Route::resource('shifts', App\Http\Controllers\ShiftsController::class);
Route::get('/shifts_edit', ['as' => 'shifts_edit', 'uses' => 'App\Http\Controllers\ShiftsController@edit']);


Route::resource('classes', App\Http\Controllers\ClassesController::class);
Route::get('/classes_edit', ['as' => 'classes_edit', 'uses' => 'App\Http\Controllers\ClassesController@edit']);


Route::resource('sections', App\Http\Controllers\SectionsController::class);
Route::get('/sections_edit', ['as' => 'sections_edit', 'uses' => 'App\Http\Controllers\SectionsController@edit']);


Route::resource('subjects', App\Http\Controllers\SubjectsController::class);
Route::get('/subjects_edit', ['as' => 'subjects_edit', 'uses' => 'App\Http\Controllers\SubjectsController@edit']);


Route::resource('subjectAssignings', App\Http\Controllers\SubjectAssigningsController::class);


Route::resource('examTypes', App\Http\Controllers\ExamTypesController::class);
Route::get('/exam_types_edit', ['as' => 'exam_types_edit', 'uses' => 'App\Http\Controllers\ExamTypesController@edit']);


Route::resource('feesCategories', App\Http\Controllers\FeesCategoriesController::class);
Route::get('/fees_categories_edit', ['as' => 'fees_categories_edit', 'uses' => 'App\Http\Controllers\FeesCategoriesController@edit']);


Route::resource('feesAmounts', App\Http\Controllers\FeesAmountsController::class);


Route::resource('designations', App\Http\Controllers\DesignationsController::class);
Route::get('/designations_edit', ['as' => 'designations_edit', 'uses' => 'App\Http\Controllers\DesignationsController@edit']);


Route::resource('users', App\Http\Controllers\UsersController::class);


Route::resource('studentRegistrations', App\Http\Controllers\StudentRegistrationsController::class);
Route::get('/studentRegistrations_filter', ['as' => 'studentRegistrations_filter', 'uses' => 'App\Http\Controllers\StudentRegistrationsController@studentRegistrations_filter']);
Route::get('/studentPromotion_edit', ['as' => 'studentPromotion_edit', 'uses' => 'App\Http\Controllers\StudentRegistrationsController@studentPromotion_edit']);
Route::post('/studentPromotion_update', ['as' => 'studentPromotion_update', 'uses' => 'App\Http\Controllers\StudentRegistrationsController@studentPromotion_update']);

Route::resource('studentAssignings', App\Http\Controllers\StudentAssigningsController::class);
Route::resource('studentFeewaives', App\Http\Controllers\StudentFeewaiveController::class);


Route::resource('studentRolls', App\Http\Controllers\StudentRollsController::class);
Route::get('/studentRolls_filter', ['as' => 'studentRolls_filter', 'uses' => 'App\Http\Controllers\StudentRollsController@studentRolls_filter']);
Route::post('/studentRolls_store', ['as' => 'studentRolls_store', 'uses' => 'App\Http\Controllers\StudentRollsController@studentRolls_store']);

Route::get('/feesRegistrations', ['as' => 'feesRegistrations', 'uses' => 'App\Http\Controllers\FeesRegistrations@index']);
Route::get('/feesRegistrations_filter', ['as' => 'feesRegistrations_filter', 'uses' => 'App\Http\Controllers\FeesRegistrations@filter']);
Route::get('/studentFeePayslip', ['as' => 'studentFeePayslip', 'uses' => 'App\Http\Controllers\FeesRegistrations@payslip']);

Route::get('/feesMonthly', ['as' => 'feesMonthly', 'uses' => 'App\Http\Controllers\feesMonthly@index']);
Route::get('/feesMonthly_filter', ['as' => 'feesMonthly_filter', 'uses' => 'App\Http\Controllers\feesMonthly@filter']);
Route::get('/studentFeePayslip2', ['as' => 'studentFeePayslip2', 'uses' => 'App\Http\Controllers\feesMonthly@payslip']);

Route::get('/feesExam', ['as' => 'feesExam', 'uses' => 'App\Http\Controllers\feesExam@index']);
Route::get('/feesExam_filter', ['as' => 'feesExam_filter', 'uses' => 'App\Http\Controllers\feesExam@filter']);
Route::get('/studentFeePayslip3', ['as' => 'studentFeePayslip3', 'uses' => 'App\Http\Controllers\feesExam@payslip']);


Route::resource('marks', App\Http\Controllers\MarksController::class);
Route::get('/marks_studentSubjects_filter', ['as' => 'marks_studentSubjects_filter', 'uses' => 'App\Http\Controllers\MarksController@marks_studentSubjects_filter']);
Route::get('/studentMarks_filter', ['as' => 'studentMarks_filter', 'uses' => 'App\Http\Controllers\MarksController@studentMarks_filter']);
Route::post('/studentMarks_store', ['as' => 'studentMarks_store', 'uses' => 'App\Http\Controllers\MarksController@studentMarks_store']);
Route::get('/studentMarks_edit', ['as' => 'studentMarks_edit', 'uses' => 'App\Http\Controllers\MarksController@studentMarks_edit']);
Route::get('/studentMarksTable_filter', ['as' => 'studentMarksTable_filter', 'uses' => 'App\Http\Controllers\MarksController@studentMarksTable_filter']);
Route::post('/studentMarks_update', ['as' => 'studentMarks_update', 'uses' => 'App\Http\Controllers\MarksController@studentMarks_update']);

Route::get('/marksheets', ['as' => 'marksheets', 'uses' => 'App\Http\Controllers\Marksheets@index']);
Route::post('/marksheet_view', ['as' => 'marksheet_view', 'uses' => 'App\Http\Controllers\Marksheets@marksheet_view']);

Route::get('/marksheets_view_all', ['as' => 'marksheets_view_all', 'uses' => 'App\Http\Controllers\Marksheets@view_all']);
Route::get('/marksheets_filter', ['as' => 'marksheets_filter', 'uses' => 'App\Http\Controllers\Marksheets@filter']);
Route::get('/marksheet_filter_view', ['as' => 'marksheet_filter_view', 'uses' => 'App\Http\Controllers\Marksheets@marksheet_filter_view']);


Route::resource('grades', App\Http\Controllers\GradesController::class);
Route::get('/grades_edit', ['as' => 'grades_edit', 'uses' => 'App\Http\Controllers\GradesController@edit']);


Route::resource('employeeRegistrations', App\Http\Controllers\EmployeeRegistrationsController::class);


Route::resource('salaryLogs', App\Http\Controllers\SalaryLogsController::class);
Route::get('/salary_increment/{id}', ['as' => 'salary_increment', 'uses' => 'App\Http\Controllers\SalaryLogsController@salary_increment']);
Route::post('/salary_increment_store/{id}', ['as' => 'salary_increment_store', 'uses' => 'App\Http\Controllers\SalaryLogsController@salary_increment_store']);
Route::get('/salary_log/{id}', ['as' => 'salary_log', 'uses' => 'App\Http\Controllers\SalaryLogsController@salary_log']);


Route::resource('leaveCategories', App\Http\Controllers\LeaveCategoriesController::class);
Route::get('/leave_categories_edit', ['as' => 'leave_categories_edit', 'uses' => 'App\Http\Controllers\LeaveCategoriesController@edit']);


Route::resource('leaves', App\Http\Controllers\LeavesController::class);


Route::resource('employeeAttendances', App\Http\Controllers\EmployeeAttendancesController::class);
Route::get('/employee_attendances_edit/{date}', ['as' => 'employee_attendances_edit', 'uses' => 'App\Http\Controllers\EmployeeAttendancesController@employee_attendances_edit']);
Route::get('/employee_attendances_show/{date}', ['as' => 'employee_attendances_show', 'uses' => 'App\Http\Controllers\EmployeeAttendancesController@employee_attendances_show']);

Route::get('/salaryMonthly', ['as' => 'salaryMonthly', 'uses' => 'App\Http\Controllers\salaryMonthly@index']);
Route::get('/salaryMonthly_filter', ['as' => 'salaryMonthly_filter', 'uses' => 'App\Http\Controllers\salaryMonthly@filter']);
Route::get('/salaryMonthlyPayslip/{employee_id}', ['as' => 'salaryMonthlyPayslip', 'uses' => 'App\Http\Controllers\salaryMonthly@payslip']);


Route::resource('fees', App\Http\Controllers\FeesController::class);
Route::get('/feesAddOrEdit', ['as' => 'feesAddOrEdit', 'uses' => 'App\Http\Controllers\FeesController@feesAddOrEdit']);
Route::post('/feesStore', ['as' => 'feesStore', 'uses' => 'App\Http\Controllers\FeesController@feesStore']);
Route::get('/fees_filter', ['as' => 'fees_filter', 'uses' => 'App\Http\Controllers\FeesController@filter']);


Route::resource('salaries', App\Http\Controllers\SalaryController::class);
Route::get('/salaryAddOrEdit', ['as' => 'salaryAddOrEdit', 'uses' => 'App\Http\Controllers\SalaryController@salaryAddOrEdit']);
Route::post('/salaryStore', ['as' => 'salaryStore', 'uses' => 'App\Http\Controllers\SalaryController@salaryStore']);
Route::get('/salary_filter', ['as' => 'salary_filter', 'uses' => 'App\Http\Controllers\SalaryController@filter']);


Route::resource('otherExpenses', App\Http\Controllers\OtherExpensesController::class);

Route::get('/profitMonthly', ['as' => 'profitMonthly', 'uses' => 'App\Http\Controllers\ProfitMonthly@index']);
Route::get('/profitMonthly_calc', ['as' => 'profitMonthly_calc', 'uses' => 'App\Http\Controllers\ProfitMonthly@calc']);
Route::get('/profitMonthly_report', ['as' => 'profitMonthly_report', 'uses' => 'App\Http\Controllers\ProfitMonthly@report']);

Route::get('/employeeAttendanceReport', ['as' => 'employeeAttendanceReport', 'uses' => 'App\Http\Controllers\EmployeeAttendanceReport@index']);
Route::post('/employeeAttendanceReport_filter', ['as' => 'employeeAttendanceReport_filter', 'uses' => 'App\Http\Controllers\EmployeeAttendanceReport@filter']);

Route::get('/result_summary', ['as' => 'result_summary', 'uses' => 'App\Http\Controllers\ResultSummary@index']);
Route::post('/result_summary_filter', ['as' => 'result_summary_filter', 'uses' => 'App\Http\Controllers\ResultSummary@filter']);

Route::get('/idcard', ['as' => 'idcard', 'uses' => 'App\Http\Controllers\IdCard@index']);
Route::post('/idcard_filter', ['as' => 'idcard_filter', 'uses' => 'App\Http\Controllers\IdCard@filter']);
