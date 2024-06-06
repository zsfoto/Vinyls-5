<?php
declare(strict_types=1);

namespace App\Controller\Admin;


use App\Controller\Admin\AppController;
use Cake\Core\Configure;
use Cake\Http\Exception\NotFoundException;


/**
 * AlbumsUsersAbbreviations Controller
 *
 * @property \App\Model\Table\AlbumsUsersAbbreviationsTable $AlbumsUsersAbbreviations
 */
class AlbumsUsersAbbreviationsController extends AppController
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

		$this->set('title', __('Browse the') . ': ' . __('AlbumsUsersAbbreviations'));

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

		$this->paginate['AlbumsUsersAbbreviations']['page'] 	= $page;
		$this->paginate['AlbumsUsersAbbreviations']['order'] 	= [$sort => $direction];
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
			$query = $this->AlbumsUsersAbbreviations->find()
				->contain(['AlbumsUsers', 'Abbreviations'])
				->where([
					'OR' => [
						'name LIKE' => '%' . $search .  '%',
						//'title LIKE' => '%' . $search .  '%',
						//'value' => (integer) $search,			// Must be convert to integer
					]
				]);
		}else{
			$query = $this->AlbumsUsersAbbreviations->find()->contain(['AlbumsUsers', 'Abbreviations'])->where($conditions);
		}
		// ############################# /.QUERY ###########################################


		// ############################# PAGINATE ############################################
		try {
			$this->paginate['AlbumsUsersAbbreviations']['limit'] = $this->config['paginate_limit'];
			$albumsUsersAbbreviations = $this->paginate($query);
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

		if(empty($albumsUsersAbbreviations->toArray())){
			return $this->redirect(['action' => 'add']);
		}
		
		$this->set(compact('albumsUsersAbbreviations'));
    }

    /**
     * View method
     *
     * @param string|null $id Albums Users Abbreviation id.
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

		$this->set('title', __('View the') . ': ' . __('albumsUsersAbbreviation') . ' ' . __('record'));
        $albumsUsersAbbreviation = $this->AlbumsUsersAbbreviations->get($id, contain: ['AlbumsUsers', 'Abbreviations']);
		$this->session->write('Layout.' . $this->controller . '.LastId', $id);
		$name = $albumsUsersAbbreviation->name;
        $this->set(compact('albumsUsersAbbreviation', 'id', 'name'));
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
		
		$this->set('title', __('Add new') . ': ' . __('albumsUsersAbbreviation') . ' ' . __('record'));
        $albumsUsersAbbreviation = $this->AlbumsUsersAbbreviations->newEmptyEntity();
        if ($this->request->is('post')) {
			$data = $this->request->getData();
			//debug($data);
            $albumsUsersAbbreviation = $this->AlbumsUsersAbbreviations->patchEntity($albumsUsersAbbreviation, $data);
			//debug($albumsUsersAbbreviation);
			//die();
            if ($this->AlbumsUsersAbbreviations->save($albumsUsersAbbreviation)) {
                //$this->Flash->success(__('The albums users abbreviation has been saved.'), ['plugin' => 'JeffAdmin5']);
                $this->Flash->success(__('The save has been: OK'), ['plugin' => 'JeffAdmin5']);
				$this->session->write('Layout.' . $this->controller . '.LastId', $albumsUsersAbbreviation->id);

                //return $this->redirect(['action' => 'add']);
                return $this->redirect([
					'controller' => $this->controller,
					'action' => 'index',
					'#' => $albumsUsersAbbreviation->id
				]);

            }
            //$this->Flash->error(__('The albums users abbreviation could not be saved. Please, try again.'), ['plugin' => 'JeffAdmin5']);
            $this->Flash->error(__('The save has been not. Please check the datas and try again.'), ['plugin' => 'JeffAdmin5']);
        }
        $albumsUsers = $this->AlbumsUsersAbbreviations->AlbumsUsers->find('list', conditions: ['visible' => true], limit: 200, order: ['pos' => 'asc', 'name' => 'asc'])->all();
        $abbreviations = $this->AlbumsUsersAbbreviations->Abbreviations->find('list', conditions: ['visible' => true], limit: 200, order: ['pos' => 'asc', 'name' => 'asc'])->all();
        $this->set(compact('albumsUsersAbbreviation', 'albumsUsers', 'abbreviations'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Albums Users Abbreviation id.
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
		
		$this->set('title', __('Edit the') . ': ' . __('albumsUsersAbbreviation') . ' ' . __('record'));
		$this->session->write('Layout.' . $this->controller . '.LastId', $id);
		
        $albumsUsersAbbreviation = $this->AlbumsUsersAbbreviations->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
			$data = $this->request->getData();
			//debug($data);
            $albumsUsersAbbreviation = $this->AlbumsUsersAbbreviations->patchEntity($albumsUsersAbbreviation, $data);
			//debug($albumsUsersAbbreviation);
			//die();
            if ($this->AlbumsUsersAbbreviations->save($albumsUsersAbbreviation)) {
                //$this->Flash->success(__('The albums users abbreviation has been saved.'), ['plugin' => 'JeffAdmin5']);
                $this->Flash->success(__('The save has been: OK'), ['plugin' => 'JeffAdmin5']);

                //return $this->redirect(['action' => 'index']);
                return $this->redirect([
					'controller' => $this->controller,
					'action' => 'index',
					'#' => $albumsUsersAbbreviation->id
				]);

            }
            //$this->Flash->error(__('The albums users abbreviation could not be saved. Please, try again.'), ['plugin' => 'JeffAdmin5']);
            $this->Flash->error(__('The save has been not. Please check the datas and try again.'), ['plugin' => 'JeffAdmin5']);
        }
        $albumsUsers = $this->AlbumsUsersAbbreviations->AlbumsUsers->find('list', conditions: ['visible' => true], limit: 200, order: ['pos' => 'asc', 'name' => 'asc'])->all();
        $abbreviations = $this->AlbumsUsersAbbreviations->Abbreviations->find('list', conditions: ['visible' => true], limit: 200, order: ['pos' => 'asc', 'name' => 'asc'])->all();
		$name = $albumsUsersAbbreviation->name;
        $this->set(compact('albumsUsersAbbreviation', 'albumsUsers', 'abbreviations', 'id', 'name'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Albums Users Abbreviation id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $albumsUsersAbbreviation = $this->AlbumsUsersAbbreviations->get($id);
        if ($this->AlbumsUsersAbbreviations->delete($albumsUsersAbbreviation)) {
			$this->session->delete('Layout.' . $this->controller . '.LastId');
            //$this->Flash->success(__('The albums users abbreviation has been deleted.'), ['plugin' => 'JeffAdmin5']);
            $this->Flash->success(__('The has been deleted.'), ['plugin' => 'JeffAdmin5']);
        } else {
            //$this->Flash->error(__('The albums users abbreviation could not be deleted. Please, try again.'), ['plugin' => 'JeffAdmin5']);
            $this->Flash->error(__('The has been deleted. Please check the datas and try again.'), ['plugin' => 'JeffAdmin5']);
        }

        return $this->redirect(['action' => 'index']);
    }
}
