<?php

use App\Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            ['name'=>'state_list','label'=>'State List','guard_name'=>'web','type'=>'Master','class'=>'state_list'],
            ['name'=>'state_create','label'=>'State Create','guard_name'=>'web','type'=>'Master','class'=>'state_list'],
            ['name'=>'state_edit','label'=>'State Edit','guard_name'=>'web','type'=>'Master','class'=>'state_list'],
            ['name'=>'state_delete','label'=>'State Delete','guard_name'=>'web','type'=>'Master','class'=>'state_list'],

            ['name'=>'district_list','label'=>'District List','guard_name'=>'web','type'=>'Master','class'=>'district_list'],
            ['name'=>'district_create','label'=>'District Create','guard_name'=>'web','type'=>'Master','class'=>'district_list'],
            ['name'=>'district_edit','label'=>'District Edit','guard_name'=>'web','type'=>'Master','class'=>'district_list'],
            ['name'=>'district_delete','label'=>'District Delete','guard_name'=>'web','type'=>'Master','class'=>'district_list'],

            ['name'=>'city_list','label'=>'City List','guard_name'=>'web','type'=>'Master','class'=>'city_list'],
            ['name'=>'city_create','label'=>'City Create','guard_name'=>'web','type'=>'Master','class'=>'city_list'],
            ['name'=>'city_edit','label'=>'City Edit','guard_name'=>'web','type'=>'Master','class'=>'city_list'],
            ['name'=>'city_delete','label'=>'City Delete','guard_name'=>'web','type'=>'Master','class'=>'city_list'],

            ['name'=>'location_type_list','label'=>'Location Type List','guard_name'=>'web','type'=>'Master','class'=>'location_type_list'],
            ['name'=>'location_type_create','label'=>'Location Type Create','guard_name'=>'web','type'=>'Master','class'=>'location_type_list'],
            ['name'=>'location_type_edit','label'=>'Location Type Edit','guard_name'=>'web','type'=>'Master','class'=>'location_type_list'],
            ['name'=>'location_type_delete','label'=>'Location Type Delete','guard_name'=>'web','type'=>'Master','class'=>'location_type_list'],

            ['name'=>'address_type_list','label'=>'Address Type List','guard_name'=>'web','type'=>'Master','class'=>'address_type_list'],
            ['name'=>'address_type_create','label'=>'Address Type Create','guard_name'=>'web','type'=>'Master','class'=>'address_type_list'],
            ['name'=>'address_type_edit','label'=>'Address Type Edit','guard_name'=>'web','type'=>'Master','class'=>'address_type_list'],
            ['name'=>'address_type_delete','label'=>'Address Type Delete','guard_name'=>'web','type'=>'Master','class'=>'address_type_list'],

            ['name'=>'location_list','label'=>'Location List','guard_name'=>'web','type'=>'Master','class'=>'location_list'],
            ['name'=>'location_create','label'=>'Location Create','guard_name'=>'web','type'=>'Master','class'=>'location_list'],
            ['name'=>'location_edit','label'=>'Location Edit','guard_name'=>'web','type'=>'Master','class'=>'location_list'],
            ['name'=>'location_delete','label'=>'Location Delete','guard_name'=>'web','type'=>'Master','class'=>'location_list'],

            ['name'=>'bank_list','label'=>'Bank List','guard_name'=>'web','type'=>'Master','class'=>'bank_list'],
            ['name'=>'bank_create','label'=>'Bank Create','guard_name'=>'web','type'=>'Master','class'=>'bank_list'],
            ['name'=>'bank_edit','label'=>'Bank Edit','guard_name'=>'web','type'=>'Master','class'=>'bank_list'],
            ['name'=>'bank_delete','label'=>'Bank Delete','guard_name'=>'web','type'=>'Master','class'=>'bank_list'],

            ['name'=>'bank_branch_list','label'=>'Bank Branch List','guard_name'=>'web','type'=>'Master','class'=>'bank_branch_list'],
            ['name'=>'bank_branch_create','label'=>'Bank Branch Create','guard_name'=>'web','type'=>'Master','class'=>'bank_branch_list'],
            ['name'=>'bank_branch_edit','label'=>'Bank Branch Edit','guard_name'=>'web','type'=>'Master','class'=>'bank_branch_list'],
            ['name'=>'bank_branch_delete','label'=>'Bank Branch Delete','guard_name'=>'web','type'=>'Master','class'=>'bank_branch_list'],


            ['name'=>'denomination_list','label'=>'Denomination List','guard_name'=>'web','type'=>'Master','class'=>'denomination_list'],
            ['name'=>'denomination_create','label'=>'Denomination Create','guard_name'=>'web','type'=>'Master','class'=>'denomination_list'],
            ['name'=>'denomination_edit','label'=>'Denomination Edit','guard_name'=>'web','type'=>'Master','class'=>'denomination_list'],
            ['name'=>'denomination_delete','label'=>'Denomination Delete','guard_name'=>'web','type'=>'Master','class'=>'denomination_list'],

            ['name'=>'accounts_type_list','label'=>'Accounts Type List','guard_name'=>'web','type'=>'Master','class'=>'accounts_type_list'],
            ['name'=>'accounts_type_create','label'=>'Accounts Type Create','guard_name'=>'web','type'=>'Master','class'=>'accounts_type_list'],
            ['name'=>'accounts_type_edit','label'=>'Accounts Type Edit','guard_name'=>'web','type'=>'Master','class'=>'accounts_type_list'],
            ['name'=>'accounts_type_delete','label'=>'Accounts Type Delete','guard_name'=>'web','type'=>'Master','class'=>'accounts_type_list'],

            ['name'=>'department_list','label'=>'Department List','guard_name'=>'web','type'=>'Master','class'=>'department_list'],
            ['name'=>'department_create','label'=>'Department Create','guard_name'=>'web','type'=>'Master','class'=>'department_list'],
            ['name'=>'department_edit','label'=>'Department Edit','guard_name'=>'web','type'=>'Master','class'=>'department_list'],
            ['name'=>'department_delete','label'=>'Department Delete','guard_name'=>'web','type'=>'Master','class'=>'department_list'],

            ['name'=>'desigination_list','label'=>'Desigination List','guard_name'=>'web','type'=>'Master','class'=>'desigination_list'],
            ['name'=>'desigination_create','label'=>'Desigination Create','guard_name'=>'web','type'=>'Master','class'=>'desigination_list'],
            ['name'=>'desigination_edit','label'=>'Desigination Edit','guard_name'=>'web','type'=>'Master','class'=>'desigination_list'],
            ['name'=>'desigination_delete','label'=>'Desigination Delete','guard_name'=>'web','type'=>'Master','class'=>'desigination_list'],

            ['name'=>'employee_list','label'=>'Employee List','guard_name'=>'web','type'=>'Master','class'=>'employee_list'],
            ['name'=>'employee_create','label'=>'Employee Create','guard_name'=>'web','type'=>'Master','class'=>'employee_list'],
            ['name'=>'employee_edit','label'=>'Employee Edit','guard_name'=>'web','type'=>'Master','class'=>'employee_list'],
            ['name'=>'employee_delete','label'=>'Employee Delete','guard_name'=>'web','type'=>'Master','class'=>'employee_list'],

            ['name'=>'expense_list','label'=>'Expense Master List','guard_name'=>'web','type'=>'Master','class'=>'expense_list'],
            ['name'=>'expense_create','label'=>'Expense Master Create','guard_name'=>'web','type'=>'Master','class'=>'expense_list'],
            ['name'=>'expense_edit','label'=>'Expense Master Edit','guard_name'=>'web','type'=>'Master','class'=>'expense_list'],
            ['name'=>'expense_delete','label'=>'Expense Master Delete','guard_name'=>'web','type'=>'Master','class'=>'expense_list'],

            ['name'=>'income_list','label'=>'Income List','guard_name'=>'web','type'=>'Master','class'=>'income_list'],
            ['name'=>'income_create','label'=>'Income Create','guard_name'=>'web','type'=>'Master','class'=>'income_list'],
            ['name'=>'income_edit','label'=>'Income Edit','guard_name'=>'web','type'=>'Master','class'=>'income_list'],
            ['name'=>'income_delete','label'=>'Income Delete','guard_name'=>'web','type'=>'Master','class'=>'income_list'],

            ['name'=>'gst_master_list','label'=>'Gst Master List','guard_name'=>'web','type'=>'Master','class'=>'gst_master_list'],
            ['name'=>'gst_master_create','label'=>'Gst Master Create','guard_name'=>'web','type'=>'Master','class'=>'gst_master_list'],
            ['name'=>'gst_master_edit','label'=>'Gst Master Edit','guard_name'=>'web','type'=>'Master','class'=>'gst_master_list'],
            ['name'=>'gst_master_delete','label'=>'Gst Master Delete','guard_name'=>'web','type'=>'Master','class'=>'gst_master_list'],

            ['name'=>'gift_voucher_matser_list','label'=>'Gift Voucher Master List','guard_name'=>'web','type'=>'Master','class'=>'gift_voucher_matser_list'],
            ['name'=>'gift_voucher_matser_create','label'=>'Gift Voucher Master Create','guard_name'=>'web','type'=>'Master','class'=>'gift_voucher_matser_list'],
            ['name'=>'gift_voucher_matser_edit','label'=>'Gift Voucher Master Edit','guard_name'=>'web','type'=>'Master','class'=>'gift_voucher_matser_list'],
            ['name'=>'gift_voucher_matser_delete','label'=>'Gift Voucher Master Delete','guard_name'=>'web','type'=>'Master','class'=>'gift_voucher_matser_list'],

            ['name'=>'uom_list','label'=>'Uom List','guard_name'=>'web','type'=>'Master','class'=>'uom_list'],
            ['name'=>'uom_create','label'=>'Uom Create','guard_name'=>'web','type'=>'Master','class'=>'uom_list'],
            ['name'=>'uom_edit','label'=>'Uom Edit','guard_name'=>'web','type'=>'Master','class'=>'uom_list'],
            ['name'=>'uom_delete','label'=>'Uom Delete','guard_name'=>'web','type'=>'Master','class'=>'uom_list'],

            ['name'=>'language_master_list','label'=>'Language Master List','guard_name'=>'web','type'=>'Master','class'=>'language_master_list'],
            ['name'=>'language_master_create','label'=>'Language Master Create','guard_name'=>'web','type'=>'Master','class'=>'language_master_list'],
            ['name'=>'language_master_edit','label'=>'Language Master Edit','guard_name'=>'web','type'=>'Master','class'=>'language_master_list'],
            ['name'=>'language_master_delete','label'=>'Language Master Delete','guard_name'=>'web','type'=>'Master','class'=>'language_master_list'],

            ['name'=>'category_name_master_list','label'=>'Category Name List','guard_name'=>'web','type'=>'Master','class'=>'category_name_master_list'],
            ['name'=>'category_name_master_create','label'=>'Category Name Create','guard_name'=>'web','type'=>'Master','class'=>'category_name_master_list'],
            ['name'=>'category_name_master_edit','label'=>'Category Name Edit','guard_name'=>'web','type'=>'Master','class'=>'category_name_master_list'],
            ['name'=>'category_name_master_delete','label'=>'Category Name Delete','guard_name'=>'web','type'=>'Master','class'=>'category_name_master_list'],
            
            ['name'=>'category_1_master_list','label'=>'Category-1 Name List','guard_name'=>'web','type'=>'Master','class'=>'category_1_master_list'],
            ['name'=>'category_1_master_create','label'=>'Category-1 Name Create','guard_name'=>'web','type'=>'Master','class'=>'category_1_master_list'],
            ['name'=>'category_1_master_edit','label'=>'Category-1 Name Edit','guard_name'=>'web','type'=>'Master','class'=>'category_1_master_list'],
            ['name'=>'category_1_master_delete','label'=>'Category-1 Name Delete','guard_name'=>'web','type'=>'Master','class'=>'category_1_master_list'],

            ['name'=>'category_2_master_list','label'=>'Category-2 Name List','guard_name'=>'web','type'=>'Master','class'=>'category_2_master_list'],
            ['name'=>'category_2_master_create','label'=>'Category-2 Name Create','guard_name'=>'web','type'=>'Master','class'=>'category_2_master_list'],
            ['name'=>'category_2_master_edit','label'=>'Category-2 Name Edit','guard_name'=>'web','type'=>'Master','class'=>'category_2_master_list'],
            ['name'=>'category_2_master_delete','label'=>'Category-2 Name Delete','guard_name'=>'web','type'=>'Master','class'=>'category_2_master_list'],

            ['name'=>'category_3_master_list','label'=>'Category-3 Name List','guard_name'=>'web','type'=>'Master','class'=>'category_3_master_list'],
            ['name'=>'category_3_master_create','label'=>'Category-3 Name Create','guard_name'=>'web','type'=>'Master','class'=>'category_3_master_list'],
            ['name'=>'category_3_master_edit','label'=>'Category-3 Name Edit','guard_name'=>'web','type'=>'Master','class'=>'category_3_master_list'],
            ['name'=>'category_3_master_delete','label'=>'Category-3 Name Delete','guard_name'=>'web','type'=>'Master','class'=>'category_3_master_list'],

            ['name'=>'agent_list','label'=>'Agent List','guard_name'=>'web','type'=>'Master','class'=>'agent_list'],
            ['name'=>'agent_create','label'=>'Agent Create','guard_name'=>'web','type'=>'Master','class'=>'agent_list'],
            ['name'=>'agent_edit','label'=>'Agent Edit','guard_name'=>'web','type'=>'Master','class'=>'agent_list'],
            ['name'=>'agent_delete','label'=>'Agent Delete','guard_name'=>'web','type'=>'Master','class'=>'agent_list'],

            ['name'=>'customer_list','label'=>'Customer Name List','guard_name'=>'web','type'=>'Master','class'=>'customer_list'],
            ['name'=>'customer_create','label'=>'Customer Name Create','guard_name'=>'web','type'=>'Master','class'=>'customer_list'],
            ['name'=>'customer_edit','label'=>'Customer Name Edit','guard_name'=>'web','type'=>'Master','class'=>'customer_list'],
            ['name'=>'customer_delete','label'=>'Customer Name Delete','guard_name'=>'web','type'=>'Master','class'=>'customer_list'],

            ['name'=>'supplier_list','label'=>'Supplier List','guard_name'=>'web','type'=>'Master','class'=>'supplier_list'],
            ['name'=>'supplier_create','label'=>'Supplier Create','guard_name'=>'web','type'=>'Master','class'=>'supplier_list'],
            ['name'=>'supplier_edit','label'=>'Supplier Edit','guard_name'=>'web','type'=>'Master','class'=>'supplier_list'],
            ['name'=>'supplier_delete','label'=>'Supplier Delete','guard_name'=>'web','type'=>'Master','class'=>'supplier_list'],


            ['name'=>'area_list','label'=>'Area Name List','guard_name'=>'web','type'=>'Master','class'=>'area_list'],
            ['name'=>'area_create','label'=>'Area Name Create','guard_name'=>'web','type'=>'Master','class'=>'area_list'],
            ['name'=>'area_edit','label'=>'Area Name Edit','guard_name'=>'web','type'=>'Master','class'=>'area_list'],
            ['name'=>'area_delete','label'=>'Area Name Delete','guard_name'=>'web','type'=>'Master','class'=>'area_list'],

            ['name'=>'agent_area_mapping_list','label'=>'Agent Area Mapping List','guard_name'=>'web','type'=>'Master','class'=>'agent_area_mapping_list'],
            ['name'=>'agent_area_mapping_create','label'=>'Agent Area Mapping Create','guard_name'=>'web','type'=>'Master','class'=>'agent_area_mapping_list'],
            ['name'=>'agent_area_mapping_edit','label'=>'Agent Area Mapping Edit','guard_name'=>'web','type'=>'Master','class'=>'agent_area_mapping_list'],
            ['name'=>'agent_area_mapping_delete','label'=>'Agent Area Mapping Delete','guard_name'=>'web','type'=>'Master','class'=>'agent_area_mapping_list'],

            ['name'=>'item_master_list','label'=>'Item Master List','guard_name'=>'web','type'=>'Master','class'=>'item_master_list'],
            ['name'=>'item_master_create','label'=>'Item Master Create','guard_name'=>'web','type'=>'Master','class'=>'item_master_list'],
            ['name'=>'item_master_edit','label'=>'Item Master Edit','guard_name'=>'web','type'=>'Master','class'=>'item_master_list'],
            ['name'=>'item_master_delete','label'=>'Item Master Delete','guard_name'=>'web','type'=>'Master','class'=>'item_master_list'],

            ['name'=>'uom_factor_convertion_for_item_list','label'=>'Uom Factor Convertion for Item Name List','guard_name'=>'web','type'=>'Master','class'=>'uom_factor_convertion_for_item_list'],
            ['name'=>'uom_factor_convertion_for_item_create','label'=>'Uom Factor Convertion for Item Name Create','guard_name'=>'web','type'=>'Master','class'=>'uom_factor_convertion_for_item_list'],
            ['name'=>'uom_factor_convertion_for_item_edit','label'=>'Uom Factor Convertion for Item Name Edit','guard_name'=>'web','type'=>'Master','class'=>'uom_factor_convertion_for_item_list'],
            ['name'=>'uom_factor_convertion_for_item_delete','label'=>'Uom Factor Convertion for Item Name Delete','guard_name'=>'web','type'=>'Master','class'=>'uom_factor_convertion_for_item_list'],

            ['name'=>'item_tax_details_list','label'=>'Item Tax Details List','guard_name'=>'web','type'=>'Master','class'=>'item_tax_details_list'],
            ['name'=>'item_tax_details_create','label'=>'Item Tax Details Create','guard_name'=>'web','type'=>'Master','class'=>'item_tax_details_list'],
            ['name'=>'item_tax_details_edit','label'=>'Item Tax Details Edit','guard_name'=>'web','type'=>'Master','class'=>'item_tax_details_list'],
            ['name'=>'item_tax_details_delete','label'=>'Item Tax Details Delete','guard_name'=>'web','type'=>'Master','class'=>'item_tax_details_list'],

            ['name'=>'user_list','label'=>'User List','guard_name'=>'web','type'=>'Master','class'=>'user_list'],
            ['name'=>'user_create','label'=>'User Create','guard_name'=>'web','type'=>'Master','class'=>'user_list'],
            ['name'=>'user_edit','label'=>'User Edit','guard_name'=>'web','type'=>'Master','class'=>'user_list'],
            ['name'=>'user_delete','label'=>'User Delete','guard_name'=>'web','type'=>'Master','class'=>'user_list'],

            ['name'=>'role_list','label'=>'Role List','guard_name'=>'web','type'=>'Master','class'=>'role_list'],
            ['name'=>'role_create','label'=>'Role Create','guard_name'=>'web','type'=>'Master','class'=>'role_list'],
            ['name'=>'role_edit','label'=>'Role Edit','guard_name'=>'web','type'=>'Master','class'=>'role_list'],
            ['name'=>'role_delete','label'=>'Role Delete','guard_name'=>'web','type'=>'Master','class'=>'role_list'],

            ['name'=>'brand_list','label'=>'Brand List','guard_name'=>'web','type'=>'Master','class'=>'brand_list'],
            ['name'=>'brand_create','label'=>'Brand Create','guard_name'=>'web','type'=>'Master','class'=>'brand_list'],
            ['name'=>'brand_edit','label'=>'Brand Edit','guard_name'=>'web','type'=>'Master','class'=>'brand_list'],
            ['name'=>'brand_delete','label'=>'Brand Delete','guard_name'=>'web','type'=>'Master','class'=>'brand_list'],

            ['name'=>'category_list','label'=>'Category List','guard_name'=>'web','type'=>'Master','class'=>'category_list'],
            ['name'=>'category_create','label'=>'Category Create','guard_name'=>'web','type'=>'Master','class'=>'category_list'],
            ['name'=>'category_edit','label'=>'Category Edit','guard_name'=>'web','type'=>'Master','class'=>'category_list'],
            ['name'=>'category_delete','label'=>'Category Delete','guard_name'=>'web','type'=>'Master','class'=>'category_list'],

            
 ];
 
 
         foreach ($permissions as $permission) {
              Permission::create(['name' => $permission['name'],'label'=>$permission['label'],'guard_name'=>$permission['guard_name'],'type'=>$permission['type'],'class'=>$permission['class']]);
         }
    }
}
