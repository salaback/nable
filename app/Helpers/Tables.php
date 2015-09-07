<?php


namespace app\Helpers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tables
{
    /**
     *
     * Generate field on custom table and log field generation
     *
     * @param string $tableName
     * @param string $fieldType
     * @param string $fieldName
     * @return bool
\     */
    static function createDataField($tableName, $fieldType, $fieldName)
    {

        Schema::table($tableName, function(Blueprint $table) use ($fieldName, $fieldType)
        {
            $table->$fieldType($fieldName);
        });

        return true;
    }
}