<?php

namespace App\Http\Controllers;
use App\Attachment;

use Illuminate\Http\Request;

class AttachmentController extends Controller
{
    public function index()
    {
        $attachment = new Attachment;
        return view('attachment.index')->with ('attachments',$attachment->all());
    }
    
    public function createForm()
    {
        $attachment = new Attachment;
        return view('attachment.upload')->with ('attachments',$attachment->all());
    }

    public function fileUpload(Request $req)
    {
        $req->validate([
        'file' => 'required|mimes:csv,docx,txt,xlx,xls,pdf,jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $fileModel = new Attachment;

        if($req->file()) {
            $fileName = time().'_'.$req->file->getClientOriginalName();
            $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');

            $fileModel->name = time().'_'.$req->file->getClientOriginalName();
            $fileModel->file_path = '/storage/' . $filePath;
            $fileModel->save();

            return back()
            ->with('success','File has been uploaded.')
            ->with('file', $fileName);
        }
   }

    public function destroy(Attachment $attachment)
    {
        $attachment->delete();
        return redirect()->route('attachment.index', $attachment);
    }
}
