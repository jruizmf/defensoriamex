<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TemplateModel;
use App\Models\JudgmentModel;
use App\Models\QuotesModel;
use App\Models\StateModel;
use Illuminate\Support\Facades\Storage;
use DB;
use PhpOffice\PhpWord\TemplateProcessor;


class PrintJudgment extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function generateTemplate(Request $request)
    {
     
        $files = glob(storage_path('app/documents/outputs').'/*'); 
        
        // Deleting all the files in the list
        foreach($files as $file) {
        
            if(is_file($file)) 
                unlink($file); 
        }
        $item;
        $type = (int)$request->input('type');
        $id = (int)$request->input('id');
        
        $data['template'] = TemplateModel::find((int)$request->input('template'));
        $files_ = glob(storage_path('app/documents/templates').'/'.$data['template']->url); 
    
        if(count($files_ ) == 0){
            return redirect()->back() ->with('alert', 'No existe plantilla asociada.');
        }
        $templateProcessor = new TemplateProcessor(storage_path('app/documents/templates/'.$data['template']->url));
       
        $url = $data['template']->url;

        if($type == "quote"){
            $item = QuotesModel::find((int)$id);
            $templateProcessor->setValue('PARTE1', 'Sohail');
            $templateProcessor->setValue('PARTE2', 'Saleem');
            $templateProcessor->setValue('EXPEDIENTE', 'Sohail');
            $templateProcessor->setValue('MATERIA', 'Saleem');
            $templateProcessor->setValue('NUMJUZ', 'Sohail');
            $templateProcessor->setValue('CITY', 'Saleem');
        }
        else{
            $item =  DB::table('judgment')->where('judgment.id', $id)
            ->leftjoin('judgment_type', 'judgment.judgment_type', '=', 'judgment_type.id')
            ->leftjoin('correspondent', 'judgment.correspondent_id', '=', 'correspondent.id')
            ->leftjoin('states', 'judgment.state', '=', 'states.id')
            ->select('judgment.*', 'judgment_type.name as type_name', 'correspondent.name as correspondent_name', 'states.description as state_name')
            ->limit(1)->get()[0];
          
            $templateProcessor->setValue('PARTE1', $item->applicant1);
            $templateProcessor->setValue('PARTE2', $item->defendant);
            $templateProcessor->setValue('LAWYER', $item->lawyer);
            $templateProcessor->setValue('PARTE2', $item->defendant);
            $templateProcessor->setValue('DOMJUR', $item->address);
            $templateProcessor->setValue('ID', $item->intern_id);
            $templateProcessor->setValue('NOT', $item->correspondent_name);
            $templateProcessor->setValue('CITY', $item->city);
            $templateProcessor->setValue('STATE', $item->state_name);

            if(isset($item->state)){
                $itemState = StateModel::find((int)$item->state);
                if($itemState != null && $itemState->data != null){
                    $data = json_decode($itemState->data) ;
                    foreach ($data as $key => $value) {
                        $templateProcessor->setValue($value->name, $value->value);
                    }
                }
                
            }
            var_dump($item);
            die();
            $item = JudgmentModel::find((int)$request->input('id') );
            foreach($request->input() as $key=>$value) {
                
                if($key != 'type' && $key != 'id' && $key != 'template' && $key != 'event' && $key != 'redirect' && $key != '_token')
                {
                    $templateProcessor->setValue((string)$key, (string)$value);
                    
       
                    if($key == 'NTRIAL' && gettype($value) == 'string'){
                        $item->deal = $value;
                    }
                    if($key == 'NUMJUZ' && gettype($value) == 'string'){
                        $item->court = $value;
                    }
                    if($key == 'EXPED' && gettype($value) == 'string'){
                        $item->expedient = $value;
                    }
                    if($key == 'CED' && gettype($value) == 'string'){
                        $item->license = $value;
                    }
                    if($key == 'DISTR' && gettype($value) == 'string'){
                        $item->district = $value;
                    }
                    if($key == 'Type' && gettype($value) == 'string'){
                        $item->type = $value;
                    }
                    if($key == 'NTRIAL' && gettype($value) == 'string'){
                        $item->district = $value;
                    }
                }
            }
            
            $item->save();
          
        }
       
        $replacedUrl = str_replace('docx', 'pdf', $url);
	    $fileStorage = storage_path('app/documents/outputs/'.str_replace('(ID)', $item->intern_id, $replacedUrl));
        $templateProcessor->saveAs($fileStorage);
        $domPdfPath = base_path( 'vendor/dompdf/dompdf');
        \PhpOffice\PhpWord\Settings::setPdfRendererPath($domPdfPath);
        \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');
        
        //load generated file
        $phpWord = \PhpOffice\PhpWord\IOFactory::load($fileStorage); 
        //generate the pdf converter class
        $xmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord , 'PDF');
        //save generated File
        $replacedUrl = str_replace('docx', 'pdf', $url);
        $pdfLocation = storage_path('app/documents/outputs/'.str_replace('(ID)', $item->intern_id, $replacedUrl));
        //return the file from controller
        return response()->download($pdfLocation);
        
    }

}
