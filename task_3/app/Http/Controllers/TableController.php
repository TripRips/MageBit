<?php

namespace App\Http\Controllers;
use App\Exports\EmailExport;
use App\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;


class TableController
{
    public function index()
    {
        $subscriptions = Subscription::all();
        $subscriptions_emails = Subscription::select('email')->get()->toArray();

        $domains_array = array();
        foreach ($subscriptions_emails as $domains){

            $full_email = implode (',', $domains);
            $email_split_dot= explode(".", $full_email);
            $email_without_after_dot = $email_split_dot[0];
            $email_split_at_symbol = explode("@", $email_without_after_dot);
            $email_domain = $email_split_at_symbol[1];

            if(!in_array($email_domain, $domains_array, true)){
                array_push($domains_array, $email_domain);
            }

        }

        return view('table')->with('subscriptions', $subscriptions)->with('domains_array', $domains_array);
    }

    public function delete($id)
    {
        $subscriptions = Subscription::all()
            ->where('id', $id)->first();
        $subscriptions->delete();

        return back();
    }

    public function filter($email)
    {

        $subscriptions_emails = Subscription::select('email')->get()->toArray();

        $domains_array = array();
        foreach ($subscriptions_emails as $domains){

            $full_email = implode (',', $domains);
            $email_split_dot= explode(".", $full_email);
            $email_without_after_dot = $email_split_dot[0];
            $email_split_at_symbol = explode("@", $email_without_after_dot);
            $email_domain = $email_split_at_symbol[1];

            if(!in_array($email_domain, $domains_array, true)){
                array_push($domains_array, $email_domain);
            }
        }


        $subscriptions = Subscription::where('email', 'LIKE', '%'.$email.'%')
            ->get();

        return view('table')->with('subscriptions', $subscriptions)->with('domains_array', $domains_array);
    }

    public function excel(Request $request)
    {

        $email = $request->input('checked');

        return (new EmailExport($email))->download('emails.xlsx');

    }


}
