<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
use Cake\Core\Configure;

$prefix = strtolower( $this->request->getParam('prefix') ?? '' );
$controller = $this->request->getParam('controller');
$action = $this->request->getParam('action');

$global_config = (array) Configure::read('Theme.' . $prefix . '.config.template.view');
$local_config = [
	// #################################### More config params in: \JeffAdmin5\config\config.php ####################################
	//'show_related_tables'	=> false,
	//'show_id' 			=> false,	// for view form
	//'show_pos' 	 		=> false,	// for view form
	//'show_counters' 		=> false,	// for view form
	//'index_show_id' 		=> false,	// for related tables
	//'index_show_visible' 	=> false,	// for related tables
	//'index_show_counters'	=> false,	// for related tables
];
$config = array_merge($global_config, $local_config);
?>
				<div class="view row">
					<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-xl-10">
						<div class="card mb-3">

							<div class="card-header">
								<div class="float-start">
									<h3><i id="card-icon" class="fa fa-eye fa-spin"></i> <?= __('View') ?>: <?= __('User') ?></h3>
									<?= __('The data marked with <span class="fw-bold text-danger">*</span> must be provided!') ?>
								</div>
								<div class="float-end ms-5">
									<?= $this->Html->link('<span class="btn btn-outline-secondary mt-1 me-1"><i class="fa fa-times"></i></span>',
										["controller" => "Users", "action" => "index", "_full" => true],
										["escape" => false, "role" => "button"]
									) ?>
								</div>

								<div class="form-tab float-end">
									<ul class="nav nav-tabs mt-1" id="myTab" role="tablist">
										<li class="nav-item" role="presentation">
											<button class="nav-link active" id="tab-first" data-bs-toggle="tab" data-bs-target="#tabPanelMain" type="button" role="tab" aria-controls="tabPanelMain" aria-selected="true"><?= __('Basic data') ?></button>
										</li>

										<li class="nav-item" role="presentation">
											<button class="nav-link" id="tabComment" data-bs-toggle="tab" data-bs-target="#tabPanelComment" type="button" role="tab" aria-controls="tabPanelComment" aria-selected="false"><?= __('Comment') ?></button>
										</li>

<?php /*
										<li class="nav-item" role="presentation">
											<button class="nav-link" id="tab-more" data-bs-toggle="tab" data-bs-target="#tab-panel-more" type="button" role="tab" aria-controls="tab-panel-more" aria-selected="false"><?= __('More') ?></button>
										</li>
*/ ?>

										<li class="nav-item dropdown">
											<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><?= __('Related tables') ?></a>
											<ul class="dropdown-menu">
<?php if (!empty($user->albums)) : ?>
												<li><?= $this->Html->link(__('Albums') . '...', ['controller' => 'Albums', 'action' => 'index', 'parent', 'user', $user->id], ['class' => 'dropdown-item']) ?></li>
<?php endif ?>
<?php if (!empty($user->clients)) : ?>
												<li><?= $this->Html->link(__('Clients') . '...', ['controller' => 'Clients', 'action' => 'index', 'parent', 'user', $user->id], ['class' => 'dropdown-item']) ?></li>
<?php endif ?>
<?php if (!empty($user->shelves)) : ?>
												<li><?= $this->Html->link(__('Shelves') . '...', ['controller' => 'Shelves', 'action' => 'index', 'parent', 'user', $user->id], ['class' => 'dropdown-item']) ?></li>
<?php endif ?>
											</ul>
										</li>

									</ul>
								</div>

							</div><!-- /card header -->
							
							<div class="card-body">
								<form>
									<div class="tab-content" id="tabContent"><!-- T.1. -->
										
										<div class="tab-pane fade show active" id="tabPanelMain" role="tabpanel" aria-labelledby="tab-first" tabindex="0">
