<?php

namespace App\Traits;

use App\Models\Revision;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

trait PrepareInfo
{
    public function prepareObject()
    {
        $attributes = $this->getAttributes();

        $result = '';
        foreach ($attributes as $key => $value) {
            if (array_key_exists($key, $this->transcript['fields'])) {
                $result .= '<p>' . $this->getTranscriptKey($key) . ' - ' . $value . '</p>';
            }
        }
        return $result;

    }

    public function getTranscriptKey($key)
    {
        return array_key_exists($key, $this->transcript['fields']) ? $this->transcript['fields'][$key] : $key;
    }

    public function prepareObjectClassName()
    {
        return !empty($this->transcript['name']) ? $this->transcript['name'] : get_class($this);
    }

    public function prepareLink($id)
    {
        $link = '/admin/resources/' . $this->transcript['slug'] . '/' . $id;
        return '<a href="' . $link . '" class="no-underline font-bold dim text-primary">
            Перейти
        </a>';
    }
}
