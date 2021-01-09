<?php

namespace App\Http\Controllers;

use App\Models\Bankbranch;
use App\Models\Category_three;
use App\Models\Category_two;
use App\Models\City;
use App\Models\District;
use App\Models\Item;
use Illuminate\Http\Request;

class CommonController extends Controller
{
    public function get_state_based_district(Request $request)
    {
        $state_id = $request->state_id;
        $district_id = "";
        if ($request->has('district_id')) {
            $district_id = $request->district_id;
        }

        $district = District::where('state_id', $state_id)->get();
        $option = "";
        $option .= count($district) > 0 ? "<option value=''> Choose District </option>" : "<option value=''> No Result Found </option>";
        $select = "";
        foreach ($district as $value) {
            if ($district_id != "") {
                $select = $district_id == $value->id ? "Selected" : "";
            } else {
                $select = "";
            }
            $option .= "<option value=" . $value->id . "   " . $select . ">" . $value->name . "</option>";
        }

        die(json_encode(array(
            "option" => $option
        )));
    }

    public function get_district_based_city(Request $request)
    {
        $district_id = $request->district_id;
        $city_id = "";
        if ($request->has('city_id')) {
            $city_id = $request->city_id;
        }

        $city = City::where('district_id', $district_id)->get();
        $option = "";
        $option .= count($city) > 0 ? "<option value=''> Choose City </option>" : "<option value=''> No Result Found </option>";
        $select = "";
        foreach ($city as $value) {
            if ($city_id != "") {
                $select = $city_id == $value->id ? "Selected" : "";
            } else {
                $select = "";
            }
            $option .= "<option value=" . $value->id . "   " . $select . ">" . $value->name . "</option>";
        }

        die(json_encode(array(
            "option" => $option
        )));
    }


    public function get_bank_based_branch(Request $request)
    {
        $bank_id = $request->bank_id;
        $branch_id = "";
        if ($request->has('branch_id')) {
            $branch_id = $request->branch_id;
        }

        $branch = Bankbranch::where('bank_id', $bank_id)->get();
        $option = "";
        $option .= count($branch) > 0 ? "<option value=''> Choose Branch </option>" : "<option value=''> No Result Found </option>";
        $select = "";
        foreach ($branch as $value) {
            if ($branch_id != "") {
                $select = $branch_id == $value->id ? "Selected" : "";
            } else {
                $select = "";
            }
            $option .= "<option value=" . $value->id . "   " . $select . ">" . $value->branch . "</option>";
        }

        die(json_encode(array(
            "option" => $option
        )));
    }

    public function get_branch_based_ifsc(Request $request)
    {
        $branch_id = $request->branch_id;
        $ifsc_det = Bankbranch::where('id', $branch_id)->get();


        $value = count($ifsc_det) > 0 ? $ifsc_det[0]->ifsc : "";
        die(json_encode(array(
            "value" => $value
        )));
    }

    public function get_category_one_based_category_two(Request $request)
    {
        $category_one_id = $request->category_one_id;
        $category_two_id = "";
        if ($request->has('category_two_id')) {
            $category_two_id = $request->category_two_id;
        }

        $category_two = Category_two::where('category_one_id', $category_one_id)->get();
        $option = "";
        $option .= count($category_two) > 0 ? "<option value=''> Choose Category 2  </option>" : "<option value=''> No Result Found </option>";
        $select = "";
        foreach ($category_two as $value) {
            if ($category_two_id != "") {
                $select = $category_two_id == $value->id ? "Selected" : "";
            } else {
                $select = "";
            }
            $option .= "<option value=" . $value->id . "   " . $select . ">" . $value->name . "</option>";
        }

        die(json_encode(array(
            "option" => $option
        )));
    }

