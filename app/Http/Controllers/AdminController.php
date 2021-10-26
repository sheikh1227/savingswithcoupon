<?php

namespace App\Http\Controllers;


use App\Models\homeform;
use App\Models\ProductCoupon;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Exception;

use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\IOFactory;

use Illuminate\Support\Facades\DB;

use PhpOffice\PhpSpreadsheet\Worksheet\BaseDrawing;
use PhpOffice\PhpSpreadsheet\Worksheet\MemoryDrawing;

class AdminController extends Controller
{


    public function __construct()
    {

        $this->middleware('auth');
        $this->middleware('admin');

    }

    public function Insert(Request $request){


        DB::beginTransaction();
        try{

            $img=$request->file('txtimage')->getClientOriginalName();

        $request->txtimage->move(public_path('images'), $img);


      $product =   homeform::create([
         'sold'=>$request->txtSold,
         'discount'=>$request->txtDiscount,
         'save'=>$request->txtSave,
         'image'=>$img,
         'Oprice'=>$request->txtOrgprice,
         'Dprice'=>$request->txtDisprice,
         'expires'=>$request->txtexpires,
         $request['txtexpires'] =  Carbon::parse($request->txtexpires)->format('Y-m-d'),

         'useonline'=>request('txtUseOnline'),
         'use'=>request('txtUseIn'),
        

        ]);
        $file = $request->file('csvfile');
        // $this->importDevices($file,1);

        $this->importDevices($file,$product->id);
        DB::commit();
      return redirect('show');
        }catch(Exception $exception)
        {
            DB::rollBack();
            dd($exception->getMessage());
            redirect()->back();

        }
        
       }

    public function show(){
        $data=homeform::paginate(4);

        return view('Admin.dashboard',compact('data'));
    }

    public function update(homeform $id){
    
       // $data = [];
        return view('Admin.update',compact('id'));
    }

    public function updatedata(Request $request,homeform $para){

        $updateData =[
            'sold'=>request('txtSold'),
            'discount'=>request('txtDiscount'),
            'save'=>request('txtSave'),

            'Oprice'=>request('txtOrgprice'),
            'Dprice'=>request('txtDisprice'),
            'expires'=>Carbon::parse(request('txtexpires'))->format('d-m-Y'),
            'useonline'=>request('txtUseOnline'),
            'use'=>request('txtUseIn'),
        ];

        if ( $request->has('txtimage'))
        {
            $img=  $request->file('txtimage')->getClientOriginalName();

            $request->txtimage->move(public_path('images'), $img);

            $updateData['image'] = $img;
        }

        $para->update( $updateData);
    
           return redirect('show');
           
     }


  


    public function deletedata(homeform $para){
        $para->delete();
         return redirect('show');
    }


    public  function addNewCoupon()
    {
        return view('Admin.homepageform');
    }

    public  function importDevices($file,$product_id)
    {




            $categoryGradeError = [];
            $path = $file;

          
            $objPHPExcel = IOFactory::load($path);
            $activeSheet =  $objPHPExcel->getActiveSheet();

            $highestRow = $activeSheet->getHighestDataRow();

            $highestColumn = $activeSheet->getHighestDataColumn();
            $highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn);

            $i = 0;
            
       

            $images = [];
            foreach ($objPHPExcel->getActiveSheet()->getDrawingCollection() as $drawing) {
            

                if ($drawing instanceof MemoryDrawing) {
                    ob_start();
                    call_user_func(
                        $drawing->getRenderingFunction(),
                        $drawing->getImageResource()
                    );
            
                    $imageContents = ob_get_contents();
                    ob_end_clean();
                    $extension = 'png';
                } else {
                    $zipReader = fopen($drawing->getPath(),'r');
                    $imageContents = '';
            
                    while (!feof($zipReader)) {
                        $imageContents .= fread($zipReader,1024);
                    }
                    fclose($zipReader);
                    $extension = $drawing->getExtension();
                }
                $random_name = rand(1000,9999);
                $myFileName = 'Image_'.md5($random_name).'.'.$extension;
                file_put_contents('file/'.$myFileName,$imageContents);

                $images[$drawing->getCoordinates()] =$myFileName;
            }
        
        
            $spreadsheet = IOFactory::load($path);

            $activeSheet = $spreadsheet->getActiveSheet();

            $highestRow = $activeSheet->getHighestDataRow();

            $highestColumn = $activeSheet->getHighestDataColumn();
            $highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn);

            $data = [];

            for ($row = 2; $row <= $highestRow; ++$row) {
                $record = [];
                $header = [];


                $rowData = $activeSheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);

             
             
                if ($this->isEmptyRow(reset($rowData))) {
                    continue;
                }


                for ($col = 1; $col <= $highestColumnIndex; ++$col) {

                    $header_val = $activeSheet->getCellByColumnAndRow($col, 1)->getValue();
                    $value = $activeSheet->getCellByColumnAndRow($col, $row)->getValue();
                    $record[] = trim($value);
                    $header[] = trim($header_val);
                }



                $item = $this->mapColumnNames($record, $header,$product_id);

                if (is_null($item)) {
                    continue;
                }

                
                if(isset($images['C'.$row]))
                {
                    $item['image'] = $images['C'.$row];
                }else{
                    $item['image'] = NULL;
                }

                $data[] = $item;

            }



            if (!count($data)) {
                return  redirect()->back()->with(['error' => 'Please Add Some Data To Process']);
            }
            $categoryGradeError =  $this->importDevicesData($data);
        
        } 



        // return $data;
    
        public function ABC2decimal($abc)
        {
            $ten = 0;
            $len = strlen($abc);
            for($i=1;$i<=$len;$i++){
                $char = substr($abc,0-$i,1);//Get single character in reverse
        
                $int = ord($char);
                $ten += ($int-65)*pow(26,$i-1);
            }
            return $ten;
        }
    public function importDevicesData($data)
    {


        $productData = [];
        foreach ($data as $deviceKey => $device) {


            $productData[] =[
                'coupon_code' => !empty($device['coupon_code']) ?  $device['coupon_code'] : NULL,
                'expiry_date' => Carbon::parse($device['expiry_date'])->format('Y-m-d'),
                'product_id' => $device['product_id'],
                'image' => !empty($device['image']) ? $device['image'] : NULL 
            ]; 
            
        }
        ProductCoupon::insert($productData);


        return true;
    }

    function isEmptyRow($row)
    {

        foreach ($row as $cell) {
            if (null !== $cell)
                return false;
        }
        return true;
    }


    protected function mapColumnNames($record, $header,$product_id)
    {

        $map = [
            'image',
            'coupon_code',
            'expiry_date',
        ];


        // $record = array_filter($record, function ($item) {

        //     return !empty($item);
        // });


        
        $data = [];
        foreach ($header as $index => $value) {
            if (in_array($value, $map)) {
                if (isset($record[$index])) {
                    $data[$value] = $record[$index];
                    $data['product_id'] = $product_id;
                }
            }
        }
        // dd($data);
        return $data;
        try {
        } catch (Exception $exception) {
            return  redirect()->back()->with(['error' => $exception->getMessage()]);
        }
    }


}
