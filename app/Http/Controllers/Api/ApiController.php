<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Response;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    protected $statusCode = 200;

    const CODE_WRONG_ARGS = 'ERR-WRONGARGS';

    const CODE_NOT_FOUND = 'ERR-NOTFOUND';

    const CODE_INTERNAL_ERROR = 'ERR-WHOOPS';

    const CODE_UNAUTHORIZED = 'ERR-UNAUTHORIZED';

    const CODE_FORBIDDEN = 'ERR-FORBIDDEN';

    public function getStatusCode()
    {
        return $this->statusCode;
    }

    public function setStatusCode($code)
    {
        $this->statusCode = $code;
        return $this;
    }

    public function ajaxResponse($data)
    {
        if (! $data) {
            return $this->errorNotFound('Requested reponse not found.');
//        } elseif ($data instanceof Collection || $data instanceof LengthAwarePaginator) {
//            return Response::json($data);
        } else {
//            return $this->errorInternalError();
            return Response::json($data);
        }
    }

    protected function respondWithArray(array $array, array $headers = [])
    {
        return Response::json($array, $this->statusCode, $headers);
    }

    public function ajaxResponseError($message, $errorCode)
    {
        return $this->respondWithArray([
            'error' => [
                'code' => $errorCode,
                'http_code' => $this->statusCode,
                'message' => $message,
            ]
        ]);
    }

    public function errorInternalError($message = 'Internal Error')
    {
        return $this->setStatusCode(500)
            ->ajaxResponseError($message, self::CODE_INTERNAL_ERROR);
    }

    public function errorForbidden($message = 'Forbidden')
    {
        return $this->setStatusCode(401)
            ->ajaxResponseError($message, self::CODE_FORBIDDEN);
    }

    public function errorNotFound($message = 'Resource Not Found')
    {
        return $this->setStatusCode(404)
            ->ajaxResponseError($message, self::CODE_NOT_FOUND);
    }

    public function errorUnauthorized($message = 'Unauthorized')
    {
        return $this->setStatusCode(403)
            ->ajaxResponseError($message, self::CODE_UNAUTHORIZED);
    }

    public function errorWrongArgs($message = 'Wrong Arguments')
    {
        return $this->setStatusCode(400)
            ->ajaxResponseError($message, self::CODE_WRONG_ARGS);
    }

    public function validate(Request $request, array $rules, array $messages = [], array $customAttributes = [])
    {
        $validator = $this->getValidatorFactory()->make($request->all(), $rules, $messages, $customAttributes);

        if ($validator->fails()) {
            throw new HttpResponseException(
                $this->errorWrongArgs($validator->errors()->first())
            );
        }
    }
}
