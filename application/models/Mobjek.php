<?php  

class Mobjek extends CI_Model {
	
	function get_data() {
		
		$this->db->order_by('id', 'DESC');
		return $this->db->get('objek_wisata', 12, 0)->result();
		
	}
	
	function update_data($id, $data) {
		
		$this->db->where('id', $id);
		return $this->db->update('objek_wisata', $data);
		
	}
	
	function cek_data($id) {
		
		$this->db->select('o.*, l.nama_lokasi lokasi')
				 ->from("objek_wisata o")
 				 ->join('lokasi_wisata l','o.id_lokasi=l.id')
				 ->where('o.id', $id)
				 ->order_by('o.id', 'DESC');
				 
		return $this->db->get()->row();
		
	}

	function get_tema() {
		
		$this->db->order_by('id', 'ASC');
		return $this->db->get('tema_wisata')->result();
		
	}
	
	function get_lokasi() {
		
		$this->db->order_by('id', 'ASC');
		return $this->db->get('lokasi_wisata')->result();
		
	}
	
	function cek_data_lokasi($value1, $value2) {
		
		$query = "SELECT `o`.*, `l`.`nama_lokasi` `lokasi` 
				  FROM `objek_wisata` `o` 
				  JOIN `lokasi_wisata` `l` ON `o`.`id_lokasi`=`l`.`id` 
				  WHERE `o`.`id_lokasi` = ".$value1." 
				  AND o.id != ".$value2."
				  LIMIT 0, 3";
				  
		return $this->db->query($query)->result();
			
	}
	
	function get_photo($id) {
		
		$this->db->where('id_objek', $id);
		return $this->db->get('photo')->result();
		
	}
	
	function get_video($id) {
		
		$this->db->where('id_objek', $id);
		return $this->db->get('video')->row();
		
	}
	
	function get_slider() {
		
		$this->db->order_by('posisi', 'ASC');
		return $this->db->get('slider')->result();
		
	}
	
}