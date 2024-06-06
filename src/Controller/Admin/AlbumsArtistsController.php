<?php
declare(strict_types=1);

namespace App\Controller\Admin;


use App\Controller\Admin\AppController;
use Cake\Core\Configure;
use Cake\Http\Exception\NotFoundException;


/**
 * AlbumsArtists Controller
 *
 * @property \App\Model\Table\AlbumsArtistsTable $AlbumsArtists
 */
class AlbumsArtistsController extends AppController
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

		$this->set('title', __('Browse the') . ': ' . __('AlbumsArtists'));

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

		$this->paginate['AlbumsArtists']['page'] 	= $page;
		$this->paginate['AlbumsArtists']['order'] 	= [$sort => $direction];
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
			$query = $this->AlbumsArtists->find()
				->contain(['Albums', 'Artists'])
				->where([
					'OR' => [
						'name LIKE' => '%' . $search .  '%',
						//'title LIKE' => '%' . $search .  '%',
						//'value' => (integer) $search,			// Must be convert to integer
					]
				]);
		}else{
			$query = $this->AlbumsArtists->find()->contain(['Albums', 'Artists'])->where($conditions);
		}
		// ############################# /.QUERY ###########################################


		// ############################# PAGINATE ############################################
		try {
			$this->paginate['AlbumsArtists']['limit'] = $this->config['paginate_limit'];
			$albumsArtists = $this->paginate($query);
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

		if(empty($albumsArtists->toArray())){
			return $this->redirect(['action' => 'add']);
		}
		
		$this->set(compact('albumsArtists'));
    }

    /**
     * View method
     *
     * @param string|null $id Albums Artist id.
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

		$this->set('title', __('View the') . ': ' . __('albumsArtist') . ' ' . __('record'));
        $albumsArtist = $this->AlbumsArtists->get($id, contain: ['Albums', 'Artists']);
		$this->session->write('Layout.' . $this->controller . '.LastId', $id);
		$name = $albumsArtist->name;
        $this->set(compact('albumsArtist', 'id', 'name'));
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
		
		$this->set('title', __('Add new') . ': ' . __('albumsArtist') . ' ' . __('record'));
        $albumsArtist = $this->AlbumsArtists->newEmptyEntity();
        if ($this->request->is('post')) {
			$data = $this->request->getData();
			//debug($data);
            $albumsArtist = $this->AlbumsArtists->patchEntity($albumsArtist, $data);
			//debug($albumsArtist);
			//die();
            if ($this->AlbumsArtists->save($albumsArtist)) {
                //$this->Flash->success(__('The albums artist has been saved.'), ['plugin' => 'JeffAdmin5']);
                $this->Flash->success(__('The save has been: OK'), ['plugin' => 'JeffAdmin5']);
				$this->session->write('Layout.' . $this->controller . '.LastId', $albumsArtist->id);

                //return $this->redirect(['action' => 'add']);
                return $this->redirect([
					'controller' => $this->controller,
					'action' => 'index',
					'#' => $albumsArtist->id
				]);

            }
            //$this->Flash->error(__('The albums artist could not be saved. Please, try again.'), ['plugin' => 'JeffAdmin5']);
            $this->Flash->error(__('The save has been not. Please check the datas and try again.'), ['plugin' => 'JeffAdmin5']);
        }
        $albums = $this->AlbumsArtists->Albums->find('list', conditions: ['visible' => true], limit: 200, order: ['pos' => 'asc', 'name' => 'asc'])->all();
        $artists = $this->AlbumsArtists->Artists->find('list', conditions: ['visible' => true], limit: 200, order: ['pos' => 'asc', 'name' => 'asc'])->all();
        $this->set(compact('albumsArtist', 'albums', 'artists'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Albums Artist id.
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
		
		$this->set('title', __('Edit the') . ': ' . __('albumsArtist') . ' ' . __('record'));
		$this->session->write('Layout.' . $this->controller . '.LastId', $id);
		
        $albumsArtist = $this->AlbumsArtists->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
			$data = $this->request->getData();
			//debug($data);
            $albumsArtist = $this->AlbumsArtists->patchEntity($albumsArtist, $data);
			//debug($albumsArtist);
			//die();
            if ($this->AlbumsArtists->save($albumsArtist)) {
                //$this->Flash->success(__('The albums artist has been saved.'), ['plugin' => 'JeffAdmin5']);
                $this->Flash->success(__('The save has been: OK'), ['plugin' => 'JeffAdmin5']);

                //return $this->redirect(['action' => 'index']);
                return $this->redirect([
					'controller' => $this->controller,
					'action' => 'index',
					'#' => $albumsArtist->id
				]);

            }
            //$this->Flash->error(__('The albums artist could not be saved. Please, try again.'), ['plugin' => 'JeffAdmin5']);
            $this->Flash->error(__('The save has been not. Please check the datas and try again.'), ['plugin' => 'JeffAdmin5']);
        }
        $albums = $this->AlbumsArtists->Albums->find('list', conditions: ['visible' => true], limit: 200, order: ['pos' => 'asc', 'name' => 'asc'])->all();
        $artists = $this->AlbumsArtists->Artists->find('list', conditions: ['visible' => true], limit: 200, order: ['pos' => 'asc', 'name' => 'asc'])->all();
		$name = $albumsArtist->name;
        $this->set(compact('albumsArtist', 'albums', 'artists', 'id', 'name'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Albums Artist id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $albumsArtist = $this->AlbumsArtists->get($id);
        if ($this->AlbumsArtists->delete($albumsArtist)) {
			$this->session->delete('Layout.' . $this->controller . '.LastId');
            //$this->Flash->success(__('The albums artist has been deleted.'), ['plugin' => 'JeffAdmin5']);
            $this->Flash->success(__('The has been deleted.'), ['plugin' => 'JeffAdmin5']);
        } else {
            //$this->Flash->error(__('The albums artist could not be deleted. Please, try again.'), ['plugin' => 'JeffAdmin5']);
            $this->Flash->error(__('The has been deleted. Please check the datas and try again.'), ['plugin' => 'JeffAdmin5']);
        }

        return $this->redirect(['action' => 'index']);
    }
}
