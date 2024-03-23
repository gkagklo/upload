<?php
class ModelExtensionModuleEntity extends Model
{
	
    /** addEntity method is to add entity which is called from controller like $this->model_extension_module_entity->addEntity($this->request->post);. Data is inserted in the oc_entity table and cache is cleared for the entity variable ***/
	public function addEntity($data)
	{
		$this->db->query("INSERT INTO " . DB_PREFIX . "entity SET name = '" . $this->db->escape($data['name']). "', description = '" . $this->db->escape($data['description']) . "', date_modified = NOW(), date_added = NOW()");
		$entity_id = $this->db->getLastId();
		$this->cache->delete('entity');
		return $entity_id;
	}

	/** editEntity method is to update the entity which is called from controller like $this->model_extension_module_entity->editEntity($this->request->post);. Data is updated in the oc_entity table and cache is cleared for the entity variable ***/
	public function editEntity($entity_id, $data)
	{
		$this->db->query("UPDATE " . DB_PREFIX . "entity SET name = '" . $this->db->escape($data['name']) . "', description = '" . $this->db->escape($data['description']) . "', date_modified = NOW() WHERE entity_id = '" . (int) $entity_id . "'");
		$this->cache->delete('entity');
	}

    /** getEntity method is to retrieve the entity which is called from controller like $entitycrud_info = $this->model_extension_module_entity->getEntity($this->request->get['entity_id']);. Only one entity with that entity_id is returned  ***/
	public function getEntity($entity_id)
	{
		$query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "entity WHERE entity_id = '" . (int) $entity_id . "'");
		return $query->row;
	}
	
	
	
	/** getEntities method is to retrieve the enities which is called from controller like $results = $this->model_extension_module_entity->getEntities($filter_data);. $data is the filtering parameter. Multiple entities are returned  ***/
	public function getEntities($data = array())
	{
		$sql = "SELECT * FROM " . DB_PREFIX . "entity";
		$sort_data = array(
			'name',
			'sort_order'
		);
		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			$sql .= " ORDER BY " . $data['sort'];
		} else {
			$sql .= " ORDER BY sort_order";
		}
		if (isset($data['order']) && ($data['order'] == 'DESC')) {
			$sql .= " DESC";
		} else {
			$sql .= " ASC";
		}
		if (isset($data['start']) || isset($data['limit'])) {
			if ($data['start'] < 0) {
				$data['start'] = 0;
			}
			if ($data['limit'] < 1) {
				$data['limit'] = 20;
			}
			$sql .= " LIMIT " . (int) $data['start'] . "," . (int) $data['limit'];
		}
		$query = $this->db->query($sql);
		return $query->rows;
	}
	
	
	/** getTotalEntities method is to count the total number of entities ***/
	public function getTotalEntities()
	{
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "entity");
		return $query->row['total'];
	}

	/** deleteEntity method is to delete the entity which is called from controller like $this->model_extension_module_entity->deleteEntity($entity_id);. Data is removed from the oc_entity table and cache is cleared for the entity variable ***/
	public function deleteEntity($entity_id)
	{

		$this->db->query("DELETE FROM " . DB_PREFIX . "entity WHERE entity_id = '" . (int) $entity_id . "'");
		$this->cache->delete('entity');
	}
	
}