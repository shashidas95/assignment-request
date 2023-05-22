<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DemoController extends Controller
{
    public function ShowName(Request $request)
    {
        $name = $request->input('name');
        return $name;
    }
    public function ShowUserAgent(Request $request)

    {
        $userAgent = $request->header('User-Agent');
        return  $userAgent;
    }
    public function ShowPage(Request $request)
    {
        $page = ($queryPage = $request->query()) ? $queryPage : 'null';
        return $page;
    }


    public function ShowMessage(Request $request)
    {
       $message = $request->input();
        return $message;
    }
    public function ShowDetails()
    {
        $details = [
        'message' => 'Success',
        'data' => [
            'name' => 'John Doe',
            'age' => 39
            ]
        ];
       return response()->json($details);
    }
public function FileUpload(Request $request)
{
    $file = $request->file('photo');
    $filesize =filesize($file);
    $filetype =filetype($file);
       // $TempFileExtension = $path->getExtension();
    $filename = $file->getClientOriginalName();
    $fileExp = $file->getClientOriginalExtension();
    //$newFileName = time(). "." .$fileExp;
    $file->move(public_path('uploads'), $filename);

    return array(
            "filesize"=> $filesize,
            "filetype"=> $filetype,
            "filename"=> $filename,
            //"TempFileExtension"=> $TempFileExtension,
            "fileExp" => $fileExp,
            // "newFileName"=> $newFileName,
             );
}
  public function Token(Request $request)
    {
       $rememberToken1= ($rememberToken = $request->cookie())? $rememberToken: 'null';
       return $rememberToken1;

    }
    //  public function ShowEmail(Request $request)
    // {
    //    $email = $request->input('email');
    //    return response()->json([
    //     'success' => true,
    //     'message' => 'Form submitted successfully.'
    // ]);
    // }

}
