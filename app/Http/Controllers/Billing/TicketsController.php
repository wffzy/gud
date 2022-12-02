<?php

namespace Pterodactyl\Http\Controllers\Billing;

use Pterodactyl\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Pterodactyl\Models\User;

use Bill;

class TicketsController extends Controller
{

  public function __construct(Request $request)
  {
    $this->request = $request;
    //dd(Bill::tickets()->response()->new('ajkdad', 'this is a test response'));
  }

  private function getTemplate()
  {
    return $this->request->template;
  }

  public function index()
  {
    $tickets = Bill::tickets()->where('user_id', Auth::user()->id)->get();

    return view('templates.' . $this->getTemplate() . '.billing.tickets.core', ['tickets' => $tickets,'settings' => Bill::settings()->getAll()]);
  }

  public function newTicket()
  {
    $billding_user = Bill::users()->getAuth();
    $invoices = Bill::invoices()->where('user_id', $billding_user->user_id)->get();

    return view('templates.' . $this->getTemplate() . '.billing.tickets.new_ticket', ['invoices' => $invoices, 'settings' => Bill::settings()->getAll()]);
  }

  public function newTicketCreate(Request $request)
  {
    $validated = $request->validate([
      'subject' => 'required|max:255',
      'service' => 'required|max:255',
      'priority' => 'required|max:50',
      'response' => 'required|max:3000',
    ]);
    
    $ticket = Bill::tickets()->createTicket($request->input('subject'), $request->input('service'), 'Open', $request->input('priority'), $request->input('response'));

    return redirect(route('tickets.manage', ['uuid' => $ticket->uuid]))->withSuccess('Your ticket has been created');
  }

  public function manage($uuid)
  {
    $ticket = Bill::tickets()->where('uuid', $uuid)->first();
    
    if($ticket == NULL) {
      return redirect()->back()->withErrors('We could not locate your ticket, it must have been deleted.');
    }

    if($ticket->user_id !== Auth::user()->id) {
      return redirect()->back()->withErrors('You dont have permissions to access this resource');
    }

    $responses = Bill::tickets()->response()->where('uuid', $uuid)->orderBy('id', 'DESC')->get();
    $user = new User;
    return view('templates.' . $this->getTemplate() . '.billing.tickets.manage', ['ticket' => $ticket, 'responses' => $responses, 'user' => $user,'settings' => Bill::settings()->getAll()]);
  }

  public function addResponse($uuid, Request $request)
  {
    $validated = $request->validate([
      'response' => 'required|max:3000',
    ]);

    $ticket = Bill::tickets()->where('uuid', $uuid)->first();
    
    if($ticket == NULL) {
      return redirect()->back()->withErrors('We could not locate your ticket, it must have been deleted.');
    }

    if($ticket->user_id !== Auth::user()->id) {
      return redirect()->back()->withErrors('You dont have permissions to access this resource');
    }

    Bill::tickets()->response()->new($uuid, $request->input('response'));
    return redirect()->back();
  }

}
