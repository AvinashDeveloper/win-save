<?php



class ModVender extends CI_Model{
	public function offer_save($image){
		// assign the data to an array
		$data = array(



			'offer_title' => $this->input->post('offer_title'),



			'offer_name' => $this->input->post('offer_name'),



			'offer_detail' => $this->input->post('offer_detail'),



			'valid_date' => $this->input->post('valid_date'),



			'limit_per_user' => $this->input->post('limit_per_user'),



			'status' => '1',



			'offer_img' => $image,



			'stoke' => $this->input->post('stoke'),



			'vendor_id' => $this->input->post('vendor_id'),



			'add_date' => date('Y-m-d H:i:s'),



			'used' => $this->input->post('used'),



			'offer_amount' => $this->input->post('offer_amount'),



		);







		$save_offer = $this->db->insert('vendor_offers', $data);



		if ($save_offer) {



			$this->session->set_flashdata('save_offer', 'Offer Create Successfully');



			return redirect('My-offer');



		}



	}



	public function get_offer(){



		$sessiondata = $this->session->userdata('Login'); 



		$array = json_decode(json_encode($sessiondata), True);







		$this->db->select('*');



		$this->db->where('vendor_id=',$array[0]['id']);



		$this->db->order_by('id',"desc");



		$query = $this->db->get('vendor_offers');



		return $query->result();



	}



	public function myoffer_view($offer_id)  
	{  



		$this->db->select('*');



		$query = $this->db->get_where('vendor_offers', array('id' => $offer_id));



		return $query->result_array();



	}



	public function update_Myoffer($image)
	{



		// assign the data to an array



		$data = array(



			'offer_title' => $this->input->post('offer_title'),



			'offer_name' => $this->input->post('offer_name'),



			'offer_detail' => $this->input->post('offer_detail'),



			'valid_date' => $this->input->post('valid_date'),



			'id' => $this->input->post('id'),



			'limit_per_user' => $this->input->post('limit_per_user'),



			'status' => '1',



			'offer_img' => $image,



			'stoke' => $this->input->post('stoke'),



			'vendor_id' => $this->input->post('vendor_id'),



			'id' => $this->input->post('id'),



			'add_date' => date('Y-m-d H:i:s'),



			'used' => $this->input->post('used'),



			'offer_amount' => $this->input->post('offer_amount'),



		);







		$this->db->where('id', $data['id']);  



		$update_Myoffer =  $this->db->update('vendor_offers', $data); 



		if ($update_Myoffer) {



			$this->session->set_flashdata('update_Myoffer', 'Offer Update Successfully');



			return redirect('My-offer-update/'.$data['id']);



		}



	}



	public function plan_detail($plan_id)  {  
		$this->db->select('*');
		$query = $this->db->get_where('plans', array('plan_id' => $plan_id));
		return $query->result_array();
	}



	public function check_redeem($generated_code)  {  



		$this->db->select('*');



		$this->db->join('vendor_offers','vendor_offers.id = user_offer_history.offer_id');



		$query = $this->db->get_where('user_offer_history', array('generated_code' => $generated_code));



		return $query->result_array();



	}



	public function points_sum($user_id)  {  



		$this->db->select_sum('points');



		$query = $this->db->get_where('user_offer_history', array('user_id' => $user_id));







		return $query->result_array();



	}



	public function my_redeem($id)  {  



		$this->db->select('*');



		$this->db->join('vendor_offers','vendor_offers.id = user_offer_history.offer_id');



		$query = $this->db->get_where('user_offer_history', array('user_id' => $id));

		return $query->result();



	}



	public function classified_list(){



		$this->db->select('*');







		$this->db->order_by('id',"desc");



		$query = $this->db->get('classified');



		return $query->result();



	}



	public function get_cls($id)  {  



		$this->db->select('*');



		$query = $this->db->get_where('classified', array('id' => $id));



		return $query->result_array();



	}
  
  
  	public function check_vendercls_offer($v_id) {  
		$this->db->select('classified.*');
		$this->db->join('vendor','vendor.id = classified.vendor_id');
		$query = $this->db->get_where('classified', array('vendor_id' => $v_id));
		return $query->result();
	}


