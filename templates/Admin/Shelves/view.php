<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Shelf $shelf
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
									<h3><i id="card-icon" class="fa fa-eye fa-spin"></i> <?= __('View') ?>: <?= __('Shelf') ?></h3>
									<?= __('The data marked with <span class="fw-bold text-danger">*</span> must be provided!') ?>
								</div>
								<div class="float-end ms-5">
									<?= $this->Html->link('<span class="btn btn-outline-secondary mt-1 me-1"><i class="fa fa-times"></i></span>',
										["controller" => "Shelves", "action" => "index", "_full" => true],
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
<?php if (!empty($shelf->albums_users)) : ?>
												<li><?= $this->Html->link(__('Albums Users') . '...', ['controller' => 'Albums Users', 'action' => 'index', 'parent', 'shelf', $shelf->id], ['class' => 'dropdown-item']) ?></li>
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
													<?= $shelf->id ?><!-- 0.a -->
												</div>
											</div>
<?php } ?>
											<div class="row"><!-- 1. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('User') ?>:</label>
												<div class="col-sm-10 p-1 link">
													<?= $shelf->hasValue('user') ? $this->Html->link($shelf->user->name, ['controller' => 'Users', 'action' => 'view', $shelf->user->id]) : '' ?><span class="external-link-icon"><i class="fa fa-external-link" aria-hidden="true"></i></span>
												</div>
											</div>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Name') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($shelf->name) ?>

												</div>
											</div>
											<div class="row"><!-- 4. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Last Used') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($shelf->last_used) ?>

												</div>
											</div>
<?php if($config['show_counters']){ ?>
											<div class="row"><!-- counter helper -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Album Count') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= $this->Number->format($shelf->album_count) ?><!-- 3.b -->
												</div>
											</div>
<?php } ?>


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
<?php if (!empty($shelf->albums_users)): ?>
											<button class="nav-link active" id="nav-albums_users-tab" data-bs-toggle="tab" data-bs-target="#nav-albums_users" type="button" role="tab" aria-controls="nav-albums_users" aria-selected="true">
												<?= __('Albums Users') ?>
											</button>
<?php endif ?>
										</div>
									</nav>
								</div>

							</div><!-- /card header -->
								
							<div class="card-body p-1 pb-0">

								<div class="tab-content" id="nav-tabContent">

<?php if (!empty($shelf->albums_users)): ?>

									<div class="tab-pane fade show active p-0" id="nav-albums_users" role="tabpanel" aria-labelledby="nav-albums_users-tab" tabindex="0">

										<table class="table table-responsive-xl table-hover table-striped" style="">
											<thead class="thead-info">
												<tr>
<?php if($config['index_show_id']){ ?>
													<th class="number id"><?= __('Id') ?></th>
<?php } ?>
													<th class="please-change-type user-id"><?= __('User Id') ?></th>
													<th class="please-change-type album-id"><?= __('Album Id') ?></th>
													<th class="please-change-type condition-id"><?= __('Condition Id') ?></th>
													<th class="please-change-type shelf-id"><?= __('Shelf Id') ?></th>
													<th class="please-change-type custom-serial-number"><?= __('Custom Serial Number') ?></th>
													<th class="please-change-type last-play"><?= __('Last Play') ?></th>
													<th class="please-change-type disk-A-condition-id"><?= __('Disk A Condition Id') ?></th>
													<th class="please-change-type disk-B-condition-id"><?= __('Disk B Condition Id') ?></th>
													<th class="please-change-type disk-C-condition-id"><?= __('Disk C Condition Id') ?></th>
													<th class="please-change-type disk-D-condition-id"><?= __('Disk D Condition Id') ?></th>
													<th class="please-change-type disk-E-condition-id"><?= __('Disk E Condition Id') ?></th>
													<th class="please-change-type disk-F-condition-id"><?= __('Disk F Condition Id') ?></th>
													<th class="please-change-type disk-G-condition-id"><?= __('Disk G Condition Id') ?></th>
													<th class="please-change-type disk-H-condition-id"><?= __('Disk H Condition Id') ?></th>
													<th class="please-change-type generic"><?= __('Generic') ?></th>
													<th class="please-change-type name-from"><?= __('Name From') ?></th>
													<th class="please-change-type address-from"><?= __('Address From') ?></th>
													<th class="please-change-type phone-from"><?= __('Phone From') ?></th>
													<th class="please-change-type email-from"><?= __('Email From') ?></th>
													<th class="please-change-type price-from"><?= __('Price From') ?></th>
													<th class="please-change-type name-sold"><?= __('Name Sold') ?></th>
													<th class="please-change-type address-sold"><?= __('Address Sold') ?></th>
													<th class="please-change-type phone-sold"><?= __('Phone Sold') ?></th>
													<th class="please-change-type email-sold"><?= __('Email Sold') ?></th>
													<th class="please-change-type price-sold"><?= __('Price Sold') ?></th>
													<th class="please-change-type comment"><?= __('Comment') ?></th>
