<?php
namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use App\AliasFieldname;

class GlobalHelper {
    public static function getAlias($tablename, $fieldname) {
        $aliasFieldname = AliasFieldname::where('tablename', $tablename)
          ->where('fieldname', $fieldname)
          ->where('status', true)
          ->first();
        if($aliasFieldname){
          $aliasFieldname = $aliasFieldname->alias;
        } else {
          $aliasFieldname = $fieldname;
        }
        return $aliasFieldname;
    }
}
?>
