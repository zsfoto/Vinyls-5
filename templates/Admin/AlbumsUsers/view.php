<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AlbumsUser $albumsUser
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
									<h3><i id="card-icon" class="fa fa-eye fa-spin"></i> <?= __('View') ?>: <?= __('Albums User') ?></h3>
									<?= __('The data marked with <span class="fw-bold text-danger">*</span> must be provided!') ?>
								</div>
								<div class="float-end ms-5">
									<?= $this->Html->link('<span class="btn btn-outline-secondary mt-1 me-1"><i class="fa fa-times"></i></span>',
										["controller" => "Albums Users", "action" => "index", "_full" => true],
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
<?php if (!empty($albumsUser->abbreviations)) : ?>
												<li><?= $this->Html->link(__('Abbreviations') . '...', ['controller' => 'Abbreviations', 'action' => 'index', 'parent', 'albumsUser', $albumsUser->id], ['class' => 'dropdown-item']) ?></li>
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
													<?= $albumsUser->id ?><!-- 0.a -->
												</div>
											</div>
<?php } ?>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Id') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($albumsUser->id) ?>

												</div>
											</div>
											<div class="row"><!-- 1. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('User') ?>:</label>
												<div class="col-sm-10 p-1 link">
													<?= $albumsUser->hasValue('user') ? $this->Html->link($albumsUser->user->name, ['controller' => 'Users', 'action' => 'view', $albumsUser->user->id]) : '' ?><span class="external-link-icon"><i class="fa fa-external-link" aria-hidden="true"></i></span>
												</div>
											</div>
											<div class="row"><!-- 1. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Album') ?>:</label>
												<div class="col-sm-10 p-1 link">
													<?= $albumsUser->hasValue('album') ? $this->Html->link($albumsUser->album->name, ['controller' => 'Albums', 'action' => 'view', $albumsUser->album->id]) : '' ?><span class="external-link-icon"><i class="fa fa-external-link" aria-hidden="true"></i></span>
												</div>
											</div>
											<div class="row"><!-- 1. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Condition') ?>:</label>
												<div class="col-sm-10 p-1 link">
													<?= $albumsUser->hasValue('condition') ? $this->Html->link($albumsUser->condition->name, ['controller' => 'Conditions', 'action' => 'view', $albumsUser->condition->id]) : '' ?><span class="external-link-icon"><i class="fa fa-external-link" aria-hidden="true"></i></span>
												</div>
											</div>
											<div class="row"><!-- 1. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Shelf') ?>:</label>
												<div class="col-sm-10 p-1 link">
													<?= $albumsUser->hasValue('shelf') ? $this->Html->link($albumsUser->shelf->name, ['controller' => 'Shelves', 'action' => 'view', $albumsUser->shelf->id]) : '' ?><span class="external-link-icon"><i class="fa fa-external-link" aria-hidden="true"></i></span>
												</div>
											</div>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Name From') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($albumsUser->name_from) ?>

												</div>
											</div>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Address From') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($albumsUser->address_from) ?>

												</div>
											</div>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Phone From') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($albumsUser->phone_from) ?>

												</div>
											</div>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Email From') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($albumsUser->email_from) ?>

												</div>
											</div>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Name Sold') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($albumsUser->name_sold) ?>

												</div>
											</div>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Address Sold') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($albumsUser->address_sold) ?>

												</div>
											</div>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Phone Sold') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($albumsUser->phone_sold) ?>

												</div>
											</div>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Email Sold') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($albumsUser->email_sold) ?>

												</div>
											</div>
											<div class="row"><!-- 3. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Custom Serial Number') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= $this->Number->format($albumsUser->custom_serial_number) ?><!-- 3.b -->
												</div>
											</div>
											<div class="row"><!-- 3. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Disk A Condition Id') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= $this->Number->format($albumsUser->disk_A_condition_id) ?><!-- 3.b -->
												</div>
											</div>
											<div class="row"><!-- 3. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Disk B Condition Id') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= $this->Number->format($albumsUser->disk_B_condition_id) ?><!-- 3.b -->
												</div>
											</div>
											<div class="row"><!-- 3. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Disk C Condition Id') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= $this->Number->format($albumsUser->disk_C_condition_id) ?><!-- 3.b -->
												</div>
											</div>
											<div class="row"><!-- 3. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Disk D Condition Id') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= $this->Number->format($albumsUser->disk_D_condition_id) ?><!-- 3.b -->
												</div>
											</div>
											<div class="row"><!-- 3. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Disk E Condition Id') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= $this->Number->format($albumsUser->disk_E_condition_id) ?><!-- 3.b -->
												</div>
											</div>
											<div class="row"><!-- 3. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Disk F Condition Id') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= $this->Number->format($albumsUser->disk_F_condition_id) ?><!-- 3.b -->
												</div>
											</div>
											<div class="row"><!-- 3. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Disk G Condition Id') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= $this->Number->format($albumsUser->disk_G_condition_id) ?><!-- 3.b -->
												</div>
											</div>
											<div class="row"><!-- 3. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Disk H Condition Id') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= $this->Number->format($albumsUser->disk_H_condition_id) ?><!-- 3.b -->
												</div>
											</div>
											<div class="row"><!-- 3. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Price From') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= $this->Number->format($albumsUser->price_from) ?><!-- 3.b -->
												</div>
											</div>
											<div class="row"><!-- 3. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Price Sold') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= $this->Number->format($albumsUser->price_sold) ?><!-- 3.b -->
												</div>
											</div>
											<div class="row"><!-- 4. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Last Play') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($albumsUser->last_play) ?>

												</div>
											</div>
											<div class="row"><!-- 4. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Last Used') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($albumsUser->last_used) ?>

												</div>
											</div>
											<div class="row"><!-- 5. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Generic') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= $albumsUser->generic ? '<i class="fa fa-check-square boolean-yes" aria-hidden="true"></i>' : '<i class="fa fa-square boolean-no" aria-hidden="false"></i>' ?>

												</div>
											</div>
