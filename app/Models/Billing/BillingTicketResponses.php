<?php

namespace Pterodactyl\Models\Billing;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class BillingTicketResponses extends Model
{
  use HasFactory;

  public function new($uuid, $response)
  {

    $ticket = new BillingTicketResponses;
    $ticket->user_id = Auth::user()->id;
    $ticket->uuid = $uuid;
    $ticket->data = $response;
    $ticket->save();

    return $ticket;
  }
  
}