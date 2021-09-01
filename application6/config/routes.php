<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Home';
$route['Create-account'] = "Home/create_account";
$route['save-account'] = "Home/saveAccount";
$route['add-vender'] = "backend/Login/addVender";
$route['provide-plan-vender'] = "backend/Login/provideplan";
$route['edit-vender/(:any)'] = "backend/Login/editVender/$1";
// $route['add-user'] = "backend/Login/addUser";
$route['add-user'] = "backend/Users/saveUsers";
$route['user_save'] = "backend/Login/user_save";
$route['vender_account'] = "backend/Login/saveAccount";
$route['vender_update/(:any)'] = "backend/Login/vender_update/$1";
$route['update-user/(:any)'] = "backend/Login/updateUser/$1";
$route['user_pdate/(:any)'] = "backend/Login/user_pdate/$1";
$route['updateVenders'] = "backend/Login/updateVenders";
$route['vender_delete/(:any)'] = "backend/Login/vender_delete/$1";
$route['user_delete/(:any)'] = "backend/Login/user_delete/$1";
$route['admin'] = "backend/Login/index";
$route['Dashboard'] = "backend/Login/check_login";
$route['dashboard'] = "backend/Login/dashboard";
$route['about-us'] = "backend/Login/about_us/$1";
$route['aboutus'] = "backend/Login/aboutus";
$route['contact-us'] = "backend/Login/contact_us";
$route['contactus'] = "backend/Login/contactus";
$route['about'] = "backend/Login/aboutview";
$route['contact'] = "backend/Login/contactview";
$route['User-membership'] = "backend/Login/Usermembership";
$route['User-membership-update'] = "backend/Login/Usermembershipupdate";
$route['user_plan_update'] = "backend/Login/user_plan_update";
$route['User-transaction'] = "backend/Users/usertransaction";
$route['User-comments'] = "backend/Users/user_comments";
$route['Vender-transaction'] = "backend/Login/Vendertransaction";
$route['offer-redeem'] = "backend/Vender/offerredeem";
$route['checkRedeem'] = "backend/Vender/checkRedeem";
$route['My-Redeem'] = "backend/Vender/myRedeem";
$route['confirm-order'] = "backend/Vender/confirm_order";
$route['all-users'] = "backend/Users/allUsers";
$route['all-venders'] = "backend/Login/allVenders"; 
$route['venders-verification-list'] = "backend/Login/unverifiedVenders";
$route['add-Manager'] = "backend/Login/addManager";
$route['update-Manager/(:any)'] = "backend/Login/updateManager/$1";
$route['save-Manager'] = "backend/Login/saveManager";
$route['all-manager'] = "backend/Login/allManagerList";
$route['update_Manager'] = "backend/Login/update_Manager";
$route['slide-ads'] = "backend/Login/slide_ads";
$route['save-ads'] = "backend/Login/save_Ads";
$route['news-save'] = "backend/Login/news_save";
$route['delete-ads'] = "backend/Login/delete_ads";
$route['category-list'] = "backend/Login/category_list";
$route['sub-category-list'] = "backend/Login/sub_category_list";
$route['aminity-list'] = "backend/Login/aminity_list";
$route['Offer'] = "backend/Login/offer";
$route['Offer-list'] = "backend/Login/offer_list";
$route['offer_save'] = "backend/Login/offer_save";
$route['profile'] = "backend/Login/profile";
$route['vender-profile'] = "backend/Login/vender_profile";
$route['offer-update/(:any)'] = "backend/Login/offer_update/$1";
$route['offer_dataupdate'] = "backend/Login/offer_dataupdate";
$route['profile_update'] = "backend/Login/profile_update";
$route['vender_profile_update'] = "backend/Login/vender_profile_update";
$route['offer-delete/(:any)'] = "backend/Login/offer_delete/$1";
$route['My-offer'] = "backend/Vender/my_offer";
$route['offer-save'] = "backend/Vender/offer_save";
$route['offer-list'] = "backend/Vender/offer_list";
$route['My-offer-delete/(:any)'] = "backend/Vender/dlt_myoffer/$1";
$route['my_offer_view'] = "backend/Vender/my_offer_view";
$route['My-offer-update/(:any)'] = "backend/Vender/my_offer_update/$1";
$route['create-plans'] = "backend/Login/create_plans";
$route['save-plans'] = "backend/Login/save_plans";
$route['plan-list'] = "backend/Login/plan_list";
$route['plan-update/(:any)'] = "backend/Login/update_plans/$1";
$route['plan_update_data'] = "backend/Login/plan_update_data";
$route['plan-delete/(:any)'] = "backend/Login/plan_delete/$1";
$route['Get-plan'] = "backend/Vender/Get_plan";
$route['provide-plan'] = "backend/Vender/provide_plan";
$route['Classified-list'] = "backend/Vender/classified_list";
$route['Classified-offer-create'] = "backend/Vender/classified_create";
$route['cls_offer_save'] = "backend/Vender/cls_offer_save";
$route['cls_offer_delete/(:any)'] = "backend/Vender/cls_offer_delete/$1";
$route['classified-update/(:any)'] = "backend/Vender/cls_offer_update/$1";
$route['cls_offer_updatedata'] = "backend/Vender/cls_offer_updatedata";
$route['myplan_detail'] = "backend/Vender/myplan_detail";
$route['Limited-offer-list'] = "backend/Vender/limited_list";
$route['Limited-offer-create'] = "backend/Vender/limited_create";
$route['lmtd_offer_save'] = "backend/Vender/lmtd_offer_save";
$route['Limited-update/(:any)'] = "backend/Vender/limited_offer_update/$1";
$route['limited_offer_updatedata'] = "backend/Vender/limited_offer_updatedata";
$route['limited_offer_delete/(:any)'] = "backend/Vender/limited_offer_delete/$1";
$route['Inventory-list'] = "backend/vender/inventory_list";
$route['inventory_delete/(:any)'] = "backend/Vender/inventory_delete/$1";
$route['inventory_update/(:any)'] = "backend/Vender/inventory_update/$1";
$route['update_inventory'] = "backend/Vender/update_inventory";