<?php /*
											<div class="row"><!-- 6. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Comment') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= $this->Text->autoParagraph(h($albumsUser->comment)) ?>

												</div>
											</div>
*/ ?>
<?php if($config['show_counters']){ ?>
											<div class="row"><!-- counter helper -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Play Count') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= $this->Number->format($albumsUser->play_count) ?><!-- 3.b -->
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
															<?= $this->Text->autoParagraph($albumsUser->comment) ?>

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
<?php if (!empty($albumsUser->abbreviations)): ?>
											<button class="nav-link active" id="nav-abbreviations-tab" data-bs-toggle="tab" data-bs-target="#nav-abbreviations" type="button" role="tab" aria-controls="nav-abbreviations" aria-selected="true">
												<?= __('Abbreviations') ?>
											</button>
<?php endif ?>
										</div>
									</nav>
								</div>

							</div><!-- /card header -->
								
							<div class="card-body p-1 pb-0">

								<div class="tab-content" id="nav-tabContent">

<?php if (!empty($albumsUser->abbreviations)): ?>

									<div class="tab-pane fade show active p-0" id="nav-abbreviations" role="tabpanel" aria-labelledby="nav-abbreviations-tab" tabindex="0">

										<table class="table table-responsive-xl table-hover table-striped" style="">
											<thead class="thead-info">
												<tr>
<?php if($config['index_show_id']){ ?>
													<th class="number id"><?= __('Id') ?></th>
<?php } ?>
													<th class="string name"><?= __('Name') ?></th>
													<th class="please-change-type description"><?= __('Description') ?></th>
													<th class="please-change-type last-used"><?= __('Last Used') ?></th>
<?php if($config['index_show_pos']){ ?>
													<th class="number pos"><?= __('Pos') ?></th>
<?php } ?>
<?php if($config['index_show_visible']){ ?>
													<th class="boolean visible"><?= __('Visible') ?></th>
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
												<?php foreach ($albumsUser->abbreviations as $abbreviations) : ?>

												<tr>
<?php if($config['index_show_id']){ ?>
													<td class="number id" value="<?= $abbreviations->id ?>"><?= h($abbreviations->id) ?></td>
<?php } ?>
													<td class="string name" value="<?= $abbreviations->name ?>"><?= h($abbreviations->name) ?></td>
													<td class="please-change-type description" value="<?= $abbreviations->description ?>"><?= h($abbreviations->description) ?></td>
													<td class="please-change-type last-used" value="<?= $abbreviations->last_used ?>"><?= h($abbreviations->last_used) ?></td>
<?php if($config['index_show_pos']){ ?>
													<td class="number pos" value="<?= $abbreviations->pos ?>"><?= h($abbreviations->pos) ?></td>
<?php } ?>
<?php if($config['index_show_visible']){ ?>
													<td class="boolean visible" value="<?= $abbreviations->visible ?>"><?= h($abbreviations->visible) ?></td>
<?php } ?>
<?php if($config['index_show_created']){ ?>
													<td class="datetime created" value="<?= $abbreviations->created ?>"><?= h($abbreviations->created) ?></td>
<?php } ?>
<?php if($config['index_show_modified']){ ?>
													<td class="datetime modified" value="<?= $abbreviations->modified ?>"><?= h($abbreviations->modified) ?></td>
<?php } ?>
													<td class="actions">
														<?= $this->Html->link('<i class="fa fa-eye"></i>', ['controller' => 'Abbreviations', 'action' => 'view', $abbreviations->id], ["escape" => false, "role" => "button",  "class" => "btn btn-warning btn-sm", "data-toggle" => "tooltip", "data-placement" => "top", "title" => __('View this item'), "data-original-title" => ""]) ?><!-- view button -->
														<?= $this->Html->link('<i class="fa fa-edit"></i>', ['controller' => 'Abbreviations', 'action' => 'edit', $abbreviations->id], ["escape" => false, "role" => "button", "class" => "btn btn-primary btn-sm", "data-toggle" => "tooltip", "data-placement" => "top", "title" => __('Edit this item'), "data-original-title" => ""]) ?><!-- edit button -->
														<?= $this->Form->postLink('<i class="fa fa-times"></i>', ['controller' => 'Abbreviations', 'action' => 'delete', $abbreviations->id], ["escape" => false, "role" => "button", "class" => "btn btn-danger btn-sm", "data-toggle" =>"tooltip", "data-placement" => "top", "title" => __('Delete this item'), "data-original-title" => "", "confirm" => __("Are you sure you want to delete # {0}?", $abbreviations->id)]) ?><!-- delete button -->
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
