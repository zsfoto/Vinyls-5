<?php
declare(strict_types=1);

namespace App\Controller\Admin;


use App\Controller\Admin\AppController;
use Cake\Core\Configure;
use Cake\Http\Exception\NotFoundException;


/**
 * AlbumsLabels Controller
 *
 * @property \App\Model\Table\AlbumsLabelsTable $AlbumsLabels
 */
class AlbumsLabelsController extends AppController
{

    /**
     * Initialize controller
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();
		//$this->config['paginate_limit'] = 10;		
	}

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index($clearFilter = null)
    {
		//Configure::write('Theme.admin.config.header_buttons_in_action.index', 
		//	array_merge(Configure::read('Theme.admin.config.header_buttons_in_action.index'), 
		//		['back' => false, 'add' => true, 'edit' => false, 'save' => false, 'view' => false, 'delete' => false]
		//	)
		//);

		$this->set('title', __('Browse the') . ': ' . __('AlbumsLabels'));

		$queryParams = $this->request->getQuery();
		$page 		 	 = '1';
		$sort 		 	 = 'id';
		$direction 	 	 = 'asc';
		$showSearchBar	 = false;
		$searchInSession = '';
		$search 	 	 = '';		

		if ($clearFilter == 'clear-filter'){
			if($this->session->check('Layout.' . $this->controller . '.search')){
				$this->session->delete('Layout.' . $this->controller . '.search');
			}
			$showSearchBar	 = true;
		}

		// ############################# /.SORT ORDER & PAGE ###############################
		if($this->session->check('Layout.' . $this->controller . '.queryparams')){
			$this->queryParamsInSession = json_decode($this->session->read('Layout.' . $this->controller . '.queryparams'));
		}
		
		if(isset($this->queryParamsInSession->page)){
			$page = $this->queryParamsInSession->page;
		}
		
		if(isset($this->queryParamsInSession->sort)){
			$sort = $this->queryParamsInSession->sort;
		}
		
		if(isset($this->queryParamsInSession->direction)){
			$direction = $this->queryParamsInSession->direction;
		}

		if(isset($queryParams['page'])){
			$this->queryParamsInSession->page = $queryParams['page'];
			$page = $this->queryParamsInSession->page;
		}

		if(isset($queryParams['sort'])){
			$this->queryParamsInSession->sort = $queryParams['sort'];
			$sort = $this->queryParamsInSession->sort;
		}

		if(isset($queryParams['direction'])){
			$this->queryParamsInSession->direction = $queryParams['direction'];
			$direction = $this->queryParamsInSession->direction;
		}

		if(!empty($this->queryParamsInSession)){
			$this->session->write('Layout.' . $this->controller . '.queryparams', json_encode($this->queryParamsInSession));
		}

		if($page === null){
			return $this->redirect(['controller' => $this->controller, 'action' => 'index', '?' => array_merge(['page' => 1], $queryParams) ]);
		}

		$this->paginate['AlbumsLabels']['page'] 	= $page;
		$this->paginate['AlbumsLabels']['order'] 	= [$sort => $direction];
		// ############################# /.SORT ORDER & PAGE ###############################

		// ############################# SEARCH ############################################
		$search = '';
		if($this->session->check('Layout.' . $this->controller . '.search')){
			$search = $this->session->read('Layout.' . $this->controller . '.search');
		}

		if ($this->request->is('post')) {
			$search = $this->request->getData()['search'];
			$this->session->write('Layout.' . $this->controller . '.search', $search);
		}
		// ############################# SEARCH ############################################		

		$conditions = [];

		// ############################# QUERY #############################################
		if($search !== ''){
			$showSearchBar	 = true;
			$query = $this->AlbumsLabels->find()
				->contain(['Albums', 'Labels'])
				->where([
					'OR' => [
						'name LIKE' => '%' . $search .  '%',
						//'title LIKE' => '%' . $search .  '%',
						//'value' => (integer) $search,			// Must be convert to integer
					]
				]);
		}else{
			$query = $this->AlbumsLabels->find()->contain(['Albums', 'Labels'])->where($conditions);
		}
		// ############################# /.QUERY ###########################################


		// ############################# PAGINATE ############################################
		try {
			$this->paginate['AlbumsLabels']['limit'] = $this->config['paginate_limit'];
			$albumsLabels = $this->paginate($query);
		} catch (NotFoundException $e) {
			// Do something here like redirecting to first or last page.
			// $e->getPrevious()->getAttributes('pagingParams') will give you required info.
			$paging = $e->getPrevious()->getAttributes('pagingParams')['pagingParams'];
			$requestedPage = $paging['requestedPage'];

			// Ha érvénytelen oldalra akar lapozni az URL-ben, akkor az 1. oldalra irányít át.
			if ($paging['pageCount'] < $paging['requestedPage']){
                return $this->redirect([
					'controller' => $this->controller,
					'action' => 'index',
					'?' => [
						'page'		=> $paging['pageCount'],
						'direction'	=> $direction ?? null,
						'sort'		=> $sort ?? null,
					],
					//'#' => 3
				]);
			}
		}
		// ############################# /.PAGINATE ##########################################

        $this->set('search', $search);
        $this->set('showSearchBar', $showSearchBar);

		if(empty($albumsLabels->toArray())){
			return $this->redirect(['action' => 'add']);
		}
		
		$this->set(compact('albumsLabels'));
    }

    /**
     * View method
     *
     * @param string|null $id Albums Label id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
		//Configure::write('Theme.admin.config.header_buttons_in_action.view', 
		//	array_merge(Configure::read('Theme.admin.config.header_buttons_in_action.view'), 
		//		['back' => true, 'add' => true, 'edit' => true, 'save' => false, 'view' => false, 'delete' => true]
		//	)
		//);

		$this->set('title', __('View the') . ': ' . __('albumsLabel') . ' ' . __('record'));
        $albumsLabel = $this->AlbumsLabels->get($id, contain: ['Albums', 'Labels']);
		$this->session->write('Layout.' . $this->controller . '.LastId', $id);
		$name = $albumsLabel->name;
        $this->set(compact('albumsLabel', 'id', 'name'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
		//Configure::write('Theme.admin.config.header_buttons_in_action.add', 
		//	array_merge(Configure::read('Theme.admin.config.header_buttons_in_action.add'), 
		//		['back' => true, 'add' => false, 'edit' => false, 'save' => true, 'view' => false, 'delete' => false]
		//	)
		//);
		
		$this->set('title', __('Add new') . ': ' . __('albumsLabel') . ' ' . __('record'));
        $albumsLabel = $this->AlbumsLabels->newEmptyEntity();
        if ($this->request->is('post')) {
			$data = $this->request->getData();
			//debug($data);
            $albumsLabel = $this->AlbumsLabels->patchEntity($albumsLabel, $data);
			//debug($albumsLabel);
			//die();
            if ($this->AlbumsLabels->save($albumsLabel)) {
                //$this->Flash->success(__('The albums label has been saved.'), ['plugin' => 'JeffAdmin5']);
                $this->Flash->success(__('The save has been: OK'), ['plugin' => 'JeffAdmin5']);
				$this->session->write('Layout.' . $this->controller . '.LastId', $albumsLabel->id);

                //return $this->redirect(['action' => 'add']);
                return $this->redirect([
					'controller' => $this->controller,
					'action' => 'index',
					'#' => $albumsLabel->id
				]);

            }
            //$this->Flash->error(__('The albums label could not be saved. Please, try again.'), ['plugin' => 'JeffAdmin5']);
            $this->Flash->error(__('The save has been not. Please check the datas and try again.'), ['plugin' => 'JeffAdmin5']);
        }
        $albums = $this->AlbumsLabels->Albums->find('list', conditions: ['visible' => true], limit: 200, order: ['pos' => 'asc', 'name' => 'asc'])->all();
        $labels = $this->AlbumsLabels->Labels->find('list', conditions: ['visible' => true], limit: 200, order: ['pos' => 'asc', 'name' => 'asc'])->all();
        $this->set(compact('albumsLabel', 'albums', 'labels'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Albums Label id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
		//Configure::write('Theme.admin.config.header_buttons_in_action.edit', 
		//	array_merge(Configure::read('Theme.admin.config.header_buttons_in_action.edit'), 
		//		['back' => true, 'add' => true, 'edit' => false, 'save' => true, 'view' => true, 'delete' => true]
		//	)
		//);
		
		$this->set('title', __('Edit the') . ': ' . __('albumsLabel') . ' ' . __('record'));
		$this->session->write('Layout.' . $this->controller . '.LastId', $id);
		
        $albumsLabel = $this->AlbumsLabels->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
			$data = $this->request->getData();
			//debug($data);
            $albumsLabel = $this->AlbumsLabels->patchEntity($albumsLabel, $data);
			//debug($albumsLabel);
			//die();
            if ($this->AlbumsLabels->save($albumsLabel)) {
                //$this->Flash->success(__('The albums label has been saved.'), ['plugin' => 'JeffAdmin5']);
                $this->Flash->success(__('The save has been: OK'), ['plugin' => 'JeffAdmin5']);

                //return $this->redirect(['action' => 'index']);
                return $this->redirect([
					'controller' => $this->controller,
					'action' => 'index',
					'#' => $albumsLabel->id
				]);

            }
            //$this->Flash->error(__('The albums label could not be saved. Please, try again.'), ['plugin' => 'JeffAdmin5']);
            $this->Flash->error(__('The save has been not. Please check the datas and try again.'), ['plugin' => 'JeffAdmin5']);
        }
        $albums = $this->AlbumsLabels->Albums->find('list', conditions: ['visible' => true], limit: 200, order: ['pos' => 'asc', 'name' => 'asc'])->all();
        $labels = $this->AlbumsLabels->Labels->find('list', conditions: ['visible' => true], limit: 200, order: ['pos' => 'asc', 'name' => 'asc'])->all();
		$name = $albumsLabel->name;
        $this->set(compact('albumsLabel', 'albums', 'labels', 'id', 'name'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Albums Label id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $albumsLabel = $this->AlbumsLabels->get($id);
        if ($this->AlbumsLabels->delete($albumsLabel)) {
			$this->session->delete('Layout.' . $this->controller . '.LastId');
            //$this->Flash->success(__('The albums label has been deleted.'), ['plugin' => 'JeffAdmin5']);
            $this->Flash->success(__('The has been deleted.'), ['plugin' => 'JeffAdmin5']);
        } else {
            //$this->Flash->error(__('The albums label could not be deleted. Please, try again.'), ['plugin' => 'JeffAdmin5']);
            $this->Flash->error(__('The has been deleted. Please check the datas and try again.'), ['plugin' => 'JeffAdmin5']);
        }

        return $this->redirect(['action' => 'index']);
    }
}
