<?php

namespace App\Controllers\Internal;

use App\Controllers\BaseController;
use App\Models\ResumeEducation;
use App\Models\ResumeOrganizationalExperience;
use App\Models\ResumePersonalInformation;
use App\Models\ResumeWorkExperience;
use Dompdf\Dompdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class GenerateCVController extends BaseController
{
    protected $resumePersonalInformation, $resumeOrganizationExperience, $resumeWorkExperience, $resumeEducation;
    public function __construct()
    {
        $this->resumePersonalInformation = new ResumePersonalInformation();
        $this->resumeOrganizationExperience = new ResumeOrganizationalExperience();
        $this->resumeWorkExperience = new ResumeWorkExperience();
        $this->resumeEducation = new ResumeEducation();
    }

    public function index()
    {
        $users = $this->resumePersonalInformation->findAll();
        return view('backend/pages/generate_resume/index', [
            'users' => $users
        ]);
    }

    public function generate($id){
        $user = $this->resumePersonalInformation->find($id);
        $work_experiences = $this->resumeWorkExperience->where('user_id',$user['id'])->findAll();
        $organization_experiences = $this->resumeOrganizationExperience->where('user_id',$user['id'])->findAll();
        $educations = $this->resumeEducation->where('user_id',$user['id'])->findAll();

        $filename = "Resume". " - " . $user['name'] ." - ". date('Y');

        // // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        $view = view('backend/pages/generate_resume/cv_view',[
            'user'=>$user,
            'work_experiences' => $work_experiences,
            'organization_experiences' => $organization_experiences,
            'educations' => $educations
        ]);
        // load HTML content
        $dompdf->loadHtml($view);

        // (optional) setup the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // render html as PDF
        $dompdf->render();

        // output the generated pdf
        $dompdf->stream($filename, array("Attachment" => 0));

    }

    public function export($id){
        $user = $this->resumePersonalInformation->find($id);
        $work_experiences = $this->resumeWorkExperience->where('user_id',$user['id'])->findAll();
        

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'Curriculum Vitae '. $user['name']);
        $sheet->mergeCells('A1:D1');
        $sheet->getStyle('A1')->getFont()->setBold(true);

        $sheet->setCellValue('A3', $user['name']);
        $sheet->mergeCells('A3:D3');

        $sheet->setCellValue('A4', $user['email'].'|'.$user['phone_number'].'|'.$user['linkedin_url']);
        $sheet->mergeCells('A4:K4');

        
        $sheet->setCellValue('A6', 'Position')
        ->setCellValue('B6', 'Company Name');
        
        $column = 7;
        foreach ($work_experiences as $work_experience) {
            $sheet->setCellValue('A' . $column, $work_experience['position'])
                ->setCellValue('B' . $column, $work_experience['company_name']);

            $column++;
        }

        $writer = new Xlsx($spreadsheet);
        $filename = date('Y-m-d-His'). '-Data-User-'.$user['name'];

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $filename . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}
