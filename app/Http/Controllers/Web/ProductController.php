<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Class ProductController
 *
 */
class ProductController extends Controller
{
    /**
     * Displays the user interface for product listing
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function list(Request $request)
    {
        return view('products.list');
    }

    /**
     * Displays the user interface for a single product
     *
     * @param Request $request
     * @param         $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Request $request, $id)
    {
        return view('products.view', [
            'product_id' => $id
        ]);
    }
}