$route['inventory'] = "backend/Login/add_inventory";
$route['save-inventory'] = "backend/vender/save_inventory";
$route['Setting'] = "backend/vender/setting";
$route['save_points'] = "backend/vender/save_points";
$route['Create-branch'] = "backend/Vendor/Vendors/create_branch";
$route['save-branch'] = "backend/Vendor/Vendors/save_branch";
$route['show-branch/(:any)'] = "backend/Vendor/Vendors/show_branch/$1";
$route['dlt-branch/(:any)'] = "backend/Vendor/Vendors/dlt_branch/$1";
$route['update-branch'] = "backend/Vendor/Vendors/update_branch";
$route['vender-aminity'] = "backend/Vendor/Vendors/vender_aminity";
$route['level-list'] = "backend/Vender/level_list";

$route['help'] = "backend/Supports/help";
$route['rules'] = "backend/Supports/rules";
$route['find_us'] = "backend/Supports/find_us";
$route['contact_us'] = "backend/Supports/contact_us";
$route['for_venders'] = "backend/Supports/vender_info";
$route['about_us'] = "backend/Supports/about_us";

$route['nationality']   = "backend/Settings/nationality";
$route['country']       = "backend/Settings/country";
$route['region']        = "backend/Settings/region";
$route['city']          = "backend/Settings/city";
$route['district']      = "backend/Settings/district";
$route['Vat-setup']      = "backend/Settings/vat_setup";
$route['Currency-setup']      = "backend/Settings/currency_setup";

$route['Order-list'] = "backend/Login/allOrderList";
$route['user-order/(:any)'] = "backend/Login/userOrderList/$1";
$route['vender-order/(:any)'] = "backend/Login/venderOrderList/$1";
// $route['vender-aminity'] = "backend/Vendor/Vendors/delete_aminity";
 
$route['Offer-aproval'] = "backend/Item_verification/offer_aproval";
$route['Classified-aproval'] = "backend/Item_verification/classified_aproval";
$route['Limited-aproval'] = "backend/Item_verification/limited_aproval";
$route['Inventory-aproval'] = "backend/Item_verification/inventory_aproval";

$route['Vender-membership'] = "backend/Membership/vender_membership";
$route['User-membership'] = "backend/Membership/user_membership";
$route['Offer-setup'] = "backend/Membership/offer_setup";
$route['Classified-setup'] = "backend/Membership/classified_setup";
$route['Limited-setup'] = "backend/Membership/limited_setup";

$route['Rewards-level'] = "backend/Reward_gift/getLevels";
$route['Gift-senario'] = "backend/Reward_gift/getScenario";
$route['Manage-gift'] = "backend/Reward_gift/getManageGifts";
$route['Inventory-traking'] = "backend/Reward_gift/inventoryTraking";
$route['Point-claiming'] = "backend/Reward_gift/pointSetup";
$route['Point-adjust'] = "backend/Reward_gift/pointAdjust";

$route['Manage-vendor-contact-role'] = "backend/Admin_settings/vendor_contact_roles";
$route['Manage-roles'] = "backend/Admin_settings/manage_role_permission";
$route['Manage-managers'] = "backend/Admin_settings/manager_list_info";
$route['Manage-profile'] = "backend/Admin_settings/admin_profile";

$route['Users-records'] = "backend/Records/users_records";
$route['Vendor-records'] = "backend/Records/vendors_records";
$route['Offer-records'] = "backend/Records/offers_records";
$route['Classified-records'] = "backend/Records/classified_records";
$route['Limited-records'] = "backend/Records/limited_records";
$route['Claimed-offer-records'] = "backend/Records/claimOffer_records";
$route['Claimed-gift-records'] = "backend/Records/claimGift_records";
$route['Unclaimed-gift-records'] = "backend/Records/unclaimGift_records";
$route['Inventory-records'] = "backend/Records/inventroy_records";
$route['Comments-records'] = "backend/Records/comment_record";

$route['Renew-users-subscription/(:num)'] = "backend/Users/renewUsers";
$route['Users-view/(:num)'] = "backend/Users/view_users";

$route['User-activity'] = "backend/Reports/userActivity";
$route['Vendor-activity'] = "backend/Reports/vendorActivity";
$route['User-subscription'] = "backend/Reports/userSubscription";
$route['Vendor-subscription'] = "backend/Reports/vendorSubscription";
$route['Monthly-summary'] = "backend/Reports/monthly_summary";


$route['404_override'] = '';

