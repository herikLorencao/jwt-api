<?php

namespace App\Exceptions;

use Exception;

class DatabaseQueryException extends Exception
{
    /**
     * Report the exception.
     *
     * @return void
     */
    public function report()
    {
        //
    }

    /**
     * Render the exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function render($request)
    {
        return response()->json(['Erro ao manipular a informação na base de dados' => $this->message], 422);
    }
}