<?php if($config['show_id']){ ?>
											<div class="row"><!-- 3. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end">#<?= __('id') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= $user->id ?><!-- 0.a -->
												</div>
											</div>
<?php } ?>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Id') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($user->id) ?>

												</div>
											</div>
											<div class="row"><!-- 1. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Usergroup') ?>:</label>
												<div class="col-sm-10 p-1 link">
													<?= $user->hasValue('usergroup') ? $this->Html->link($user->usergroup->name, ['controller' => 'Usergroups', 'action' => 'view', $user->usergroup->id]) : '' ?><span class="external-link-icon"><i class="fa fa-external-link" aria-hidden="true"></i></span>
												</div>
											</div>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Name') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($user->name) ?>

												</div>
											</div>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Email') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($user->email) ?>

												</div>
											</div>
											<div class="row"><!-- 4. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Token Expire') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($user->token_expire) ?>

												</div>
											</div>
											<div class="row"><!-- 5. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Enabled') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= $user->enabled ? '<i class="fa fa-check-square boolean-yes" aria-hidden="true"></i>' : '<i class="fa fa-square boolean-no" aria-hidden="false"></i>' ?>

												</div>
											</div>
<?php /*
											<div class="row"><!-- 6. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Comment') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= $this->Text->autoParagraph(h($user->comment)) ?>

												</div>
											</div>
*/ ?>
<?php if($config['show_counters']){ ?>
											<div class="row"><!-- counter helper -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Album Count') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= $this->Number->format($user->album_count) ?><!-- 3.b -->
												</div>
											</div>
<?php } ?>


										</div><!-- /.1.TAB -->
										
										<!-- TAB for: Comment text field -->
										<div class="tab-pane fade" id="tabPanelComment" role="tabpanel" aria-labelledby="tabComment" tabindex="0">
											<div class="row">
												<div class="col-sm-12">
													<div class="row">
														<div id="readMoreComment" class="col-sm-12 p-2 text read-more">
															<?= $this->Text->autoParagraph($user->comment) ?>

														</div>
													</div>
												</div>
											</div>
										</div>
										<!-- /.TAB for: Comment text field-->
										

<?php /*
											
										<div class="tab-pane fade" id="tab-panel-more" role="tabpanel" aria-labelledby="tab-more" tabindex="0">
											<div class="row"><!-- T.3. -->
												<div class="col-sm-12">
													<h3>Tab 3 content</h3>
													
												</div>
											</div>
										</div><!-- /.3.TAB -->
*/ ?>

									</div><!-- /.TAB PANEL -->

								</form>
							</div><!-- /card body -->
									
						    <div class="card-footer">
								<!--button type="submit" class="btn btn-outline-secondary">&larr;&nbsp;Vissza a listához</button-->
							</div><!-- /card footer -->

						</div><!-- end card-->
                    </div>

				</div>

<?php /*
	############################################################################################################################################################
	#################################################################                  #########################################################################
	#################################################################  Related tebles  #########################################################################
	#################################################################                  #########################################################################
	############################################################################################################################################################
*/ ?>
<?php if($config['show_related_tables']): ?>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<div class="card mb-3">

							<div class="card-header">
							
								<div class="float-start">
									<h3><i class="fa fa-table"></i> <?= __('Related tables') ?></h3>
									<?= __('Here you can see the latest records related to the above item.') ?>
								</div>

								<div class="form-tab float-end">
									<nav>
										<div class="nav nav-tabs mt-1" id="nav-tab" role="tablist">
<?php if (!empty($user->albums)): ?>
											<button class="nav-link active" id="nav-albums-tab" data-bs-toggle="tab" data-bs-target="#nav-albums" type="button" role="tab" aria-controls="nav-albums" aria-selected="true">
												<?= __('Albums') ?>
											</button>
<?php endif ?>
<?php if (!empty($user->clients)): ?>
											<button class="nav-link" id="nav-clients-tab" data-bs-toggle="tab" data-bs-target="#nav-clients" type="button" role="tab" aria-controls="nav-clients" aria-selected="true">
												<?= __('Clients') ?>
											</button>
<?php endif ?>
<?php if (!empty($user->shelves)): ?>
											<button class="nav-link" id="nav-shelves-tab" data-bs-toggle="tab" data-bs-target="#nav-shelves" type="button" role="tab" aria-controls="nav-shelves" aria-selected="true">
												<?= __('Shelves') ?>
											</button>
<?php endif ?>
										</div>
									</nav>
								</div>

							</div><!-- /card header -->
								
							<div class="card-body p-1 pb-0">

								<div class="tab-content" id="nav-tabContent">

