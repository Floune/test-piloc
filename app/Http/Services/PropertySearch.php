<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\DB;

class PropertySearch
{
    public function __construct(array $args) {
        $this->args = $args;
        if (Auth()->user()->hasRole("admin")) {
            $this->query = DB::table("properties");
        }
        else {
            $this->query = DB::table("properties")->where("user_id", Auth()->user()->id);
        }
    }

    public function search() {
        $hasCity = array_key_exists("city", $this->args);
        $hasStreet = array_key_exists("street", $this->args);
        $hasZip = array_key_exists("zip", $this->args);

        if ($hasCity) {
            $this->query->where("city", $this->args["city"]);
        }

        if ($hasZip) {
            $this->query->where("zip", $this->args["zip"]);
        }

        if ($hasStreet) {
            $this->query->where("street", $this->args["street"]);
        }

        return $this->query->paginate(10);
    }
}