  	public function check_venderlimited_offer($v_id)  {  
		$this->db->select('limited_offer.*');
		$this->db->join('vendor','vendor.id = limited_offer.vendor_id');
		$query = $this->db->get_where('limited_offer', array('vendor_id' => $v_id));
    	// echo $this->db->last_query();die;
		return $query->result();
	}


	public function limited_list(){



		$this->db->select('*');







		$this->db->order_by('id',"desc");



		$query = $this->db->get('limited_offer');



		return $query->result();



	}



	public function get_limited($id)  {  



		$this->db->select('*');



		$query = $this->db->get_where('limited_offer', array('id' => $id));



		return $query->result_array();



	}



	public function ven_offeriscreate($id)  {  



		$this->db->select('*');



		$query = $this->db->get_where('vendor_offers', array('vendor_id' => $id,'add_date'=>date('Y-m-d')));







		return $query->result_array();



	}

	public function allInventoryList(){

		$this->db->select("*");

		$this->db->from('Inventory_gift');

		$this->db->join('vendor', 'vendor.id = Inventory_gift.shop_name');       

		$query = $this->db->get();

		return $query->result();

  	}
  
	public function allInventoryacVender($v_id){

		$this->db->select("*,inventory_gift.status as igStatus,inventory_gift.id as gift_id");

		$this->db->from('inventory_gift');

		$this->db->join('vendor', 'vendor.id = inventory_gift.shop_name');       
		$this->db->where('inventory_gift.shop_name=',$v_id);
		$query = $this->db->get();

		return $query->result();

	}


	public function vendorBranches($vendor_id)	{

		$this->db->select("*");

		$this->db->from('branch');

		$this->db->where('vendor_id', $vendor_id);       

		$query = $this->db->get();

		return $query->result();

	}

	public function vendorAminity($vendor_id){

		$this->db->select("*");

		$this->db->from('vendor_amenities');

		$this->db->where('vendor_id', $vendor_id);       

		$query = $this->db->get();

		return $query->result();

	}

	public function check_branch_added($vendor_id){

		$this->db->select("*");

		$this->db->from('branch');

		$this->db->where('vendor_id', $vendor_id);       

		$query = $this->db->get();

		return $query->result();

  	}
  
	public function get_points(){

		$this->db->select("*");

		$this->db->from('points');

		$this->db->where('id=1');       

		$query = $this->db->get();

		return $query->result_array();

  	}
  

	public function inventory_list(){

		$this->db->select("*");

		$this->db->from('Inventory_gift');



		$query = $this->db->get();

		return $query->result();

  	}
  

	public function inventory_byid($id) {

		$this->db->select("*");

		$this->db->from('Inventory_gift');

		$this->db->where('id',$id);       

		$query = $this->db->get();

		return $query->result_array();

  	}
  
	public function update_inventory($image){

		unset($_POST['submit']);
		unset($_POST['images']);
		$_POST['img']=$image;
		$this->db->where('id',$_POST['id']);  
		$points_update = $this->db->update('Inventory_gift',$_POST);
		return redirect('Inventory-list');
	}


	public function vender_offers($v_id, $offer_type=null)  { 
		$this->db->select('*');
		$query = $this->db->get_where('vendor_offers', array('vendor_id' => $v_id,'offer_type' => $offer_type));
		return $query->result();
	} 

