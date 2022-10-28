<?php

require_once "Application/Core/Model.php";

class UserModel extends Model
{


    public function getUserList(): array
    {
        return json_decode($this->makeApiCall("get"), true);
    }

    public function updateUserData(array $data): string
    {
        $data['id'] = $data['edit'];
        unset($data['edit']);
        return $this->makeApiCall("PUT", $data['id'], $data);

    }


    public function insertUser(array $data): string
    {
        $data['id'] = $data['add'];
        unset($data['add']);
        return $this->makeApiCall("POST", '', $data);
    }


    public function deleteUser(string $id): string
    {
        return $this->makeApiCall("delete", $id);
    }


    private function makeApiCall(string $method, string $id = '', array $data = []): string
    {

        $apiConnection = curl_init();
        $method = strtoupper($method);
        $url = getenv("API_URL") . "/" . $id;
        curl_setopt_array($apiConnection,
            [CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_CUSTOMREQUEST => $method,
                CURLOPT_POSTFIELDS => json_encode($data),
                CURLOPT_HTTPHEADER => array(
                    'Authorization: Bearer ' . getenv('API_ACCESS_TOKEN'),
                    'Content-Type: application/json'
                )]);
        $response = curl_exec($apiConnection);
        if ($method!=="GET") {
            $response = curl_getinfo($apiConnection, CURLINFO_RESPONSE_CODE);
        }
        curl_close($apiConnection);
        return $response;
    }


}