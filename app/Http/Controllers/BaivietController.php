<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\ Str;   

class BaivietController extends Controller
{
    //
    public $lang = 'vi';
    public function index()
    {
        $this->lang= session()->get('lang');
        if ($this->lang==null) $this->lang='vi';        
        \App::setLocale($this->lang);
    	return view('_index')->with('lang',$this->lang);
    }
    public function detail($TieuDeKD)
    {
        $TieuDeKD = strip_tags(trim($TieuDeKD));
        $kq = \DB::select("select * from tin, loaitin where TieuDe_KhongDau=?",array($TieuDeKD));
        $ctTin = $kq[0];
        return view('_detail')
        ->with('title', $ctTin->TieuDe)
        ->with('ctTin', $ctTin)
        ->with('lang', $this->lang);
    }
    public function cat($TenKD)
    {
        $TenKD = strip_tags(trim($TenKD));
        $kq = \DB::select("select idLT, Ten as TenLT from loaitin WHERE Ten_KhongDau=?", array($TenKD));
        if(count($kq)==0) die("Không biết loại tin");
        $idLT = $kq[0]->idLT;
        $TenLT = $kq[0]->TenLT;
        $lt = \DB::table('tin')
        ->select('idTin','TieuDe','TomTat','SoLanXem','Ngay','urlHinh','TieuDe_KhongDau')
        ->where('idLT','=',$idLT)->where('AnHien',1)
        ->orderBy('idTin','desc')
        ->paginate(6);
        $d=array('lang'=>$this->lang,'title'=>$TenLT,'TenLT'=>$TenLT,'listtin'=>$lt);
        return view('_cat',$d);
    }//cat
    public function postFile(Request $request)
    {
        if($request->comment)
        {
            $NoiDung = $request->comment;
            $HoTen = $request->name;
            $Email = $request->email;
            $Ngay = date('Y/m/d h:m:s');
            $idTin = $request->idTin;
            $kq = \DB::table('ykien')->insert(
                [
                    'idTin' =>$idTin,
                    'Ngay' =>$Ngay,
                    'NoiDung' => $NoiDung,
                    'Email' => $Email,
                    'HoTen' => $HoTen,
                    'AnHien' => 1
                ]
            );
            /*
            $kq = \DB::select("select * from tin, loaitin where idTin=$idTin");
            $ctTin = $kq[0];
            return view('_detail')
            ->with('title', $ctTin->TieuDe)
            ->with('ctTin', $ctTin)
            ->with('lang', $this->lang);*/
            return redirect()->back();
            }
        }
        public function timkiem(Request $request)
        {

            $tukhoa_kd = Str::slug($request->tukhoa);
            $tukhoa = $request->tukhoa;
            $lt = \DB::table('tin')
            ->where('TieuDe','like',"%$tukhoa%")
            ->orWhere('TieuDe_KhongDau','like',"%$tukhoa_kd%")
            ->orWhere('Content','like',"%$tukhoa%")
            ->orWhere('TomTat','like',"%$tukhoa%")
            ->orderBy('idTin','desc')
            ->paginate(6);
            $search=array(
                        'lang'=>$this->lang,
                        'title'=>'Tìm Kiếm '.$tukhoa,
                        'listtin'=>$lt,
                        'tukhoa' => $tukhoa
                    );
            return view('_timkiem',$search);
        }
        public function lienhe()
        {
            $d=array('lang'=>$this->lang,'title'=>'Liên hệ');
            return view('_lienhe',$d);

        }
        public function changeLanguage($lang){      
            \Session::put('lang', $lang);       
            return redirect()->route('/'); 
        //return redirect()->back();
}

}