	public function offer_membership_orders($vendor_id){
		$this->db->select('mo.*,v.name,v.contact as mobile');
		$this->db->from('offer_membership_orders mo');
		$this->db->join('vendor v','v.id = mo.vendor_id','LEFT');
		$this->db->where('mo.vendor_id',$vendor_id);
		$query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result_array();
        }else{
            return false;
        }
	}

	public function offer_membership_orders_info($order_id, $vendor_id){
		$this->db->select('mo.*,v.name,v.contact as mobile');
		$this->db->from('offer_membership_orders mo');
		$this->db->join('vendor v','v.id = mo.vendor_id','LEFT');
		$this->db->where('mo.vendor_id',$vendor_id);
		$this->db->where('mo.membership_order_id',$order_id);
		$query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result_array();
        }else{
            return false;
        }
	}

	public function classified_orders($vendor_id){
		$this->db->select('co.*,v.name,v.contact as mobile');
		$this->db->from('classified_orders co');
		$this->db->join('vendor v','v.id = co.vendor_id','LEFT');
		$this->db->where('co.vendor_id',$vendor_id);
		$query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result_array();
        }else{
            return false;
        }
	}

	public function classified_orders_info($classified_order_id, $vendor_id){
		$this->db->select('co.*,v.name,v.contact as mobile');
		$this->db->from('classified_orders co');
		$this->db->join('vendor v','v.id = co.vendor_id','LEFT');
		$this->db->where('co.vendor_id',$vendor_id);
		$this->db->where('co.classified_order_id',$classified_order_id);
		$query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result_array();
        }else{
            return false;
        }
	}

	public function limited_orders($vendor_id){
		$this->db->select('lo.*,v.name,v.contact as mobile');
		$this->db->from('limited_orders lo');
		$this->db->join('vendor v','v.id = lo.vendor_id','LEFT');
		$this->db->where('lo.vendor_id',$vendor_id);
		$query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result_array();
        }else{
            return false;
        }
	}

	public function limited_orders_info($order_id, $vendor_id){
		$this->db->select('lo.*,v.name,v.contact as mobile');
		$this->db->from('limited_orders lo');
		$this->db->join('vendor v','v.id = lo.vendor_id','LEFT');
		$this->db->where('lo.vendor_id',$vendor_id);
		$this->db->where('lo.limited_order_id',$order_id);
		$query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result_array();
        }else{
            return false;
        }
	}

	public function offers_info($offer_id, $vendor_id){
		$this->db->select('*');
		$this->db->from('vendor_offers');
		$this->db->where('vendor_id',$vendor_id);
		$this->db->where('id',$offer_id);
		$query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result_array();
        }else{
            return false;
        }
	}

	public function promo_classified_info($promo_id, $vendor_id){
		$this->db->select('*');
		$this->db->from('classified');
		$this->db->where('vendor_id',$vendor_id);
		$this->db->where('id',$promo_id);
		$query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result_array();
        }else{
            return false;
        }
	}

	public function promo_limited_info($promoLimit_id, $vendor_id){
		$this->db->select('*');
		$this->db->from('limited_offer');
		$this->db->where('vendor_id',$vendor_id);
		$this->db->where('id',$promoLimit_id);
		$query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result_array();
        }else{
            return false;
        }
	}

	public function getClaimedOffers($vendor_id = NULL){
		$this->db->select('vc.*,vo.offer_type,vo.offer_title,vo.offer_detail,vo.saving_amount,b.branch_name,c.name_en as city_name,u.name as user_name');
		$this->db->from('voucher_code_history vc');
		$this->db->join('vendor_offers vo', 'vo.id = vc.vendor_offer_id','LEFT');
		$this->db->join('branch b','b.id = vc.branch_id','LEFT');
		$this->db->join('city c','c.city_id = b.city','LEFT');
		$this->db->join('user u','u.id = vc.user_id','LEFT');
		if(!empty($vendor_id)){
			$this->db->where('vo.vendor_id', $vendor_id);
		}
		$query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result_array();
        }else{
            return false;
        }
	}

	public function getClaimedGift($vendor_id = NULL,$status = NULL){
		$this->db->select('mg.*,b.branch_name,c.name_en as city_name,u.name as user_name,ig.gift_name,ig.time_limit as expire_date');
		$this->db->from('my_gift mg');
		$this->db->join('branch b','b.id = mg.branch_id','LEFT');
		$this->db->join('city c','c.city_id = b.city','LEFT');
		$this->db->join('user u','u.id = mg.user_id', 'LEFT');
		$this->db->join('inventory_gift ig','ig.id = mg.Inventory_gift_id', 'LEFT');
		if(!empty($vendor_id)){
			$this->db->where('mg.vendor_id',$vendor_id);
		}

		if(!empty($status)){
			if($status == 1){
				$this->db->where('mg.claim_status', $status);
			} else {
				$this->db->where('mg.claim_status', $status);
			}
		}
		$query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result_array();
        }else{
            return false;
        }
	}

	public function getInventoryGifts($vendor_id = NULL){
		$outputArr = array();
		$remaining = "";
		$this->db->select('*');
		$this->db->from('inventory_gift');
		$this->db->where('shop_name', $vendor_id);
		$query = $this->db->get();
		if($query->num_rows()>0){
			$results = $query->result_array();
			foreach ($results as $resValue) {
				$not_claimed_count = $this->common->select('my_gift', " where claim_status = 1 and Inventory_gift_id = '".$resValue['id']."'","count(*) as not_claimed_count");
				$claimed_count = $this->common->select('my_gift'," where claim_status =2 and Inventory_gift_id= '".$resValue['id']."'","count(*) as claimed_count" );
				$remaining = $resValue['stock'] - ($not_claimed_count[0]['not_claimed_count'] + $claimed_count[0]['claimed_count']);
				$outputArr[] = array('create_date' => date('m/d/yy',strtotime($resValue['create_date'])),
								'expiry_date' => date('m/d/yy',strtotime($resValue['time_limit'])),
								'title' => $resValue['gift_name'],
								'value' => $resValue['req_points'],
								'quantity' => $resValue['stock'],
								'claimed_count' => $claimed_count[0]['claimed_count'],
								'not_claimed_count' => $not_claimed_count[0]['not_claimed_count'],
								'remaining' => $remaining,
				);
			}
			return $outputArr;
		}else{
            return false;
        }
	}

	public function getInventoryOffer($vendor_id = NULL){
		$outputArr = array();
		$remaining = "";
		$this->db->select('*');
		$this->db->from('vendor_offers');
		$query = $this->db->get();
		if($query->num_rows()>0){
			$results = $query->result_array();
			foreach ($results as $resValue) {
				$not_claimed_count = $this->common->select('voucher_code_history', " where status = 1 and vendor_offer_id = '".$resValue['id']."'","count(*) as not_claimed_count");
				$claimed_count = $this->common->select('voucher_code_history'," where status =2 and vendor_offer_id= '".$resValue['id']."'","count(*) as claimed_count" );
				$remaining = $resValue['stock'] - ($not_claimed_count[0]['not_claimed_count'] + $claimed_count[0]['claimed_count']);
				$outputArr[] = array('create_date' => date('m/d/yy',strtotime($resValue['add_date'])),
								'expiry_date' => date('m/d/yy',strtotime($resValue['valid_date'])),
								'title' => $resValue['offer_title'],
								'value' => $resValue['saving_amount'],
								'quantity' => $resValue['stock'],
								'claimed_count' => $claimed_count[0]['claimed_count'],
								'not_claimed_count' => $not_claimed_count[0]['not_claimed_count'],
								'remaining' => $remaining,
				);
			}
			return $outputArr;
        }else{
            return false;
        }
	}

	public function getReviewInfo($vendor_id = NULL){
		$outputArr = array();
		$this->db->select('vr.*,u.name,');
		$this->db->from('vendor_ratting vr');
		$this->db->join('user u','vr.user_id = u.id','LEFT');
		$this->db->where('vendor_id',$vendor_id);
		$this->db->where('parent_id',0);
		$query = $this->db->get();
		if($query->num_rows()>0){
			$result = $query->result_array();
			foreach ($result as $value) {
				$vendorReply = $this->common->select('vendor_ratting', " where parent_id ='".$value['review_id']."' order by create_date DESC limit 0,1");
				$outputArr[] = array('name' => $value['name'],
					'ratting' => $value['ratting'],
					'review' => $value['review'],
					'vendor_reply' => $vendorReply[0]['review'],
					'time' => ago($value['create_date']),
					'review_id' => $value['review_id'],
					'user_id' => $value['user_id'],
					'vendor_id' => $value['vendor_id'],
				);
			}
			return $outputArr;
		} else {
			return false;
		}
	}

}
?>