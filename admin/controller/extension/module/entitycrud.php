<?php
/*** We create a file named ‘entitycrud.php’ in the admin/controller/extension/module/ folder. Since we named the file entitycrud.php and put it at admin/controller/extension/module/ folder, the controller class name will be ControllerExtensionModuleEntitycrud which inherits the Controller. ***/
class ControllerExtensionModuleEntitycrud extends Controller
{
	/*** private error property for this class only which will hold the error message if occurs any. ***/
	private $error = array();
	
    public function index()
	{
		$this->load->language('extension/module/entitycrud');
		$this->document->setTitle($this->language->get('heading_title'));
		$this->load->model('extension/module/entity');
		$this->getList();
	}

	/*** add() - This method is called when someone clicks the add button in the listing page and the save button on the form. If the add button is clicked then it shows the forms with blank fields. If the save button is clicked on the form then it validates the data and saves data in the database and redirects to the listing page. ***/
	public function add()
	{
		$this->load->language('extension/module/entitycrud');
		$this->document->setTitle($this->language->get('heading_title'));
		$this->load->model('extension/module/entity');
		
		/*** This is the section when someone clicks save button while adding the entity. It checks if the request method is post and if form is validated. Then it will call the addEntity method of model class which save the new entity to the database ***/
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
				
			$this->model_extension_module_entity->addEntity($this->request->post);
			$this->session->data['success'] = $this->language->get('text_success');
			$url = '';
			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}
			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}
			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}
			/*** This line of code is to redirect to the listing page ***/
			$this->response->redirect($this->url->link('extension/module/entitycrud', 'user_token=' . $this->session->data['user_token'] . $url, true));
		}
		/*** This is to show the form ***/
		$this->getForm();
	}


	/*** edit() - Edit method is called when someone clicks the edit button in the listing page of the entity which will show the form with the data, and similarly it is called when someone clicks the save button on the form while editing, when saved it will validate the form and update the data in the database and redirects to the listing page. ***/
	public function edit()
	{
		$this->load->language('extension/module/entitycrud');
		$this->document->setTitle($this->language->get('heading_title'));
		$this->load->model('extension/module/entity');
		/*** This is the section when someone clicks edit button and save the entity. It checks if the request method is post and if form is validated. Then it will call the editEntity method of model class which save the updated entity to the database ***/
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_extension_module_entity->editEntity($this->request->get['entity_id'], $this->request->post);
			$this->session->data['success'] = $this->language->get('text_success');
			$url = '';
			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}
			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}
			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}
			/*** This line of code is to redirect to the listing page ***/
			$this->response->redirect($this->url->link('extension/module/entitycrud', 'user_token=' . $this->session->data['user_token'] . $url, true));
		}
		/*** This is to show the form ***/
		$this->getForm();
	}


	/*** delete() - Delete method is called when someone clicks delete button by selecting the entity to delete. Once entity is/are deleted then it is redirected to the listing page.***/
	public function delete()
	{
		$this->load->language('extension/module/entitycrud');
		$this->document->setTitle($this->language->get('heading_title'));
		$this->load->model('extension/module/entity');
		/*** This is the section which find which entity are selected that need to be deleted. The deleteEntity method of the model class is called which remove the entity from the database ***/
		if (isset($this->request->post['selected']) && $this->validateDelete()) {
			foreach ($this->request->post['selected'] as $entity_id) {
				$this->model_extension_module_entity->deleteEntity($entity_id);
			}
			$this->session->data['success'] = $this->language->get('text_success');
			$url = '';
			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}
			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}
			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}
			$this->response->redirect($this->url->link('extension/module/entitycrud', 'user_token=' . $this->session->data['user_token'] . $url, true));
		}
		$this->getList();
	}



	/*** getList() - This method creates logic to create a listing and pass variables to template twig files where they are manipulated and shown in the table. ***/
	protected function getList()
	{
		
		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'name';
		}
		if (isset($this->request->get['order'])) {
			$order = $this->request->get['order'];
		} else {
			$order = 'ASC';
		}
		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}
		$url = '';
		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}
		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}
		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}
		/*** Breadcrumbs variables set ***/
		$data['breadcrumbs'] = array();
		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
		);
		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('extension/module/entitycrud', 'user_token=' . $this->session->data['user_token'] . $url, true)
		);
		/*** Add and delete button URL setup for the form ***/
		$data['add'] = $this->url->link('extension/module/entitycrud/add', 'user_token=' . $this->session->data['user_token'] . $url, true);
		$data['delete'] = $this->url->link('extension/module/entitycrud/delete', 'user_token=' . $this->session->data['user_token'] . $url, true);
		/*** entities variables is set to empty array, latter we will set the entities in it ***/
		$data['entities'] = array();
		/*** We set filter_data like below, $sort, $order, $page are assigned in above code, we can get from the URL paramaters or the config values. We pass this array and in model the SQL will be create as per this filter data   ***/
		$filter_data = array(
			'sort'  => $sort,
			'order' => $order,
			'start' => ($page - 1) * $this->config->get('config_limit_admin'),
			'limit' => $this->config->get('config_limit_admin')
		);
		/*** This is to get the total of number of entities as this is needed for the pagination ***/
		$entitycrud_total = $this->model_extension_module_entity->getTotalEntities();
		/*** This is to get filtered entities ***/
		$results = $this->model_extension_module_entity->getEntities($filter_data);
		/*** This is how we set data to the entities array, we can get many variables in the $results variables so we separate what is needed in template twig file and pass them to it ***/
		foreach ($results as $result) {
			$data['entities'][] = array(
				'entity_id'   => $result['entity_id'],
				'name'        => $result['name'],
				'description' => $result['description'],
				'edit'        => $this->url->link('extension/module/entitycrud/edit', 'user_token=' . $this->session->data['user_token'] . '&entity_id=' . $result['entity_id'] . $url, true),
				'delete'      => $this->url->link('extension/module/entitycrud/delete', 'user_token=' . $this->session->data['user_token'] . '&entity_id=' . $result['entity_id'] . $url, true)
			);
		}
		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->session->data['success'])) {
			$data['success'] = $this->session->data['success'];
			unset($this->session->data['success']);
		} else {
			$data['success'] = '';
		}
		if (isset($this->request->post['selected'])) {
			$data['selected'] = (array) $this->request->post['selected'];
		} else {
			$data['selected'] = array();
		}
		$url = '';
		if ($order == 'ASC') {
			$url .= '&order=DESC';
		} else {
			$url .= '&order=ASC';
		}
		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}
		$data['sort_name'] = $this->url->link('extension/module/entitycrud', 'user_token=' . $this->session->data['user_token'] . '&sort=name' . $url, true);
		$data['sort_sort_order'] = $this->url->link('extension/module/entitycrud', 'user_token=' . $this->session->data['user_token'] . '&sort=sort_order' . $url, true);
		$url = '';
		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}
		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}
		/*** Pagination in Opencart they are self explainatory ***/
		$pagination = new Pagination();
		$pagination->total = $entitycrud_total;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_limit_admin');
		$pagination->url = $this->url->link('extension/module/entitycrud', 'user_token=' . $this->session->data['user_token'] . $url . '&page={page}', true);
		$data['pagination'] = $pagination->render();
		$data['results'] = sprintf($this->language->get('text_pagination'), ($entitycrud_total) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($entitycrud_total - $this->config->get('config_limit_admin'))) ? $entitycrud_total : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $entitycrud_total, ceil($entitycrud_total / $this->config->get('config_limit_admin')));
		$data['sort'] = $sort;
		$data['order'] = $order;
		/*** Pass the header, column_left and footer to the entitycrud_list.twig template ***/
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
		/*** Set the response output ***/
		$this->response->setOutput($this->load->view('extension/module/entitycrud_list', $data));
	}



	/*** getForm() - This method creates logic to create a form. When someone clicks the add button then it shows form with blank fields, if someone clicks the edit button then it shows form with data of that testimonial.
	 ***/
	protected function getForm()
	{
		
		$data['text_form'] = !isset($this->request->get['entity_id']) ? $this->language->get('text_add') : $this->language->get('text_edit');
		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}
		if (isset($this->error['name'])) {
			$data['error_name'] = $this->error['name'];
		} else {
			$data['error_name'] = array();
		}
		$url = '';
		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}
		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}
		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}
		$data['breadcrumbs'] = array();
		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
		);
		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('extension/module/entitycrud', 'user_token=' . $this->session->data['user_token'] . $url, true)
		);
		/*** This is the code which separate the action of edit or add action, if the URL parameter contains entity_id then it is edit else it is add  ***/
		if (!isset($this->request->get['entity_id'])) {
			$data['action'] = $this->url->link('extension/module/entitycrud/add', 'user_token=' . $this->session->data['user_token'] . $url, true);
		} else {
			$data['action'] = $this->url->link('extension/module/entitycrud/edit', 'user_token=' . $this->session->data['user_token'] . '&entity_id=' . $this->request->get['entity_id'] . $url, true);
		}
		$data['cancel'] = $this->url->link('extension/module/entitycrud', 'user_token=' . $this->session->data['user_token'] . $url, true);
		/*** This is the code which pulls the entity that we have to edit  ***/
		
		if (isset($this->request->get['entity_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$data['entity'] = $this->model_extension_module_entity->getEntity($this->request->get['entity_id']);	
		}

		$data['user_token'] = $this->session->data['user_token'];
		/*** These two line of codes are to pull all active language ***/
		$this->load->model('localisation/language');
		$data['languages'] = $this->model_localisation_language->getLanguages();

		/*** This is the code to check testimonial_description field values, if it empty, or just clicked save button and request method is Post or set the available data in it while editing. We do this for all the fields. ***/
		if (isset($this->request->post['entity_description'])) {
			$data['entity_description'] = $this->request->post['entity_description'];
		} elseif (isset($this->request->get['testimonial_id'])) {
			$data['entity_description'] = $this->model_extension_module_entity->getTestimonialDescriptions($this->request->get['entity_id']);
		} else {
			$data['entity_description'] = array();
		}
			
		/*** This is for sort order field ***/
		if (isset($this->request->post['sort_order'])) {
			$data['sort_order'] = $this->request->post['sort_order'];
		} elseif (!empty($entitycrud_info)) {
			$data['sort_order'] = $entitycrud_info['sort_order'];
		} else {
			$data['sort_order'] = 0;
		}

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
		$this->response->setOutput($this->load->view('extension/module/entitycrud_form', $data));
	}



	/***
	 * validateForm() - This method is to check whether the user has permission to edit or add the data from the form. In this method, we can validate any form field if needed.
	 ***/
	protected function validateForm()
	{
		
		/*** This is how we check if the user has permission to modify or not. ***/
		if (!$this->user->hasPermission('modify', 'extension/module/entitycrud')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
		
		if ((utf8_strlen($this->request->post['name']) < 1) || (utf8_strlen($this->request->post['name']) > 255)) {
			$this->error['name'] = $this->language->get('error_name');
		}

		if ($this->error && !isset($this->error['warning'])) {
			$this->error['warning'] = $this->language->get('error_warning');
		}
		return !$this->error;
	}


	/*** validateDelete() - This method is to check if the user has permission to delete or not ***/
	protected function validateDelete()
	{
		if (!$this->user->hasPermission('modify', 'extension/module/entitycrud')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
		return !$this->error;
	}

	
}