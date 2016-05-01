<?php
namespace App\Http;


use Response;

class ReturnUtil {

    public function ret($assert, $data = null, $dataOnFail = false) {
        return $assert ? $this->success($data) : $this->fail($dataOnFail ?? $data);
    }

    public function success($data = null) {
        return Response::json(array_merge(['success' => true], $data ? (is_array($data) ? $data : ['note' => $data]) : []));
    }

    public function fail($reason = null) {
        return Response::json(array_merge(['success' => false], $reason ? ['reason' => $reason] : []));
    }
}