<?php if($config['index_show_pos']){ ?>
													<th class="number pos"><?= __('Pos') ?></th>
<?php } ?>
<?php if($config['index_show_visible']){ ?>
													<th class="boolean visible"><?= __('Visible') ?></th>
<?php } ?>
													<th class="please-change-type last-used"><?= __('Last Used') ?></th>
<?php if($config['index_show_counters']){ ?>
													<th class="number play-count"><?= __('Play Count') ?></th>
<?php } ?>
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
												<?php foreach ($shelf->albums_users as $albumsUsers) : ?>

												<tr>
<?php if($config['index_show_id']){ ?>
													<td class="number id" value="<?= $albumsUsers->id ?>"><?= h($albumsUsers->id) ?></td>
<?php } ?>
													<td class="please-change-type user-id" value="<?= $albumsUsers->user_id ?>"><?= h($albumsUsers->user_id) ?></td>
													<td class="please-change-type album-id" value="<?= $albumsUsers->album_id ?>"><?= h($albumsUsers->album_id) ?></td>
													<td class="please-change-type condition-id" value="<?= $albumsUsers->condition_id ?>"><?= h($albumsUsers->condition_id) ?></td>
													<td class="please-change-type shelf-id" value="<?= $albumsUsers->shelf_id ?>"><?= h($albumsUsers->shelf_id) ?></td>
													<td class="please-change-type custom-serial-number" value="<?= $albumsUsers->custom_serial_number ?>"><?= h($albumsUsers->custom_serial_number) ?></td>
													<td class="please-change-type last-play" value="<?= $albumsUsers->last_play ?>"><?= h($albumsUsers->last_play) ?></td>
													<td class="please-change-type disk-A-condition-id" value="<?= $albumsUsers->disk_A_condition_id ?>"><?= h($albumsUsers->disk_A_condition_id) ?></td>
													<td class="please-change-type disk-B-condition-id" value="<?= $albumsUsers->disk_B_condition_id ?>"><?= h($albumsUsers->disk_B_condition_id) ?></td>
													<td class="please-change-type disk-C-condition-id" value="<?= $albumsUsers->disk_C_condition_id ?>"><?= h($albumsUsers->disk_C_condition_id) ?></td>
													<td class="please-change-type disk-D-condition-id" value="<?= $albumsUsers->disk_D_condition_id ?>"><?= h($albumsUsers->disk_D_condition_id) ?></td>
													<td class="please-change-type disk-E-condition-id" value="<?= $albumsUsers->disk_E_condition_id ?>"><?= h($albumsUsers->disk_E_condition_id) ?></td>
													<td class="please-change-type disk-F-condition-id" value="<?= $albumsUsers->disk_F_condition_id ?>"><?= h($albumsUsers->disk_F_condition_id) ?></td>
													<td class="please-change-type disk-G-condition-id" value="<?= $albumsUsers->disk_G_condition_id ?>"><?= h($albumsUsers->disk_G_condition_id) ?></td>
													<td class="please-change-type disk-H-condition-id" value="<?= $albumsUsers->disk_H_condition_id ?>"><?= h($albumsUsers->disk_H_condition_id) ?></td>
													<td class="please-change-type generic" value="<?= $albumsUsers->generic ?>"><?= h($albumsUsers->generic) ?></td>
													<td class="please-change-type name-from" value="<?= $albumsUsers->name_from ?>"><?= h($albumsUsers->name_from) ?></td>
													<td class="please-change-type address-from" value="<?= $albumsUsers->address_from ?>"><?= h($albumsUsers->address_from) ?></td>
													<td class="please-change-type phone-from" value="<?= $albumsUsers->phone_from ?>"><?= h($albumsUsers->phone_from) ?></td>
													<td class="please-change-type email-from" value="<?= $albumsUsers->email_from ?>"><?= h($albumsUsers->email_from) ?></td>
													<td class="please-change-type price-from" value="<?= $albumsUsers->price_from ?>"><?= h($albumsUsers->price_from) ?></td>
													<td class="please-change-type name-sold" value="<?= $albumsUsers->name_sold ?>"><?= h($albumsUsers->name_sold) ?></td>
													<td class="please-change-type address-sold" value="<?= $albumsUsers->address_sold ?>"><?= h($albumsUsers->address_sold) ?></td>
													<td class="please-change-type phone-sold" value="<?= $albumsUsers->phone_sold ?>"><?= h($albumsUsers->phone_sold) ?></td>
													<td class="please-change-type email-sold" value="<?= $albumsUsers->email_sold ?>"><?= h($albumsUsers->email_sold) ?></td>
													<td class="please-change-type price-sold" value="<?= $albumsUsers->price_sold ?>"><?= h($albumsUsers->price_sold) ?></td>
													<td class="please-change-type comment" value="<?= $albumsUsers->comment ?>"><?= h($albumsUsers->comment) ?></td>
