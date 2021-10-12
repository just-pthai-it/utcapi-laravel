<?php

namespace App\Http\Controllers\WebController;

use App\BusinessClasses\CrawlQLDTData;
use App\Exceptions\InvalidAccountException;
use App\Helpers\SharedData;
use App\Helpers\SharedFunctions;
use App\Http\Controllers\Controller;
use App\Imports\Import;
use App\Imports\FileImport;
use App\Imports\UsersImport;
use App\Models\Account;
use App\Models\Class_;
use App\Models\DataVersionStudent;
use App\Models\DataVersionTeacher;
use App\Models\Department;
use App\Models\Device;
use App\Models\ExamSchedule;
use App\Models\Faculty;
use App\Models\Module;
use App\Models\ModuleClass;
use App\Models\ModuleScore;
use App\Models\Notification;
use App\Models\NotificationAccount;
use App\Models\OtherDepartment;
use App\Models\Participate;
use App\Models\Schedule;
use App\Models\SchoolYear;
use App\Models\Student;
use App\Models\Teacher;
use Exception;
use http\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use Tymon\JWTAuth\Facades\JWTAuth;

class TestController extends Controller
{
    /**
     * @throws Exception
     */
    public function test ()
    {
//        return Account::create([
//                                   'username' => '4646',
//                                   'password' => 'fasfdsf',
//                                   'permission' => 0
//                               ])->id_account;
//        return DataVersionStudent::select('schedule', 'notification', 'module_score', 'exam_schedule')
//                                 ->find('191201402');
//        return Student::where('id_account', '996')->first()->toSql();
// $a = Faculty::find('CNTT');
//
// return $a->departments()->where('id_department', '=', 'MHT')->get();
//
//        $books = DataVersionStudent::all();
//        return DataVersionStudent::with(['student' => function ($query)
//        {
//            $query->select('id_student');
//        }
//                                        ])->whereIn('id_student', $b)->get();
//
//        $books = DataVersionStudent::with('student')
//                                   ->whereIn('id_student', $b)
//                                   ->get();
//        foreach ($books as $book)
//        {
//            $a[] = ($book->student->id_student);
//            $a[] = ($book->student->student_name);
//            $c[] = $a;
//        }
//
//        return $books;

//        $this->_createTemporaryTable([['id_class' => 'K60.CNTT1'], ['id_class' => 'K60.CNTT2']]);
//
//        $a = DB::table(Student::table_as)
//               ->join('temp', 'stu.id_class', 'temp.id_class')
//               ->select('id_student')
//               ->get()
//               ->toArray();

//        $sql_query_1 =
//            'CREATE TEMPORARY TABLE temp1 (
//                  id_student varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
//                ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci';
//        DB::unprepared($sql_query_1);
//        DB::table('temp1')->insert(['id_student' => 'fsadfa']);

//        echo  json_encode($a);
//        var_dump($a);
//        $c = time();
//        echo $c . '-----';
//        $a =  array_fill(0, 20000, '191201402');
//        $aa = [];
//        foreach ($a as $e)
//        {
//            $aa[] = ['id_student' => $e];
//        }
////        $r = implode(',', array_fill(0, 20000, '(?)'));
//
//        $d = time();
//        echo $d . '-----';
//        echo $d - $c . '-----';
//return $aa;
//        return Account::find(20)->teacher;
//        $a = Teacher::select('*')->get()->toArray();
//        foreach ($a as $e)
//        {
//            if ($e['id'] == 'KHOAKHAC')
//                continue;
//
//            $id = Account::create([
//                                'username' => 'GV_' . $e['id'],
//                                'password' => '$2y$10$vQebZAiZ51suJZScdnXas.vd/IkCE1AIVL4Ur3tds0nhIe3MSlY2a',
//                                'permission' => '1'
//                            ])->id;
//
//            $x = Teacher::find($e['id']);
//            $x->id_account = $id;
//            $x->save();
//        return ExamSchedule::where('id_student', '191201402')
//                         ->select()->first() == null;
//        return Student::whereHas('dataVersionStudent', function ($query) use ($b)
//        {
//            return $query->whereIn('id_student', $b);
//        })->select('id_student', 'student_name')->toSql();
//        return ExamSchedule::whereHas('schoolYear', function ($query)
//        {
//            return $query->where('id_student', '191201402')
//                ->orderBy('id_school_year', 'desc')->limit(1);
//        })->pluck('school_year')->first();

        return Account::find('42')->dataVersionStudent()
                      ->pluck('notification')->first();
    }



//if ($e['id'] == 'KHOAKHAC')
//continue;
//
//$id = Account::create([
//'username' => 'KH_' . $e['id'],
//'password' => '$2y$10$vQebZAiZ51suJZScdnXas.vd/IkCE1AIVL4Ur3tds0nhIe3MSlY2a',
//'permission' => '3'
//])->id;
//
//$x = Faculty::find($e['id']);
//$x->id_account = $id;
//$x->save();

