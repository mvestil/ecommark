<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

/**
 * Class ApiController
 */
class ApiController extends Controller
{
    /**
     * @var int
     */
    protected $statusCode = Response::HTTP_OK;

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param $statusCode
     * @return $this
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    /**
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondNotFound($message = 'Not Found')
    {
        return $this->setStatusCode(Response::HTTP_NOT_FOUND)->respondWithError($message);
    }

    /**
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondBadRequest($message = 'Bad Request')
    {
        return $this->setStatusCode(Response::HTTP_BAD_REQUEST)->respondWithError($message);
    }

    /**
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondServerError($message = 'Server Error')
    {
        return $this->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR)->respondWithError($message);
    }

    /**
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondConflict($message = 'Conflict')
    {
        return $this->setStatusCode(Response::HTTP_CONFLICT)->respondWithError($message);
    }

    /**
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondUnprocessable($message = 'Unprocessable Entity')
    {
        return $this->setStatusCode(Response::HTTP_UNPROCESSABLE_ENTITY)->respondWithError($message);
    }


    /**
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondUnauthorized($message = 'Unauthorized')
    {
        return $this->setStatusCode(Response::HTTP_UNAUTHORIZED)->respondWithError($message);
    }

    /**
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondForbidden($message = 'Forbidden')
    {
        return $this->setStatusCode(Response::HTTP_FORBIDDEN)->respondWithError($message);
    }

    /**
     * @param array $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondCreated($data = [])
    {
        return $this->setStatusCode(Response::HTTP_CREATED)->respond($data);
    }

    /**
     * @param       $data
     * @param array $headers
     * @return \Illuminate\Http\JsonResponse
     */
    public function respond($data, $headers = [])
    {
        return response()->json($data, $this->getStatusCode(), $headers);
    }

    /**
     * @param $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondWithError($message)
    {
        return $this->respond([
            'error' => [
                'message' => $message
            ]
        ]);
    }
}
