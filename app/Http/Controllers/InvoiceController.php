<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Invoice;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::get(); //all invoices (Collection)
        return view('invoices.index', [
            'invoices' => $invoices
        ]);
    }
    public function save_draft(Request $request)
    {
        $invoiceId = strtoupper(Str::random(2)) . sprintf("%04d", mt_rand(1, 9999));

        Invoice::create([
            'invoice_id' => $invoiceId,
            'user_id' => auth()->id(),
            'from_street_address' => $request->from_street_address,
            'status' => 'draft'
        ]);
        return back();
    }

    public function update_invoice(Request $request)
    {
        Invoice::where('invoice_id', $request->invoice_id)->update($request->all());
        return back();
    }

    public function save_and_send(Request $request)
    {
        $invoiceId = strtoupper(Str::random(2)) . sprintf("%04d", mt_rand(1, 9999));
        $validator = Validator::make($request->all(), [
            'from_street_address' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('/invoices#validate')
                ->withErrors($validator)
                ->withInput();
        }

        $issue_date = $request->issue_date;
        $payment_terms = substr($request->get('payment_terms'), 3, 3); // fix later (too hacky -- need to get select value, not text)
        $carbon_date = Carbon::createFromDate($issue_date)->addDays($payment_terms);
        Invoice::create([
            'invoice_id' => $invoiceId,
            'user_id' => auth()->id(),
            'from_street_address' => $request->from_street_address,
            'status' => 'pending',
            'payment_due' => $carbon_date,
            'from_city' => $request->from_city,
            'from_zip' => $request->from_zip,
            'from_country' => $request->from_country,
            'to_name' => $request->to_name,
            'to_email' => $request->to_email,
            'to_street_address' => $request->to_street_address,
            'to_city' => $request->to_city,
            'to_zip' => $request->to_zip,
            'to_country' => $request->to_country,
            'issue_date' => $request->issue_date,
            'payment_terms' => $request->payment_terms,
            'project_description' => $request->project_description,
            'item1_name' => $request->item1_name,
            'item1_qty' => $request->item1_qty,
            'item1_price' => $request->item1_price,
            'item1_total' => ($request->item1_qty) * ($request->item1_price),
            'item2_name' => $request->item2_name,
            'item2_qty' => $request->item2_qty,
            'item2_price' => $request->item2_price,
            'item2_total' => $request->item2_total,
            'item3_name' => $request->item3_name,
            'item3_qty' => $request->item3_qty,
            'item3_price' => $request->item3_price,
            'item3_total' => $request->item3_total
        ]);

        return back();
    }
}
