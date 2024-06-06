<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Language $language
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
									<h3><i id="card-icon" class="fa fa-eye fa-spin"></i> <?= __('View') ?>: <?= __('Language') ?></h3>
									<?= __('The data marked with <span class="fw-bold text-danger">*</span> must be provided!') ?>
								</div>
								<div class="float-end ms-5">
									<?= $this->Html->link('<span class="btn btn-outline-secondary mt-1 me-1"><i class="fa fa-times"></i></span>',
										["controller" => "Languages", "action" => "index", "_full" => true],
										["escape" => false, "role" => "button"]
									) ?>
								</div>

								<div class="form-tab float-end">
									<ul class="nav nav-tabs mt-1" id="myTab" role="tablist">
										<li class="nav-item" role="presentation">
											<button class="nav-link active" id="tab-first" data-bs-toggle="tab" data-bs-target="#tabPanelMain" type="button" role="tab" aria-controls="tabPanelMain" aria-selected="true"><?= __('Basic data') ?></button>
										</li>


<?php /*
										<li class="nav-item" role="presentation">
											<button class="nav-link" id="tab-more" data-bs-toggle="tab" data-bs-target="#tab-panel-more" type="button" role="tab" aria-controls="tab-panel-more" aria-selected="false"><?= __('More') ?></button>
										</li>
*/ ?>

										<li class="nav-item dropdown">
											<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><?= __('Related tables') ?></a>
											<ul class="dropdown-menu">
<?php if (!empty($language->albums)) : ?>
												<li><?= $this->Html->link(__('Albums') . '...', ['controller' => 'Albums', 'action' => 'index', 'parent', 'language', $language->id], ['class' => 'dropdown-item']) ?></li>
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
													<?= $language->id ?><!-- 0.a -->
												</div>
											</div>
<?php } ?>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Name') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($language->name) ?>

												</div>
											</div>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Short Name') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($language->short_name) ?>

												</div>
											</div>
											<div class="row"><!-- 4. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Last Used') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($language->last_used) ?>

												</div>
											</div>

										</div><!-- /.1.TAB -->
										

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
<?php if (!empty($language->albums)): ?>
											<button class="nav-link active" id="nav-albums-tab" data-bs-toggle="tab" data-bs-target="#nav-albums" type="button" role="tab" aria-controls="nav-albums" aria-selected="true">
												<?= __('Albums') ?>
											</button>
<?php endif ?>
										</div>
									</nav>
								</div>

							</div><!-- /card header -->
								
							<div class="card-body p-1 pb-0">

								<div class="tab-content" id="nav-tabContent">

<?php if (!empty($language->albums)): ?>

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
												<?php foreach ($language->albums as $albums) : ?>

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