<?php if (!empty($user->albums)): ?>

									<div class="tab-pane fade show active p-0" id="nav-albums" role="tabpanel" aria-labelledby="nav-albums-tab" tabindex="0">

										<table class="table table-responsive-xl table-hover table-striped" style="">
											<thead class="thead-info">
												<tr>
<?php if($config['index_show_id']){ ?>
													<th class="number id"><?= __('Id') ?></th>
<?php } ?>
													<th class="please-change-type ext-id"><?= __('Ext Id') ?></th>
													<th class="please-change-type country-id"><?= __('Country Id') ?></th>
													<th class="please-change-type artists-sort"><?= __('Artists Sort') ?></th>
													<th class="string name"><?= __('Name') ?></th>
													<th class="please-change-type year"><?= __('Year') ?></th>
													<th class="please-change-type lowest-price"><?= __('Lowest Price') ?></th>
													<th class="please-change-type laci-price"><?= __('Laci Price') ?></th>
													<th class="please-change-type released-formatted"><?= __('Released Formatted') ?></th>
													<th class="please-change-type estimated-weight"><?= __('Estimated Weight') ?></th>
													<th class="please-change-type released"><?= __('Released') ?></th>
													<th class="please-change-type notes"><?= __('Notes') ?></th>
													<th class="please-change-type url"><?= __('Url') ?></th>
													<th class="please-change-type resource-url"><?= __('Resource Url') ?></th>
													<th class="please-change-type master-url"><?= __('Master Url') ?></th>
													<th class="please-change-type master-id"><?= __('Master Id') ?></th>
													<th class="please-change-type url-src"><?= __('Url Src') ?></th>
													<th class="please-change-type uri"><?= __('Uri') ?></th>
													<th class="please-change-type thumb"><?= __('Thumb') ?></th>
<?php if($config['index_show_counters']){ ?>
													<th class="number user-count"><?= __('User Count') ?></th>
<?php } ?>
<?php if($config['index_show_pos']){ ?>
													<th class="number pos"><?= __('Pos') ?></th>
<?php } ?>
<?php if($config['index_show_visible']){ ?>
													<th class="boolean visible"><?= __('Visible') ?></th>
<?php } ?>
													<th class="please-change-type last-used"><?= __('Last Used') ?></th>
													<th class="please-change-type json"><?= __('Json') ?></th>
<?php if($config['index_show_created']){ ?>
													<th class="datetime created"><?= __('Created') ?></th>
<?php } ?>
<?php if($config['index_show_modified']){ ?>
													<th class="datetime modified"><?= __('Modified') ?></th>
<?php } ?>
													<th class="actions"><?= __('Actions') ?></th>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($user->albums as $albums) : ?>

												<tr>
<?php if($config['index_show_id']){ ?>
													<td class="number id" value="<?= $albums->id ?>"><?= h($albums->id) ?></td>
<?php } ?>
													<td class="please-change-type ext-id" value="<?= $albums->ext_id ?>"><?= h($albums->ext_id) ?></td>
													<td class="please-change-type country-id" value="<?= $albums->country_id ?>"><?= h($albums->country_id) ?></td>
													<td class="please-change-type artists-sort" value="<?= $albums->artists_sort ?>"><?= h($albums->artists_sort) ?></td>
													<td class="string name" value="<?= $albums->name ?>"><?= h($albums->name) ?></td>
													<td class="please-change-type year" value="<?= $albums->year ?>"><?= h($albums->year) ?></td>
													<td class="please-change-type lowest-price" value="<?= $albums->lowest_price ?>"><?= h($albums->lowest_price) ?></td>
													<td class="please-change-type laci-price" value="<?= $albums->laci_price ?>"><?= h($albums->laci_price) ?></td>
													<td class="please-change-type released-formatted" value="<?= $albums->released_formatted ?>"><?= h($albums->released_formatted) ?></td>
													<td class="please-change-type estimated-weight" value="<?= $albums->estimated_weight ?>"><?= h($albums->estimated_weight) ?></td>
													<td class="please-change-type released" value="<?= $albums->released ?>"><?= h($albums->released) ?></td>
													<td class="please-change-type notes" value="<?= $albums->notes ?>"><?= h($albums->notes) ?></td>
													<td class="please-change-type url" value="<?= $albums->url ?>"><?= h($albums->url) ?></td>
													<td class="please-change-type resource-url" value="<?= $albums->resource_url ?>"><?= h($albums->resource_url) ?></td>
													<td class="please-change-type master-url" value="<?= $albums->master_url ?>"><?= h($albums->master_url) ?></td>
													<td class="please-change-type master-id" value="<?= $albums->master_id ?>"><?= h($albums->master_id) ?></td>
													<td class="please-change-type url-src" value="<?= $albums->url_src ?>"><?= h($albums->url_src) ?></td>
													<td class="please-change-type uri" value="<?= $albums->uri ?>"><?= h($albums->uri) ?></td>
													<td class="please-change-type thumb" value="<?= $albums->thumb ?>"><?= h($albums->thumb) ?></td>
