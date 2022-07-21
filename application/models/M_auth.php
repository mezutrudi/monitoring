<?php
/**
*
*/
class M_auth extends CI_Model
{
	public function login($user,$pass){
	//	htmlspecialchars
		$u=htmlspecialchars($user);
		$p=md5($pass);
		$us=$this->db->escape_str($u);
		$ps=$this->db->escape_str($p);
		$query=$this->db->select('*')
						 ->from('admin')
						 ->where('username',$us)
						 ->where('password',$ps)
						 ->limit(1)
						 ->get();
		 if ($query->num_rows()==1) {
			  return $query->result_object();
		 }else{
			  return false;
		 }
	 }

	 
}

?>
