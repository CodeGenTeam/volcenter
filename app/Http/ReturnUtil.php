<?php
namespace App\Http;


use Response;

class ReturnUtil {

    public function success($data = null) {
        return Response::json(array_merge(['success' => true], $data ? [] : is_array($data) ? $data : ['note' => $data]));
    }

    public function fail($reason = null) {
        return Response::json(array_merge(['success' => false], $reason ? ['reason' => $reason] : []));
    }
}