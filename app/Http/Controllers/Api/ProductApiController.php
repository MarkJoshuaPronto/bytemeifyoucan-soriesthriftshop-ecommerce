<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BrandModel;
use App\Models\CategoryModel;
use App\Models\ColorModel;
use App\Models\ProductModel;
use App\Models\SubCategoryModel;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    public function getProductSearch(Request $request)
    {
        $data['meta_title'] = 'Search';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';

        $getProduct = ProductModel::getProduct();
        $page = 0;
        if (!empty($getProduct->nextPageUrl())) {
            $parse_url = parse_url($getProduct->nextPageUrl());
            if (!empty($parse_url['query'])) {
                parse_str($parse_url['query'], $get_array);
                $page = !empty($get_array['page']) ? $get_array['page'] : 0;
            }
        }
        $data['page'] = $page;
        $data['getProduct'] = $getProduct;

        $data['getColor'] = ColorModel::getRecordActive();
        $data['getBrand'] = BrandModel::getRecordActive();

        return response()->json([
            'meta_title' => $data['meta_title'],
            'meta_description' => $data['meta_description'],
            'meta_keywords' => $data['meta_keywords'],
            'page' => $data['page'],
            'getProduct' => $data['getProduct'],
            'getColor' => $data['getColor'],
            'getBrand' => $data['getBrand'],
        ]);
    }

    public function getCategory($slug, $subslug = '')
    {
        $getProductSingle = ProductModel::getSingleSlug($slug);
        $getCategory = CategoryModel::getSingleSlug($slug);
        $getSubCategory = SubCategoryModel::getSingleSlug($subslug);

        $data['getColor'] = ColorModel::getRecordActive();
        $data['getBrand'] = BrandModel::getRecordActive();

        if (!empty($getProductSingle)) {
            $data['meta_title'] = $getProductSingle->title;
            $data['meta_description'] = $getProductSingle->short_description;

            $data['getProduct'] = $getProductSingle;
            $data['getRelatedProduct'] = ProductModel::getRelatedProduct($getProductSingle->id, $getProductSingle->sub_category_id);

            return response()->json([
                'meta_title' => $data['meta_title'],
                'meta_description' => $data['meta_description'],
                'getProduct' => $data['getProduct'],
                'getRelatedProduct' => $data['getRelatedProduct'],
            ]);
        } elseif (!empty($getCategory) && !empty($getSubCategory)) {
            $data['meta_title'] = $getSubCategory->meta_title;
            $data['meta_description'] = $getSubCategory->meta_description;
            $data['meta_keywords'] = $getSubCategory->meta_keywords;

            $data['getSubCategory'] = $getSubCategory;
            $data['getCategory'] = $getCategory;

            $getProduct = ProductModel::getProduct($getCategory->id, $getSubCategory->id);

            $page = 0;
            if (!empty($getProduct->nextPageUrl())) {
                $parse_url = parse_url($getProduct->nextPageUrl());
                if (!empty($parse_url['query'])) {
                    parse_str($parse_url['query'], $get_array);
                    $page = !empty($get_array['page']) ? $get_array['page'] : 0;
                }
            }

            $data['page'] = $page;
            $data['getProduct'] = $getProduct;
            $data['getSubCategoryFilter'] = SubCategoryModel::getRecordSubCategory($getCategory->id);

            return response()->json([
                'meta_title' => $data['meta_title'],
                'meta_description' => $data['meta_description'],
                'meta_keywords' => $data['meta_keywords'],
                'getSubCategory' => $data['getSubCategory'],
                'getCategory' => $data['getCategory'],
                'page' => $data['page'],
                'getProduct' => $data['getProduct'],
                'getSubCategoryFilter' => $data['getSubCategoryFilter'],
            ]);
        } elseif (!empty($getCategory)) {
            $data['getSubCategoryFilter'] = SubCategoryModel::getRecordSubCategory($getCategory->id);

            $data['getCategory'] = $getCategory;

            $data['meta_title'] = $getCategory->meta_title;
            $data['meta_description'] = $getCategory->meta_description;
            $data['meta_keywords'] = $getCategory->meta_keywords;

            $getProduct = ProductModel::getProduct($getCategory->id);
            $page = 0;
            if (!empty($getProduct->nextPageUrl())) {
                $parse_url = parse_url($getProduct->nextPageUrl());
                if (!empty($parse_url['query'])) {
                    parse_str($parse_url['query'], $get_array);
                    $page = !empty($get_array['page']) ? $get_array['page'] : 0;
                }
            }
            $data['page'] = $page;
            $data['getProduct'] = $getProduct;

            return response()->json([
                'meta_title' => $data['meta_title'],
                'meta_description' => $data['meta_description'],
                'meta_keywords' => $data['meta_keywords'],
                'getCategory' => $data['getCategory'],
                'page' => $data['page'],
                'getProduct' => $data['getProduct'],
            ]);
        } else {
            abort(404);
        }
    }

    public function getFilterProductAjax(Request $request)
    {
        $getProduct = ProductModel::getProduct();
        $page = 0;

        if (!empty($getProduct->nextPageUrl())) {
            $parse_url = parse_url($getProduct->nextPageUrl());

            if (!empty($parse_url['query'])) {
                parse_str($parse_url['query'], $get_array);
                $page = !empty($get_array['page']) ? $get_array['page'] : 0;
            }
        }

        // Directly return the data in the JSON response
        return response()->json([
            'status' => true,
            'page' => $page,
            'getProduct' => $getProduct,
            'message' => 'Request successful',
        ], 200);
    }
}
