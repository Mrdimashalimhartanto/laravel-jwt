<?php

namespace App\Helpers;

class ResponseAci
{
    // start response successfully 2**

    public static function Success($return, $message)
    {
        if (empty($return)) {
            $return = (object)array();
        }

        return response(array(
            'code' => '00',
            'status' => true,
            'data'    => $return,
            'message' => $message
        ), 200);
    }

    public static function SuccessList($count, $return, $message)
    {
        if (empty($return)) {
            $return = (object)array();
        }

        return response(array(
            'code' => '00',
            'status' => true,
            'total_data' => $count,
            'data'    => $return,
            'message' => $message
        ), 200);
    }

    public static function SuccessToken($token, $expires_in, $message)
    {
        return response(array(
            'code' => '00',
            'status' => true,
            'access_token'    => $token,
            'expires_in'    => $expires_in,
            'token_type'    => 'Bearer',
            'message' => $message
        ), 201);
    }

    public static function SuccessTokenforFrontend($token, $expires_in, $message)
    {
        return response(array(
            'code' => '00',
            'status' => true,
            'access_token'    => $token,
            'expires_in'    => $expires_in,
            'message' => $message
        ), 201);
    }

    public static function SuccessCreate($return, $message)
    {
        if (empty($return)) {
            $return = (object)array();
        }

        return response(array(
            'code' => '00',
            'status' => true,
            'data'    => $return,
            'message' => $message
        ), 201);
    }

    // end response successfully 2**
    // start response Client Error 4**

    public static function BadRequest($code, $return, $message)
    {
        if (empty($return)) {
            $return = (object)array();
        }
        return response(array(
            'code' => $code,
            'status' => false,
            'data'    => $return,
            'message' => $message
        ), 400);
    }

    public static function BadRequestArray($code, $return, $message)
    {
        return response(array(
            'code' => $code,
            'status' => false,
            'data'    => $return,
            'message' => $message
        ), 400);
    }

    public static function BadRequestArrayList($code, $return, $message)
    {
        return response(array(
            'code' => $code,
            'status' => false,
            'total_data' => 0,
            'data'    => $return,
            'message' => $message
        ), 400);
    }

    public static function Unauthorized($code, $return, $message)
    {
        if (empty($return)) {
            $return = (object)array();
        }
        return response(array(
            'code' => $code,
            'status' => false,
            'data'    => $return,
            'message' => $message
        ), 401);
    }

    public static function Forbidden($code, $return, $message)
    {
        if (empty($return)) {
            $return = (object)array();
        }
        return response(array(
            'code' => '97',
            'status' => false,
            'data'    => $return,
            'message' => $message
        ), 403);
    }

    public static function NotFound($code, $return, $message)
    {
        if (empty($return)) {
            $return = (object)array();
        }
        return response(array(
            'code' => $code,
            'status' => false,
            'data'    => $return,
            'message' => $message
        ), 404);
    }

    public static function NotFoundArray($code, $return, $message)
    {
        return response(array(
            'code' => $code,
            'status' => false,
            'data'    => $return,
            'message' => $message
        ), 404);
    }

    public static function NotFoundArrayList($code, $return, $message)
    {
        return response(array(
            'code' => $code,
            'status' => false,
            'total_data' => 0,
            'data'    => $return,
            'message' => $message
        ), 404);
    }

    // end response Client Error 4**
    // start response Client Error 5**

    public static function InternalServerError($code, $return, $message)
    {
        if (empty($return)) {
            $return = (object)array();
        }
        return response(array(
            'code' => $code,
            'status' => false,
            'data'    => $return,
            'message' => $message
        ), 500);
    }

    public static function InternalServerErrorArray($code, $return, $message)
    {
        return response(array(
            'code' => $code,
            'status' => false,
            'data'    => $return,
            'message' => $message
        ), 500);
    }

    // end response Client Error 5**

}
