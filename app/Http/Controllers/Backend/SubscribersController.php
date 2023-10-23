<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\NewsletterSubscriberDataTable;
use App\DataTables\SubscriberListDataTable;
use App\Http\Controllers\Controller;
use App\Mail\Newsletter;
use App\Models\mail_list;
use App\Models\NewsletterSubscriber;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Auth;

use function PHPUnit\Framework\isEmpty;

class SubscribersController extends Controller
{
    use ImageUploadTrait;
    public function index(NewsletterSubscriberDataTable $dataTable)
    {
        return $dataTable->render('admin.subscriber.index');
    } 
    public function maillist(SubscriberListDataTable $dataTable)
    {
        return $dataTable->render('admin.subscriber.maillist');
    } 

    public function newsletter()
    {
        return view('admin.subscriber.newsletter');
    } 
    public function show($id)
    {
        $mail = mail_list::findOrFail($id);
        return view('admin.subscriber.show', compact('mail'));
    } 
    public function pricelist()
    {
        return view('admin.subscriber.pricelist');
    } 
    public function destory(string $id)
    {
        $subscriber = NewsletterSubscriber::findOrFail($id)->delete();
        return response(['status'=>'success','message'=>'Usunięto']);
    }
    public function sendMail(Request $request)
    {
        $request->validate([
            'subject' => ['required'],
            'message' => ['max:2048'],
            'alttext' => ['required','max:2048'],
            'image_url' => ['required','max:2048'],
            'offer_url' => ['required','max:2048'],
            'image' =>['required','max:2048'],
        ]);
        $emails = NewsletterSubscriber::where('is_verified', 1)->pluck('email')->toArray();
        $list = NewsletterSubscriber::where('is_verified', 1)->pluck('email');
        $imagePath = $this->uploadImage($request, 'image', 'uploads');

        $maillist= new mail_list();
        $maillist->action= 'newsletter';
        $maillist->email= $list;
        $maillist->title = $request->subject;
        $maillist->image_url = $request->image_url;
        $maillist->offer_url = $request->offer_url;
        $maillist->image = $imagePath;
        $maillist->alt_text = $request->alttext;
        $maillist->content = $request->message;
        $maillist->user_id = Auth::User()->id;
       
       if(is_null($request->message)){
        Mail::to($emails)->send(new Newsletter($request->subject,$imagePath,$request->alttext, ' ',$request->offer_url,$request->image_url));
        $maillist->content = ' ';
       }else{
        Mail::to($emails)->send(new Newsletter($request->subject,$imagePath,$request->alttext, $request->message,$request->offer_url,$request->image_url));
        $maillist->content = $request->message;
       }
    
        $maillist->save();
        toastr('Mail został wysłany','success','success');
        return redirect()->back();
        
    }

}
