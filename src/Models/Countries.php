<?php

namespace angelkurten\countries\Models;

class Countries
{

    private static $countries;

    private static $table;

    public function __construct()
    {
        $this::$table = \Config::get('countries.table_name');
    }

    /**
     * Get the countries from the JSON file, if it hasn't already been loaded.
     *
     * @return array
     */
    public static function getCountries()
    {
        //Get the countries from the JSON file
        if (sizeof(Countries::$countries) == 0){
            Countries::$countries = json_decode(file_get_contents(__DIR__ . '/Models/countries.json'), true);
        }

        //Return the countries
        return Countries::$countries;
    }

}
