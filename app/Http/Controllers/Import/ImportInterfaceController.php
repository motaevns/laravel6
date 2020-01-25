<?php

namespace App\Http\Controllers\Import;

use Illuminate\Http\Request;

interface ImportInterfaceController
{
    public function import(Request $request);
}
