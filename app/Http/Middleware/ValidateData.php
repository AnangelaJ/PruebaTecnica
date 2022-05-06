<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ValidateData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $validator = \Validator::make($request->all(), 
        [
            'name' => 'required|max:150',
            'amount' => 'required|numeric|min:1',
        ],
        [
            'name.*' => [
                'required' => 'El nombre es requerido',
                'max' => 'El maximo de caracteres es de 150'
            ],
            'amount.*' => [
                'unique'   => 'El monto es requerido',
                'numeric' => 'El monto debe ser un valor numerico',
                'min' => 'El monto debe ser mayor a 0'
            ]
        ]
    );
    if($validator->fails()){
        return response()->json($validator->errors());
    }else{
        return $next($request);
    }        
    }
}
