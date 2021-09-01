<?php defined('BASEPATH') OR exit('No direct script access allowed');

    class ExportIn extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model(array('backend/ModVender' => 'MV'));
            if(!$this->session->userdata('Login')){
                redirect('admin');
            }
        }

        public function user_subscription_csv(){
            $get = $this->input->get();
            $result =  $this->MR->getUserSubscription($get);      
        
            $fileName = 'user-subscription.csv';
        
            header('Content-Type: application/excel');
            header('Content-Disposition: attachment; filename="' . $fileName . '"');
        
            $data = array();
        
            $header_name = array('SERIAL NUMBER','Date Of Creation','User','Email','Mobile','Plan','Start Date','Expiry Date','Payment','Transaction No','Amount','Discount','Vat','Total');
        
            if(!empty($result)){
                $i = 1;
                foreach ($result as $value) {
                    $info[] = array($i,
                        date('m/d/yy',strtotime($value['create_date'])),
                        $value['name'],
                        $value['email'],
                        $value['contact'],
                        $value['plan_type'],
                        date('m/d/yy',$value['start_date']),
                        date('m/d/yy',$value['expire_date']),
                        $value['payment_by'] ? $value['payment_by'] : '-',
                        $value['transaction_no'],
                        $value['main_amount'],
                        $value['discount'],
                        $value['vat'],
                        $value['total_amount']
                    );
                    $i++;
                }
                $data = array_merge($data,$info);
            }
            $fp = fopen('php://output', 'w');            
            fputcsv($fp, $header_name);
            foreach ($data as $row) {
                fputcsv($fp, $row);
            }
            fclose($fp);
        }

        public function vendor_subscription_csv(){
            $get = $this->input->get();
            $result =  $this->MR->getVendorSubscription($get);      
        
            $fileName = 'vendor-subscription.csv';
        
            header('Content-Type: application/excel');
            header('Content-Disposition: attachment; filename="' . $fileName . '"');
        
            $data = array();
        
            $header_name = array('SERIAL NUMBER','Date Of Creation','User','Email','Mobile','Plan','Start Date','Expiry Date','Payment','Transaction No','Amount','Discount','Vat','Total');
        
            if(!empty($result)){
                $i = 1;
                foreach ($result as $value) {
                    $info[] = array($i,
                        date('m/d/yy',strtotime($value['create_date'])),
                        $value['name'],
                        $value['email'],
                        $value['contact'],
                        $value['plan_type'],
                        date('m/d/yy',$value['start_date']),
                        date('m/d/yy',$value['expire_date']),
                        $value['payment_by'] ? $value['payment_by'] : '-',
                        $value['transaction_no'],
                        $value['main_amount'],
                        $value['discount'],
                        $value['vat'],
                        $value['total_amount']
                    );
                    $i++;
                }
                $data = array_merge($data,$info);
            }
            $fp = fopen('php://output', 'w');            
            fputcsv($fp, $header_name);
            foreach ($data as $row) {
                fputcsv($fp, $row);
            }
            fclose($fp);
        }

        public function user_record_csv(){
            $get = $this->input->get();
            $result =   $this->MAS->getUsersRecords($get);      
        
            $fileName = 'user-records.csv';
        
            header('Content-Type: application/excel');
            header('Content-Disposition: attachment; filename="' . $fileName . '"');
        
            $data = array();
        
            $header_name = array('SERIAL NUMBER','Date Of Creation','User','Email','Mobile','Nationality','Gender','Age','Residence','city','Plan','Expiry Date','Expiry Account','Status','Payment(Inapp/Distributer)','Total');
        
            if(!empty($result)){
                $i = 1;
                foreach ($result as $value) {
                    $info[] = array($i,
                        date('m/d/yy',strtotime($value['added_date'])),
                        $value['user_name'],
                        $value['user_email'],
                        $value['user_mobile'],
                        nationalityString($value['user_nationality']),
                        $value['user_gender'],
                        $value['user_age'],
                        $value['address']."<br>".countryString($value['user_country']),
                        cityString($value['user_city']),
                        getUserPlanSubscriptionStr($value['plan_id']),
                        $value['expire_date'],
                        $value['expire_account'],
                        $value['user_status'],
                        $value['payment_by'],
                        $value['total_amount'],
                    );
                    $i++;
                }
                $data = array_merge($data,$info);
            }
            $fp = fopen('php://output', 'w');            
            fputcsv($fp, $header_name);
            foreach ($data as $row) {
                fputcsv($fp, $row);
            }
            fclose($fp);
        }

        public function vendor_record_csv(){
            $get = $this->input->get();
            $result =   $this->MAS->getVendorRecords($get);      
        
            $fileName = 'vendor-records.csv';
        
            header('Content-Type: application/excel');
            header('Content-Disposition: attachment; filename="' . $fileName . '"');
        
            $data = array();
        
            $header_name = array('Order No.','Date','Salesman','store','Catogory','Sub Catogory','Product','Detail','Total','Approval','Status');
        
            if(!empty($result)){
                $i = 1;
                foreach ($result as $value) {
                    $subtotal = $value['amount'] - $value['discount'];
                    $total_vat = (($subtotal * $value['vat']) / 100);
                    $total = $subtotal + $total_vat;
                    $offer_detail = getCatgoryTypeString($value['plan_id']).'-'.date('m/d/yy',(int)$value['start_date']).'-'.date('m/d/yy',(int)$value['expire_date']);
                    $detail = $value['campain_name'] ? $value['campain_name'] : $offer_detail;
                    if($value['v_status'] == 1){ $status = 'Active';}
                    else if($value['v_status'] == 0){$status = "Deactive";}
                    else{ $status = "Expire";}

                    $info[] = array($i,
                            $value['order_id'],
                            date('m/d/yy',strtotime($value['create_date'])),
                            $value['salesman'],
                            $value['store_name'],
                            getCatgoryTypeString($value['category_id']),
                            subCategoryTypeString($value['subcat_id']),
                            $value['product'],
                            $offer_detail,
                            $total,
                            getApproveStatusStr($value['approved_status']),
                            $status,
                    );
                    $i++;
                }
                $data = array_merge($data,$info);
            }
            $fp = fopen('php://output', 'w');            
            fputcsv($fp, $header_name);
            foreach ($data as $row) {
                fputcsv($fp, $row);
            }
            fclose($fp);
        }

        public function offers_record_csv(){
            $get = $this->input->get();
            $result =   $this->MAS->getOfferRecords($get);      
        
            $fileName = 'offers-records.csv';
        
            header('Content-Type: application/excel');
            header('Content-Disposition: attachment; filename="' . $fileName . '"');
        
            $data = array();
        
            $header_name = array('Offer No.', 'Date Of Creation', 'Store Name', 'Catogory', 'Type', 'Title', 'Saving Value', 'Starting date', 'Duration', 'status', 'number of redeemed offers', 'number of views', 'number of shares');
        
            if(!empty($result)){
                $i = 1;
                foreach ($result as $value) {
                    $info[] = array($i,
                            $value['add_date'],
                            $value['store_name'],
                            getCatgoryTypeString($value['category_id']),
                            $value['offer_type'],
                            $value['offer_title'],
                            $value['saving_amount'],
                            $value['add_date'],
                            $value['valid_date'],
                            $value['status'],
                            $value['redeemed_offers'],
                            $value['no_view'],
                            $value['no_share'],
                    );
                    $i++;
                }
                $data = array_merge($data,$info);
            }
            $fp = fopen('php://output', 'w');            
            fputcsv($fp, $header_name);
            foreach ($data as $row) {
                fputcsv($fp, $row);
            }
            fclose($fp);
        }

        public function classified_record_csv(){
            $get = $this->input->get();
            $result =   $this->MAS->getClassifiedRecords($get);      
        
            $fileName = 'classified-records.csv';
        
            header('Content-Type: application/excel');
            header('Content-Disposition: attachment; filename="' . $fileName . '"');
        
            $data = array();
        
            $header_name = array('Classified No.', 'Date Of Creation', 'Store', 'Catogory', 'Title', 'Region', 'City', 'Starting date', 'Duration', 'status', 'number of views', 'number of shares');
        
            if(!empty($result)){
                $i = 1;
                foreach ($result as $value) {
                    $info[] = array($i,
                            date('m/d/yy',strtotime($value['added_date'])),
                            $value['store_name'],
                            getCatgoryTypeString($value['category']),
                            $value['title'],
                            regionString($value['region']),
                            cityString($value['city']),
                            date('m/d/yy',$value['start_date']),
                            date('m/d/yy',$value['duration']),
                            $value['status'],
                            $value['no_of_view'],
                            $value['no_of_share'],
                    );
                    $i++;
                }
                $data = array_merge($data,$info);
            }
            $fp = fopen('php://output', 'w');            
            fputcsv($fp, $header_name);
            foreach ($data as $row) {
                fputcsv($fp, $row);
            }
            fclose($fp);
        }

        public function limited_record_csv(){
            $get = $this->input->get();
            $result =   $this->MAS->getLimitedRecords($get);      
        
            $fileName = 'limited-records.csv';
        
            header('Content-Type: application/excel');
            header('Content-Disposition: attachment; filename="' . $fileName . '"');
        
            $data = array();
        
            $header_name = array('Limited No.', 'Date Of Creation', 'Store', 'Catogory', 'Title', 'Region', 'City', 'Starting date', 'Duration', 'status', 'number of views', 'number of shares');
        
            if(!empty($result)){
                $i = 1;
                foreach ($result as $value) {
                    $info[] = array($i,
                            date('m/d/yy',strtotime($value['added_date'])),
                            $value['store_name'],
                            getCatgoryTypeString($value['category']),
                            $value['title'],
                            regionString($value['region']),
                            cityString($value['city']),
                            date('m/d/yy',$value['start_date']),
                            date('m/d/yy',$value['valid_date']),
                            $value['status'],
                            $value['no_of_view'],
                            $value['no_of_share'],
                    );
                    $i++;
                }
                $data = array_merge($data,$info);
            }
            $fp = fopen('php://output', 'w');            
            fputcsv($fp, $header_name);
            foreach ($data as $row) {
                fputcsv($fp, $row);
            }
            fclose($fp);
        }

        public function claimOffer_record_csv(){
            $get = $this->input->get();
            $result =   $this->MAS->getClaimOfferRecords($get);      
        
            $fileName = 'claimOffer-records.csv';
        
            header('Content-Type: application/excel');
            header('Content-Disposition: attachment; filename="' . $fileName . '"');
        
            $data = array();
        
            $header_name = array('Voucher No.', 'Claimed Date', 'Vendor', 'City', 'Branch', 'Offer Type', 'Offer Title Eng', 'User Name', 'Saving');
        
            if(!empty($result)){
                $i = 1;
                foreach ($result as $value) {
                    $info[] = array(
                        $value['voucher_code'],
                        date('m/d/yy',$value['claimed_date']),
                        $value['store_name'],
                        cityString($value['city']),
                        $value['branch_name'],
                        getOfferTypeString($value['offer_type']),
                        $value['offer_title'],
                        $value['user_name'],
                        $value['saving_amount'],
                    );
                    $i++;
                }
                $data = array_merge($data,$info);
            }
            $fp = fopen('php://output', 'w');            
            fputcsv($fp, $header_name);
            foreach ($data as $row) {
                fputcsv($fp, $row);
            }
            fclose($fp);
        }

        public function claimGift_record_csv(){
            $get = $this->input->get();
            $result =   $this->MAS->getClaimGiftRecords($get);      
        
            $fileName = 'claimGift-records.csv';
        
            header('Content-Type: application/excel');
            header('Content-Disposition: attachment; filename="' . $fileName . '"');
        
            $data = array();
        
            $header_name = array( 'Voucher No.', 'Won Date', 'Vendor', 'City', 'Branch', 'Title Eng', 'User Name', 'Value');
        
            if(!empty($result)){
                $i = 1;
                foreach ($result as $value) {
                    $info[] = array(
                        $value['voucher_code'],
                        date('m/d/yy',$value['won_date']),
                        $value['store_name'],
                        cityString($value['branch_city'],
                        $value['branch_name'],
                        $value['gift_name'],
                        $value['user_name'],
                        $value['amount'],
                    );
                    $i++;
                }
                $data = array_merge($data,$info);
            }
            $fp = fopen('php://output', 'w');            
            fputcsv($fp, $header_name);
            foreach ($data as $row) {
                fputcsv($fp, $row);
            }
            fclose($fp);
        }

        public function unclaimGift_record_csv(){
            $get = $this->input->get();
            $result =   $this->MAS->getUnclaimGiftRecords($get);      
        
            $fileName = 'unclaimGift-records.csv';
        
            header('Content-Type: application/excel');
            header('Content-Disposition: attachment; filename="' . $fileName . '"');
        
            $data = array();
        
            $header_name = array(  'Voucher No.', 'Won Date', 'Vendor', 'Title Eng', 'User Name', 'Value', 'Date of Expiry');
        
            if(!empty($result)){
                $i = 1;
                foreach ($result as $value) {
                    $info[] = array(
                        $value['voucher_code'],
                        date('m/d/yy',strtotime($value['won_date'])),
                        $value['store_name'],
                        $value['gift_name'],
                        $value['user_name'],
                        $value['amount'],
                        date('m/d/yy',strtotime($value['time_limit'])),
                    );
                    $i++;
                }
                $data = array_merge($data,$info);
            }
            $fp = fopen('php://output', 'w');            
            fputcsv($fp, $header_name);
            foreach ($data as $row) {
                fputcsv($fp, $row);
            }
            fclose($fp);
        }

        public function inventory_record_csv(){
            $get = $this->input->get();
            $result =   $this->MAS->getInventoryRecords($get);      
        
            $fileName = 'inventory-records.csv';
        
            header('Content-Type: application/excel');
            header('Content-Disposition: attachment; filename="' . $fileName . '"');
        
            $data = array();
        
            $header_name = array( 'Gift No.', 'Date Of Creation', 'Catogory', 'Sub Catogory', 'Vendor', 'Gift Title Eng.', 'Expiry Date', 'Status', 'Value', 'quantity', 'Claimed ', 'Not Claimed', 'Remaining');
        
            if(!empty($result)){
                $i = 1;
                foreach ($result as $value) {
                    $info[] = array(
                        $i,
                        date('m/d/yy',strtotime($value['create_date'])),
                        getCatgoryTypeString($value['category_id']),
                        subCategoryTypeString($value['subcat_id']),
                        $value['store_name'],
                        $value['gift_title'],
                        date('m/d/yy',strtotime($value['expire_date'])),
                        $value['status'],
                        $value['value'],
                        $value['stock'],
                        $value['claimed_count'],
                        $value['not_claimed_count'],
                        $value['stock'] - $value['used'],
                    );
                    $i++;
                }
                $data = array_merge($data,$info);
            }
            $fp = fopen('php://output', 'w');            
            fputcsv($fp, $header_name);
            foreach ($data as $row) {
                fputcsv($fp, $row);
            }
            fclose($fp);
        }

        public function comment_record_csv(){
            $get = $this->input->get();
            $result =   $this->MAS->getCommentRecords($get);      
        
            $fileName = 'comment-records.csv';
        
            header('Content-Type: application/excel');
            header('Content-Disposition: attachment; filename="' . $fileName . '"');
        
            $data = array();
        
            $header_name = array('Date', 'Name', 'User', 'Store', 'Rated', 'Comments', 'Flaged comments by vistors');
        
            if(!empty($result)){
                $i = 1;
                foreach ($result as $value) {
                    $info[] = array(
                        date('m/d/yy',strtotime($value['create_date'])),
                        $value['user_name'],
                        $value['user_email'],
                        $value['store_name'],
                        $value['ratting'],
                        $value['review'],
                        '-',
                    );
                    $i++;
                }
                $data = array_merge($data,$info);
            }
            $fp = fopen('php://output', 'w');            
            fputcsv($fp, $header_name);
            foreach ($data as $row) {
                fputcsv($fp, $row);
            }
            fclose($fp);
        }
    }
?>