<?php
/**
 * Created by PhpStorm.
 * User: Steven Buffett
 * Date: 11/9/2018
 * Time: 8:16 AM
 */

namespace App\Exceptions;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

trait ExceptionTrait{

    protected function apiException($request , $e){

        if ($this->isModel($e)) {
            return $this->ModelResponse($e);
        }
        if ($this->isHttp($e)){
            return $this->HttpResponse($e);
        }
        return parent::render($request, $e);
    }

    protected function isModel($e){
        return $e instanceof ModelNotFoundException;
    }
    protected function isHttp($e){
        return $e instanceof NotFoundHttpException;
    }
    protected function ModelResponse(){
        return response()->json([
            'errors'=>'Product Model Not Found'
        ], 404);
    }
    protected function HttpResponse(){
        return response()->json([
            'errors'=>'Incorrect Route'
        ], 404);
    }

}