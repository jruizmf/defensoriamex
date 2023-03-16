<?php

namespace App\Http\Middleware;

use \PhpOffice\PhpWord\TemplateProcessor as Template;

class TemplateProcessor extends Template
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function processTemplate($request)
    {
       
    }
}
