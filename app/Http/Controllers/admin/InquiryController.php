<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ContactInquiry;
use App\Models\DealerInquiry;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    public function contact_inquiry(Request $request)
    {
        $inquiry = ContactInquiry::where('type','contact')->orderBy('id', 'desc')->get();
        return view('backend.inquiry.contact_inquiry', compact('inquiry'));
    }
    public function product_inquiry(Request $request)
    {
        $inquiry = ContactInquiry::where('type','product')->with('product')->orderBy('id', 'desc')->get();
        return view('backend.inquiry.contact_inquiry', compact('inquiry'));
    }
    public function dealer_inquiry(Request $request)
    {
        // $inquiry = DealerInquiry::where('is_approved','0')->where('type','dealer')->orderBy('id', 'desc')->get();
        return view('backend.inquiry.dealer_inquiry');
    }
    public function dealer_inquiry_detail($id)
    {
        $inquiry = DealerInquiry::find($id);
        return view('backend.inquiry.dealer_inquiry_details', compact('inquiry'));
    }
    public function vendor_inquiry(Request $request)
    {
        $inquiry = DealerInquiry::where('is_approved',0)->where('type','vendor')->orderBy('id', 'desc')->get();
        return view('backend.inquiry.dealer_inquiry', compact('inquiry'));
    }
    public function contact_inquiry_destroy($id)
    {
        ContactInquiry::find($id)->delete();
        flash(__('Inquiry has been deleted successfully'))->success();
        return redirect()->back();
    }
    public function dealer_inquiry_destroy($id)
    {
        DealerInquiry::find($id)->delete();
        flash(__('Inquiry has been deleted successfully'))->success();
        return redirect()->back();
    }
    public function dealer_inquiry_approve($id)
    {
        $d = DealerInquiry::find($id);
        if($d){
            $d->is_approved = '1';
            $d->save();
        }
        flash(__('Dealer Appproved successfully.'))->success();
        return redirect()->route('dealer');
    }
}