    public function test2 ()
    {
//        DB::table('class')
//          ->whereNotIn('id_faculty', ['KHOAKHAC'])
//          ->orderBy('id_faculty')
//          ->orderBy('class_name')
//          ->select('id_class', 'class_name', 'id_faculty')
//          ->get()
//          ->toArray();
//        DB::table('class')
//          ->whereNotIn('id_faculty', ['KHOAKHAC'])
//          ->orderBy('id_faculty')
//          ->orderBy('class_name')
//          ->select('id_class', 'class_name', 'id_faculty')
//          ->get()
//          ->toArray();
        $b = ['6205', '171201760', '171200700', '171201960', '171213248', '160704556', '171200623', '1406968', '171210142', '171202266', '171203480', '171201447', '171201933', '171210588', '171202364', '171201758', '171202497', '171202168', '171212264', '171202726', '171210758', '151202493', '171202016', '171201440', '171201525', '171201099', '171203272', '160702168', '171203514', '171203068', '171200609', '171200997', '171201102', '171200499', '171202793', '171203575', '171202313', '171200534', '171201648', '171200780', '171203202', '171200755', '171212853', '171210225', '171202022', '171202737', '171200571', '171200024', '171201446', '171202219', '171202314', '151211669', '991790002', '171202372', '171202489', '171200023', '171200013', '171202064', '171201147', '171200296', '171213540', '171200779', '171210219', '171203083', '171210553', '171200902', '171200458', '171201724', '171211496', '171200396', '171201777', '171200488', '171201955', '171202884', '160702263', '171210861', '171203458', '171202958', '171200526', '171200794', '171202011', '171201636', '171201879', '171200475', '171200459', '171202255', '171200585', '171202299', '171203103', '171200469', '171202225', '171201776', '171210220', '171210908', '171200130', '171210012', '160702121', '171201944', '171201494', '171210167', '171201362', '171200318', '171200474', '171200785', '171203441', '171202723', '160702271', '171203513', '160704542', '160702159', '171201875', '171210074', '171203470', '160702120', '171203511', '171201614', '171201396', '171200127', '171201160', '171202160', '171201936', '171200165', '171211424', '171202503', '171202883', '160704495', '171200301', '881760006', '171203515', '171200418', '171201300', '171202836', '151201102', '171200480', '171203242', '171202727', '171212125', '171200312', '171202746', '171202324', '171200397', '171201239', '160704545', '171200928', '160702239', '171202145', '171202729', '171201895', '171201317', '171202409', '171202265', '171200011', '171200170', '171202404', '171200466', '171202447', '171200613', '171201863', '171202385', '160704563', '171202952', '171203189', '171200791', '171200563', '171210015', '171210104', '171200752', '171211596', '171200150', '171212200', '171202718', '171202466', '171212097', '171203125', '171201369', '171201623', '171202068', '171200471', '171200827', '171201158', '171210160', '171202981', '171200705', '171200554', '171212346', '171201330', '171201371', '171201468', '171201479', '171202403', '171200552', '171211391', '171202169', '171202209', '171202676', '160702177', '171201348', '171202222', '171200201', '171202682', '171200596', '171200232', '171201500', '171200038', '160713702', '171201228', '171212388', '171200506', '171203519', '171202261', '171210187', '171202767', '171200455', '171201669', '171203071', '171201797', '171201729', '171210156', '171201876', '171200511', '171202869', '171203401', '171212668', '171203004', '171200616', '171202078', '171202071', '171200684', '171203055', '171202904', '171200031', '171200448', '172501313', '181202718', '181210675', '171300695', '171501145', '181202600', '181213624', '181200752', '181201962', '181201683', '181200912', '181203677', '181200916', '181202809', '181210367', '181202446', '181203522', '181201828', '181202999', '181203423', '181213890', '181210426', '181203181', '171300719', '181230078', '181210015', '181202938', '181200133', '181202441', '171711510', '181203234', '181200770', '181200084', '181201867', '181200777', '181200425', '181202279', '181201824', '181202983', '181211884', '181202326', '171301306', '181203458', '181202681', '160213349', '181202589', '181200299', '160301294', '181233518', '181210075', '152510385', '171300685', '171302039', '181203041', '181202862', '160204333', '160100175', '181202626', '181200814', '181202377', '181201020', '151101151', '181200834', '181203187', '181203411', '181201410', '181203531', '181201168', '181201589', '151202063', '181201088', '181233102', '181202599', '160702254', '181203050', '181202417', '181210764', '181204095', '181202289', '181202094', '181200390', '181201699', '160602039', '181200875', '160100674', '181200545', '181202020', '181202531', '161302869', '181210385', '181200351', '181213609', '181210162', '181201178', '160702127', '181213373', '181202200', '181200610', '160100908', '181210088', '181212423', '181203077', '181211845', '181202261', '160704566', '181200861', '181201611', '1406258', '181202977', '181201732', '181212177', '182600833', '181211737', '181211577', '181203621', '181210552', '160704557', '181203460', '160602070', '182202913', '181201313', '160100527', '181200747', '181200380', '181211817', '160100926', '171300583', '181201841', '160100954', '171702373', '181203244', '182212255', '181202473', '181201622', '151100170', '181202131', '181201022', '160100704', '181202785', '181200766', '181203302', '181213477', '181202480', '181201629', '181203228', '181211533', '182203306', '181213060', '171101780', '171511268', '181203962', '181201708', '181210228', '160100732', '171702285', '171100804', '181213262', '181210997', '181204016', '181201436', '181203245', '181202227', '181212011', '181202447', '181211071', '160204343', '181200812', '181203243', '181201893', '181203704', '181203048', '171501615', '181203812', '171300681', '181203305', '181203688', '181213053', '181203997', '181202886', '181201664', '181202276', '181203034', '181210621', '181203222', '182223342', '181202880', '181201503', '181202292', '181211854', '181201831', '181201482', '181202147', '182202912', '181200830', '181202288', '181201176', '181203918', '181213379', '181203140', '171303463', '181200401', '181203241', '181203948', '181210258', '181202209', '160702277', '182623800', '181201995', '181202991', '181202264', '160100461', '181203886', '181200582', '171301890', '182203899', '181203231', '181203202', '182213371', '160100709', '181210395', '160602013', '181230393', '181202483', '181200651', '181203415', '181202342', '181201248', '160100355', '182600887', '181230217', '181210341', '181202781', '182202046', '181202290', '181202287', '160602061', '171510196', '181203530', '181202654', '181211707', '181202508', '181202642', '181200857', '181230438', '181211780', '181210613', '171500651', '171302979', '160201198', '181231936', '181200683', '181201766', '181200783', '181211927', '171301280', '181203887', '181203797', '160113223', '181202980', '181203544', '181200839', '181213616', '181211416', '181200566', '181202839', '181200836', '181201076', '181202267'];
//        $b = ['123'];
//        return  DB::table('class')
//                      ->whereNotIn('id_faculty', ['KHOAKHAC'])
//                      ->orderBy('id_faculty')
//                      ->orderBy('class_name')
//                      ->select('id_class', 'class_name', 'id_faculty')
//                      ->get()
//                      ->toArray();
//        return Student::whereHas('dataVersionStudent', function ($query) use ($b)
//        {
//            return $query->whereIn('id_student', $b);
//        })->select('id_student', 'student_name')->get();
//        $a = DB::table('student')
//            ->limit(500)
//               ->pluck('id_student')
//               ->toArray();
//
//        foreach ($a as $e)
//        {
//            $m = '\'' . $e . '\',';
//            file_put_contents('a.php', $m, FILE_APPEND);
////}
//        }

    }

}
//$a = DB::table('class')
//       ->whereNotIn('id_faculty', ['KHOAKHAC'])
//       ->orderBy('id_faculty')
//       ->orderBy('class_name')
//       ->select('id_class', 'class_name', 'id_faculty')
//       ->get()
//       ->toArray();
//
//foreach ($a as $e)
//{
//    $m = '\'' . substr($e->id_class, 4) . '\'' . '=> [\'class_name\' => \'' . explode(' - ', $e->class_name)[0] . '\',' . PHP_EOL;
//    $m .= '\'id_faculty\' => \'' . $e->id_faculty . '\'],' . PHP_EOL;
//    file_put_contents('a.php', $m, FILE_APPEND);
//}

