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
        $issue_date = $request->issue_date;
        $invoiceId = strtoupper(Str::random(2)) . sprintf("%04d", mt_rand(1, 9999));
        $carbon_date = Carbon::createFromDate($issue_date);
        $carbon_date->addDays($request->payment_terms);

        Invoice::create([
            'invoice_id' => $invoiceId,
            'user_id' => auth()->id(),
            'from_street_address' => $request->from_street_address,
            'status' => 'draft',
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

    public function update_invoice(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'from_street_address' => 'required',
            'from_city' => 'required',
            'from_zip' => 'required',
            'from_country' => 'required',
            'to_name' => 'required',
            'to_email' => 'required',
            'to_street_address' => 'required',
            'to_city' => 'required',
            'to_zip' =>   'required',
            'issue_date' => 'required',
            'payment_terms' => 'required',
            'project_description' => 'required',
            'item1_name' => 'required',
            'item1_qty' => 'required',
            'item1_price' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect('/invoices#validateEdit')
                ->withErrors($validator)
                ->withInput();
        }

        Invoice::where('invoice_id', $request->invoice_id)->update($request->all());
        return back();
    }

    public function paid(Request $request)
    {
        Invoice::where('invoice_id', $request->invoice_id)->update(['status' => 'paid']);
        return back();
    }

    public function save_and_send(Request $request)
    {
        $invoiceId = strtoupper(Str::random(2)) . sprintf("%04d", mt_rand(1, 9999));

        $validator = Validator::make($request->all(), [
            'from_street_address' => 'required',
            'from_city' => 'required',
            'from_zip' => 'required',
            'from_country' => 'required',
            'to_name' => 'required',
            'to_email' => 'required',
            'to_street_address' => 'required',
            'to_city' => 'required',
            'to_zip' =>   'required',
            'issue_date' => 'required',
            'payment_terms' => 'required',
            'project_description' => 'required',
            'item1_name' => 'required',
            'item1_qty' => 'required',
            'item1_price' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('/invoices#validate')
                ->withErrors($validator)
                ->withInput();
        }

        $issue_date = $request->issue_date;
        $carbon_date = Carbon::createFromDate($issue_date);
        $carbon_date->addDays($request->payment_terms);
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

    public function delete(Request $request)
    {
        Invoice::where('invoice_id', $request->invoice_id)->firstorfail()->delete();
        return redirect('/invoices');
    }
}
