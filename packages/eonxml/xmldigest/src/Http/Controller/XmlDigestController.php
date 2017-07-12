<?php

namespace Eonxml\Xmldigest\Http\Controller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Eonxml\Xmldigest\Http\XmlDigest;

class XmlDigestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = XmlDigest::all();
        return view('xml-digest::index', ['data' => $data]);
    }
    
    public function createFromXml(Request $request){
        $filename = '';
        if ($request->hasFile('file')) {
                if($request->file('file')->isValid()) {
                    $file = $request->file('file');
                    $filename = time().'_.'.$file->getClientOriginalExtension();
                    if($file->getClientOriginalExtension() != 'xml'){
                       return redirect()->back()->with(['error' => 'File Not XML type']); 
                    }
                    $request->file('file')->move(public_path('xml'), $filename);
                    
                }else{
                    return redirect()->back()->with(['error' => 'File Not Valid']);
                } 
            }else{
               return redirect()->back()->with(['error' => 'No file found']);
            } 

        $src = 'xml/'.$filename;
        
        if($this->upLoadXml($src)){
            return redirect()->back()->with(['message' => 'Data successfully added']);
        }
        else{
            return redirect()->back()->with(['error' => 'An error occured']);
        }
    }
    
    public function upLoadXml($src){
        $contents = File::get($src);
        $xml = simplexml_load_string($contents);
        $blti = $xml->children('blti', TRUE);
    
        $extensions = $blti->extensions->children('lticm', TRUE)->property;
        $digest = new XmlDigest();
        $digest->title = (string) $blti->title;
        $digest->description = (string) $blti->description;
        $digest->launch_url  = (string) $blti->launch_url;
        $digest->icon_url  = $extensions[1];
        if($digest->title == ""){
            return FALSE;
        }
        $digest->save();
        return TRUE;
    }
}