<?php if($config['index_show_counters']){ ?>
													<td class="number user-count" value="<?= $albums->user_count ?>"><?= h($albums->user_count) ?></td>
<?php } ?>
<?php if($config['index_show_pos']){ ?>
													<td class="number pos" value="<?= $albums->pos ?>"><?= h($albums->pos) ?></td>
<?php } ?>
<?php if($config['index_show_visible']){ ?>
													<td class="boolean visible" value="<?= $albums->visible ?>"><?= h($albums->visible) ?></td>
<?php } ?>
													<td class="please-change-type last-used" value="<?= $albums->last_used ?>"><?= h($albums->last_used) ?></td>
													<td class="please-change-type json" value="<?= $albums->json ?>"><?= h($albums->json) ?></td>
<?php if($config['index_show_created']){ ?>
													<td class="datetime created" value="<?= $albums->created ?>"><?= h($albums->created) ?></td>
<?php } ?>
<?php if($config['index_show_modified']){ ?>
													<td class="datetime modified" value="<?= $albums->modified ?>"><?= h($albums->modified) ?></td>
<?php } ?>
													<td class="actions">
														<?= $this->Html->link('<i class="fa fa-eye"></i>', ['controller' => 'Albums', 'action' => 'view', $albums->id], ["escape" => false, "role" => "button",  "class" => "btn btn-warning btn-sm", "data-toggle" => "tooltip", "data-placement" => "top", "title" => __('View this item'), "data-original-title" => ""]) ?><!-- view button -->
														<?= $this->Html->link('<i class="fa fa-edit"></i>', ['controller' => 'Albums', 'action' => 'edit', $albums->id], ["escape" => false, "role" => "button", "class" => "btn btn-primary btn-sm", "data-toggle" => "tooltip", "data-placement" => "top", "title" => __('Edit this item'), "data-original-title" => ""]) ?><!-- edit button -->
														<?= $this->Form->postLink('<i class="fa fa-times"></i>', ['controller' => 'Albums', 'action' => 'delete', $albums->id], ["escape" => false, "role" => "button", "class" => "btn btn-danger btn-sm", "data-toggle" =>"tooltip", "data-placement" => "top", "title" => __('Delete this item'), "data-original-title" => "", "confirm" => __("Are you sure you want to delete # {0}?", $albums->id)]) ?><!-- delete button -->
													</td>
												</tr>
												<?php endforeach ?>

											</tbody>
										</table>

									</div><!-- /tab pane -->
<?php endif ?>
<?php if (!empty($user->clients)): ?>

									<div class="tab-pane fade p-0" id="nav-clients" role="tabpanel" aria-labelledby="nav-clients-tab" tabindex="0">

										<table class="table table-responsive-xl table-hover table-striped" style="">
											<thead class="thead-info">
												<tr>
<?php if($config['index_show_id']){ ?>
													<th class="number id"><?= __('Id') ?></th>
<?php } ?>
													<th class="please-change-type user-id"><?= __('User Id') ?></th>
													<th class="string name"><?= __('Name') ?></th>
													<th class="please-change-type address"><?= __('Address') ?></th>
													<th class="please-change-type phone"><?= __('Phone') ?></th>
													<th class="please-change-type email"><?= __('Email') ?></th>
													<th class="please-change-type comment"><?= __('Comment') ?></th>
<?php if($config['index_show_pos']){ ?>
													<th class="number pos"><?= __('Pos') ?></th>
<?php } ?>
<?php if($config['index_show_visible']){ ?>
													<th class="boolean visible"><?= __('Visible') ?></th>
<?php } ?>
													<th class="please-change-type last-used"><?= __('Last Used') ?></th>
