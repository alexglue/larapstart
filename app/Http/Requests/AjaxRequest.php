<?php namespace App\Http\Requests;

use Illuminate\Http\JsonResponse;

/**
 * Class AjaxRequest
 *
 * @package App\Http\Requests
 */
class AjaxRequest extends Request {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }


    /**
     * Get the proper failed validation response for the request.
     *
     * @param  array  $errors
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function response(array $errors)
    {
        return new JsonResponse(
            [
                'error' => true,
                'msg'   => array_flatten($errors)
            ], 400
        );
    }

}