    public function get_category_based_item_dets(Request $request)
    {
        $category_id = $request->category_id;
        $item_id = "";
        if ($request->has('item_id')) {
            $item_id = $request->item_id;
        }

        $item = Item::where('category_id', $category_id)->get();
        $option = "";
        $option .= count($item) > 0 ? "<option value=''> Choose Item </option>" : "<option value=''> No Result Found </option>";
        $select = "";
        foreach ($item as $value) {
            if ($item_id != "") {
                $select = $item_id == $value->id ? "Selected" : "";
            } else {
                $select = "";
            }
            $option .= "<option value=" . $value->id . "   " . $select . ">" . $value->name . "</option>";
        }

        die(json_encode(array(
            "option" => $option
        )));
    }

    public function get_category_two_based_category_three(Request $request)
    {
        $category_two_id = $request->category_two_id;
        $category_three_id = "";
        if ($request->has('category_three_id')) {
            $category_three_id = $request->category_three_id;
        }

        $category_three = Category_three::where('category_two_id', $category_two_id)->get();
        $option = "";
        $option .= count($category_three) > 0 ? "<option value=''> Choose Category 3  </option>" : "<option value=''> No Result Found </option>";
        $select = "";
        foreach ($category_three as $value) {
            if ($category_three_id != "") {
                $select = $category_three_id == $value->id ? "Selected" : "";
            } else {
                $select = "";
            }
            $option .= "<option value=" . $value->id . "   " . $select . ">" . $value->name . "</option>";
        }

        die(json_encode(array(
            "option" => $option
        )));
    }

    public function get_category_based_item(Request $request)
    {
        $category_1 = isset($request->category_one_id) && !empty($request->category_one_id) ? $request->category_one_id : "";
        $category_2 = isset($request->category_two_id) && !empty($request->category_two_id) ? $request->category_two_id : "";
        $category_3 = isset($request->category_three_id) && !empty($request->category_three_id) ? $request->category_three_id : "";
        $item_id = isset($request->item_id) && !empty($request->item_id) ? $request->item_id : "";

        $condition = [];
        $category_1 != "" ?  $condition['category_1'] = $category_1 : "";
        $category_2 != "" ?  $condition['category_2'] = $category_2 : "";
        $category_3 != "" ?  $condition['category_3'] = $category_3 : "";

        if (count($condition) > 0) {
            $item = Item::where($condition)->get();
            $option = "";
            $option .= count($item) > 0 ? "<option value=''> Choose Item  </option>" : "<option value=''> No Result Found </option>";
            $select = "";
            foreach ($item as $value) {
                if ($item_id != "") {
                    $select = $item_id == $value->id ? "Selected" : "";
                } else {
                    $select = "";
                }
                $option .= "<option value=" . $value->id . "   " . $select . ">" . $value->name . "</option>";
            }

            die(json_encode(array(
                "option" => $option
            )));
        }
    }

    public function get_category_based_bulk_item(Request $request)
    {
        $category_1 = isset($request->category_one_id) && !empty($request->category_one_id) ? $request->category_one_id : "";
        $category_2 = isset($request->category_two_id) && !empty($request->category_two_id) ? $request->category_two_id : "";
        $category_3 = isset($request->category_three_id) && !empty($request->category_three_id) ? $request->category_three_id : "";
        $item_id = isset($request->item_id) && !empty($request->item_id) ? $request->item_id : "";

        $condition = [];
        $category_1 != "" ?  $condition['category_1'] = $category_1 : "";
        $category_2 != "" ?  $condition['category_2'] = $category_2 : "";
        $category_3 != "" ?  $condition['category_3'] = $category_3 : "";
        $condition['item_type'] = "Bulk";

        if (count($condition) > 0) {
            $item = Item::where($condition)->get();
            $option = "";
            $option .= count($item) > 0 ? "<option value=''> Choose Item  </option>" : "<option value=''> No Result Found </option>";
            $select = "";
            foreach ($item as $value) {
                if ($item_id != "") {
                    $select = $item_id == $value->id ? "Selected" : "";
                } else {
                    $select = "";
                }
                $option .= "<option value=" . $value->id . "   " . $select . ">" . $value->name . "</option>";
            }

            die(json_encode(array(
                "option" => $option
            )));
        }
    }
}
