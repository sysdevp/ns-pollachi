<?php

namespace App\Imports;

use App\Item;
use App\Models\Category_one;
use App\Models\Category_three;
use App\Models\Category_two;
use App\Models\Item as ModelsItem;
use App\Models\Uom;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use phpDocumentor\Reflection\Types\Null_;

class ItemsImport implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {

       // echo "<pre>";print_r($rows);exit;
        $item_main_array=[];
        $bulk_item_id=0;
        foreach ($rows as $key=>$row) 
        {
            $uom_id=0;
            $uom_details=Uom::where(['name'=>'Kg'])->get();
            if(count($uom_details)>0)
            {
                $uom_id=$uom_details[0]->id;
            }else
            {
                $uom=new Uom();
                $uom->name="Kg";
                $uom->save();
                $uom_id=$uom->id;
            }

            
           if($key >0 && $row[4] !="")
           {

            $category_one_id=0;
            $category_two_id=0;
            $category_three_id=0;

            /* Category One Details  */
            $condition_category_one=array('name'=>$row[1]);
            $category_one_dets=Category_one::where($condition_category_one)->get();
            if(count($category_one_dets) == 0)
            {
                $category_one=new Category_one;
                $category_one->name=$row[1];
                $category_one->created_by=0;
                $category_one->save();
                $category_one_id=$category_one->id;

            }else if(count($category_one_dets) > 0)
            {
                $category_one_id=$category_one_dets[0]->id;
            }

            
            /* Category Two Details  */
            if($category_one_id >0  && $row[2] !="")
            {
                $condition_category_two=array(
                    'category_one_id'=>$category_one_id,
                    'name'=>$row[2]);

                    $category_two_details=Category_two::where($condition_category_two)->get();
                    if(count($category_two_details) == 0)
                    {
                        $category_two=new Category_two;
                        $category_two->name=$row[2];
                        $category_two->category_one_id=$category_one_id;
                        $category_two->created_by=0;
                        $category_two->save();
                        $category_two_id=$category_two->id;
                        
                    }else if(count($category_two_details) > 0)
                    {
                        $category_two_id=$category_two_details[0]->id;

                    }
            }

            /* Category Three Details  */
            if($category_one_id >=0 && $category_two_id >0 && $row[3] !="")
            {
                $condition_category_three=array(
                    'category_one_id'=>$category_one_id,
                    'category_two_id'=>$category_two_id,
                    'name'=>$row[3]);

                    $category_three_details=Category_three::where($condition_category_three)->get();
                    if(count($category_three_details) == 0)
                    {
                        $category_three=new Category_three;
                        $category_three->name=$row[3];
                        $category_three->category_one_id=$category_one_id;
                        $category_three->category_two_id=$category_two_id;
                        $category_three->created_by=0;
                        $category_three->save();
                        $category_three_id=$category_three->id;
                        
                    }else if(count($category_three_details) > 0)
                    {
                        $category_three_id=$category_three_details[0]->id;

                    }
            }
            $bulk_item_id=0;
            if($row[7] == "Repack")
            {
                if($row[8] != "")
                {
                    $bulk_item=ModelsItem::where('name',$row[8])->get();
                    $bulk_item_id=count($bulk_item)>0 ? $bulk_item[0]->id : NULL;
                }else{
                    $bulk_item_id=NULL;    
                }

            }else{
                $bulk_item_id=NULL;
            }

           $weigth_in_grams=$row[9] != "" ? $row[9] : 0;
           $weight_in_kg=$weigth_in_grams !="" && $weigth_in_grams >0 ? $weigth_in_grams/1000 : 0;



            if($category_one_id != "")
            {
                $item=new ModelsItem();
                $item->name=$row[4];
                $item->category_1=$category_one_id;
                $item->category_2=$category_two_id;
                $item->category_3=$category_three_id;
                $item->print_name_in_english=$row[4];
                $item->print_name_in_language_1=$row[5];
                $item->print_name_in_language_2=$row[6];
                $item->item_type=$row[7];
                $item->weight_in_grams=$weigth_in_grams;
                $item->weight_in_kg=$weight_in_kg;
                $item->bulk_item_id=$bulk_item_id;
                $item->mrp=$row[11];
                $item->default_selling_price=$row[12];
                $item->hsn=$row[14];
                $item->uom_id=$uom_id;
                $item->created_by=0;
                $item->save();
              }



            

            }
            
        }

        //return $item_main_array;

      


    }
}