<?php if($config['index_show_pos']){ ?>
													<td class="number pos" value="<?= $albumsUsers->pos ?>"><?= h($albumsUsers->pos) ?></td>
<?php } ?>
<?php if($config['index_show_visible']){ ?>
													<td class="boolean visible" value="<?= $albumsUsers->visible ?>"><?= h($albumsUsers->visible) ?></td>
<?php } ?>
													<td class="please-change-type last-used" value="<?= $albumsUsers->last_used ?>"><?= h($albumsUsers->last_used) ?></td>
<?php if($config['index_show_counters']){ ?>
													<td class="number play-count" value="<?= $albumsUsers->play_count ?>"><?= h($albumsUsers->play_count) ?></td>
<?php } ?>
<?php if($config['index_show_created']){ ?>
													<td class="datetime created" value="<?= $albumsUsers->created ?>"><?= h($albumsUsers->created) ?></td>
<?php } ?>
<?php if($config['index_show_modified']){ ?>
													<td class="datetime modified" value="<?= $albumsUsers->modified ?>"><?= h($albumsUsers->modified) ?></td>
<?php } ?>
													<td class="actions">
														<?= $this->Html->link('<i class="fa fa-eye"></i>', ['controller' => 'AlbumsUsers', 'action' => 'view', $albumsUsers->id], ["escape" => false, "role" => "button",  "class" => "btn btn-warning btn-sm", "data-toggle" => "tooltip", "data-placement" => "top", "title" => __('View this item'), "data-original-title" => ""]) ?><!-- view button -->
														<?= $this->Html->link('<i class="fa fa-edit"></i>', ['controller' => 'AlbumsUsers', 'action' => 'edit', $albumsUsers->id], ["escape" => false, "role" => "button", "class" => "btn btn-primary btn-sm", "data-toggle" => "tooltip", "data-placement" => "top", "title" => __('Edit this item'), "data-original-title" => ""]) ?><!-- edit button -->
														<?= $this->Form->postLink('<i class="fa fa-times"></i>', ['controller' => 'AlbumsUsers', 'action' => 'delete', $albumsUsers->id], ["escape" => false, "role" => "button", "class" => "btn btn-danger btn-sm", "data-toggle" =>"tooltip", "data-placement" => "top", "title" => __('Delete this item'), "data-original-title" => "", "confirm" => __("Are you sure you want to delete # {0}?", $albumsUsers->id)]) ?><!-- delete button -->
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
