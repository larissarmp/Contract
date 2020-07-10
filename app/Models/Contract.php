<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    const ENABLED = 1;
    const DISABLED = 0;

    public function getStatusFormattedAttribute() {

        switch ($this->status) {
            case self::ENABLED:
                return "Ativo";
            case self::DISABLED:
                return "Inativo";
        }
        return $this->status;
    }


    public function getStatusClassAttribute() {
        switch ($this->status) {
            case self::ENABLED:
                return "success";
            case self::DISABLED:
                return "danger";
        }
        return $this->status;
    }

    public function client()
    {
        return $this->hasMany(Client::class);
    }
    public function unity()
    {
        return $this->hasMany(Attestation::class);
    }
    public function attestation()
    {
        return $this->hasMany(Unity::class);
    }
}
