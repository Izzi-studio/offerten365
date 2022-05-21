<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmailTemplatesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request The request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->getEmailTemplateDescription->name,
            'subject' => $this->getEmailTemplateDescription->subject,
            'content' => $this->getEmailTemplateDescription->content,
        ];
    }
}
