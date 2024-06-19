<?php

namespace App\Helpers;

use Illuminate\Http\Request;

class MercadoPagoWebhook
{
    public $action;
    public $api_version;
    public $data;
    public $date_created;
    public $id;
    public $live_mode;
    public $type;
    public $user_id;
    public $data_id;

    public function __construct(Request $request)
    {
        $this->action = $request->input("action");
        $this->api_version = $request->input("api_version");
        $this->data = $request->input("data");
        $this->date_created = $request->input("date_created");
        $this->id = $request->input("id");
        $this->live_mode = $request->input("live_mode");
        $this->type = $request->input("type");
        $this->user_id = $request->input("user_id");
        $this->data_id = $request->input("data_id");
    }
}
