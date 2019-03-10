<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalog\Position;

class CatalogController extends Controller
{
    const CATALOGS_LIST = [
        'position' => Position::class,
    ];

    public function index(Request $request, $type)
    {
        if (!array_key_exists($type, self::CATALOGS_LIST)) return response([], 404);
        $model = self::CATALOGS_LIST[$type];
        $catalog = $model::getSelectArray();

        return response(['data' => $catalog]);
    }

}