<?php if($config['index_show_created']){ ?>
													<th class="datetime created"><?= __('Created') ?></th>
<?php } ?>
<?php if($config['index_show_modified']){ ?>
													<th class="datetime modified"><?= __('Modified') ?></th>
<?php } ?>
													<th class="actions"><?= __('Actions') ?></th>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($user->clients as $clients) : ?>

												<tr>
<?php if($config['index_show_id']){ ?>
													<td class="number id" value="<?= $clients->id ?>"><?= h($clients->id) ?></td>
<?php } ?>
													<td class="please-change-type user-id" value="<?= $clients->user_id ?>"><?= h($clients->user_id) ?></td>
													<td class="string name" value="<?= $clients->name ?>"><?= h($clients->name) ?></td>
													<td class="please-change-type address" value="<?= $clients->address ?>"><?= h($clients->address) ?></td>
													<td class="please-change-type phone" value="<?= $clients->phone ?>"><?= h($clients->phone) ?></td>
													<td class="please-change-type email" value="<?= $clients->email ?>"><?= h($clients->email) ?></td>
													<td class="please-change-type comment" value="<?= $clients->comment ?>"><?= h($clients->comment) ?></td>
<?php if($config['index_show_pos']){ ?>
													<td class="number pos" value="<?= $clients->pos ?>"><?= h($clients->pos) ?></td>
<?php } ?>
<?php if($config['index_show_visible']){ ?>
													<td class="boolean visible" value="<?= $clients->visible ?>"><?= h($clients->visible) ?></td>
<?php } ?>
													<td class="please-change-type last-used" value="<?= $clients->last_used ?>"><?= h($clients->last_used) ?></td>
<?php if($config['index_show_created']){ ?>
													<td class="datetime created" value="<?= $clients->created ?>"><?= h($clients->created) ?></td>
<?php } ?>
<?php if($config['index_show_modified']){ ?>
													<td class="datetime modified" value="<?= $clients->modified ?>"><?= h($clients->modified) ?></td>
<?php } ?>
													<td class="actions">
														<?= $this->Html->link('<i class="fa fa-eye"></i>', ['controller' => 'Clients', 'action' => 'view', $clients->id], ["escape" => false, "role" => "button",  "class" => "btn btn-warning btn-sm", "data-toggle" => "tooltip", "data-placement" => "top", "title" => __('View this item'), "data-original-title" => ""]) ?><!-- view button -->
														<?= $this->Html->link('<i class="fa fa-edit"></i>', ['controller' => 'Clients', 'action' => 'edit', $clients->id], ["escape" => false, "role" => "button", "class" => "btn btn-primary btn-sm", "data-toggle" => "tooltip", "data-placement" => "top", "title" => __('Edit this item'), "data-original-title" => ""]) ?><!-- edit button -->
														<?= $this->Form->postLink('<i class="fa fa-times"></i>', ['controller' => 'Clients', 'action' => 'delete', $clients->id], ["escape" => false, "role" => "button", "class" => "btn btn-danger btn-sm", "data-toggle" =>"tooltip", "data-placement" => "top", "title" => __('Delete this item'), "data-original-title" => "", "confirm" => __("Are you sure you want to delete # {0}?", $clients->id)]) ?><!-- delete button -->
													</td>
												</tr>
												<?php endforeach ?>

											</tbody>
										</table>

									</div><!-- /tab pane -->
<?php endif ?>
<?php if (!empty($user->shelves)): ?>

									<div class="tab-pane fade p-0" id="nav-shelves" role="tabpanel" aria-labelledby="nav-shelves-tab" tabindex="0">

										<table class="table table-responsive-xl table-hover table-striped" style="">
											<thead class="thead-info">
												<tr>
<?php if($config['index_show_id']){ ?>
													<th class="number id"><?= __('Id') ?></th>
<?php } ?>
													<th class="please-change-type user-id"><?= __('User Id') ?></th>
													<th class="string name"><?= __('Name') ?></th>
