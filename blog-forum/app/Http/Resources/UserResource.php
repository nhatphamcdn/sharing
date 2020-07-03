<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    private $token = null;
    private $message;

    public function __construct($resource, $message, $token = null) {
        parent::__construct($resource);
        $this->message = $message;
        $this->token = $token;
    }
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $response = [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'message' => $this->message
        ];
        
        if($this->token) $response['token'] = $this->token;

        return $response;
    }
}
