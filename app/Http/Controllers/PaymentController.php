<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
// use Response;
class PaymentController extends Controller
{
    //
    public function download(Request $request){

        
        $path = base_path();
        $cfInstDir = "/home/centos/createv12";
        putenv("CDIR_CAST=".$cfInstDir);
        putenv("LD_LIBRARY_PATH=\$LD_LIBRARY_PATH:".$cfInstDir."/csys");
        putenv("PATH=\$PATH:".$cfInstDir."/csys");
        putenv("CREATE_RCODE=yes");
        
        putenv("CREATE_LANG=UTF-8");
    

        //putenv ("CREATE_MSGLVL=1");
        /*Create!Form：実行ファイルの設定*/
        /*作業ディレクトリ*/
        $cfworkdir  = $path."/storage/app/";
        /*出力ファイル名(ディレクトリに書き込み権限必要)*/
        $outputdir  = $path."/storage/app/";
        /*入力データファイル名*/
        $datadir   = $path."/storage/app/form_csv.csv";
        /*出力ファイル名*/
        $tempfile = "quotation.pdf";
        
        /*Download File fullpath*/
        $download_fullpath = $outputdir."/".$tempfile ;

        
        /*Create!Form Cast実行*/
        /*実行コマンドライン*/
        // $execmd = "ccast -D".$cfworkdir." -s".$stylefile." -o".$outputdir."/".$outputfile." ".$datadir.'/'.$datafile.' 2>&1';
        $execmd = "ccast -D".$stylefile_dir." -s".$stylefile." -o".$outputdir."/".$tempfile." ".$datadir.' 2>&1';
        $cfret  = 0;
        $sysret = "";
        $output = [];
       
        $sysret = exec($execmd, $output, $cfret);

    }

}