<?php if($config['index_show_counters']){ ?>
													<th class="number album-count"><?= __('Album Count') ?></th>
<?php } ?>
<?php if($config['index_show_pos']){ ?>
													<th class="number pos"><?= __('Pos') ?></th>
<?php } ?>
<?php if($config['index_show_visible']){ ?>
													<th class="boolean visible"><?= __('Visible') ?></th>
<?php } ?>
													<th class="please-change-type last-used"><?= __('Last Used') ?></th>
<?php if($config['index_show_created']){ ?>
													<th class="datetime created"><?= __('Created') ?></th>
<?php } ?>
<?php if($config['index_show_modified']){ ?>
													<th class="datetime modified"><?= __('Modified') ?></th>
<?php } ?>
													<th class="actions"><?= __('Actions') ?></th>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($user->shelves as $shelves) : ?>

												<tr>
<?php if($config['index_show_id']){ ?>
													<td class="number id" value="<?= $shelves->id ?>"><?= h($shelves->id) ?></td>
<?php } ?>
													<td class="please-change-type user-id" value="<?= $shelves->user_id ?>"><?= h($shelves->user_id) ?></td>
													<td class="string name" value="<?= $shelves->name ?>"><?= h($shelves->name) ?></td>
<?php if($config['index_show_counters']){ ?>
													<td class="number album-count" value="<?= $shelves->album_count ?>"><?= h($shelves->album_count) ?></td>
<?php } ?>
<?php if($config['index_show_pos']){ ?>
													<td class="number pos" value="<?= $shelves->pos ?>"><?= h($shelves->pos) ?></td>
<?php } ?>
<?php if($config['index_show_visible']){ ?>
													<td class="boolean visible" value="<?= $shelves->visible ?>"><?= h($shelves->visible) ?></td>
<?php } ?>
													<td class="please-change-type last-used" value="<?= $shelves->last_used ?>"><?= h($shelves->last_used) ?></td>
<?php if($config['index_show_created']){ ?>
													<td class="datetime created" value="<?= $shelves->created ?>"><?= h($shelves->created) ?></td>
<?php } ?>
<?php if($config['index_show_modified']){ ?>
													<td class="datetime modified" value="<?= $shelves->modified ?>"><?= h($shelves->modified) ?></td>
<?php } ?>
													<td class="actions">
														<?= $this->Html->link('<i class="fa fa-eye"></i>', ['controller' => 'Shelves', 'action' => 'view', $shelves->id], ["escape" => false, "role" => "button",  "class" => "btn btn-warning btn-sm", "data-toggle" => "tooltip", "data-placement" => "top", "title" => __('View this item'), "data-original-title" => ""]) ?><!-- view button -->
														<?= $this->Html->link('<i class="fa fa-edit"></i>', ['controller' => 'Shelves', 'action' => 'edit', $shelves->id], ["escape" => false, "role" => "button", "class" => "btn btn-primary btn-sm", "data-toggle" => "tooltip", "data-placement" => "top", "title" => __('Edit this item'), "data-original-title" => ""]) ?><!-- edit button -->
														<?= $this->Form->postLink('<i class="fa fa-times"></i>', ['controller' => 'Shelves', 'action' => 'delete', $shelves->id], ["escape" => false, "role" => "button", "class" => "btn btn-danger btn-sm", "data-toggle" =>"tooltip", "data-placement" => "top", "title" => __('Delete this item'), "data-original-title" => "", "confirm" => __("Are you sure you want to delete # {0}?", $shelves->id)]) ?><!-- delete button -->
													</td>
												</tr>
												<?php endforeach ?>

											</tbody>
										</table>

									</div><!-- /tab pane -->
<?php endif ?>

								</div><!-- /tab content -->

							</div><!-- /card body -->

						    <div class="card-footer">
								<!-- Bottom text! -->
							</div><!-- /card footer -->
							
						</div><!-- end card -->
                    </div><!-- end col -->
				</div><!-- end row -->
<?php endif // $config['show_related_tables'] ?>

<?php
	$this->Html->css(
		[
			//// 'JeffAdmin5./assets/plugins/',
		],
		['block' => true]
	);

	$this->Html->script(
		[
			//// 'JeffAdmin5./assets/plugins/',
		],
		['block' => 'scriptBottom']
	);
?>

<?php $this->Html->scriptStart(['block' => 'javaScriptBottom']) ?>

<?php $this->Html->scriptEnd() ?>
