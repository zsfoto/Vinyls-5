<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Album $album
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
									<h3><i id="card-icon" class="fa fa-eye fa-spin"></i> <?= __('View') ?>: <?= __('Album') ?></h3>
									<?= __('The data marked with <span class="fw-bold text-danger">*</span> must be provided!') ?>
								</div>
								<div class="float-end ms-5">
									<?= $this->Html->link('<span class="btn btn-outline-secondary mt-1 me-1"><i class="fa fa-times"></i></span>',
										["controller" => "Albums", "action" => "index", "_full" => true],
										["escape" => false, "role" => "button"]
									) ?>
								</div>

								<div class="form-tab float-end">
									<ul class="nav nav-tabs mt-1" id="myTab" role="tablist">
										<li class="nav-item" role="presentation">
											<button class="nav-link active" id="tab-first" data-bs-toggle="tab" data-bs-target="#tabPanelMain" type="button" role="tab" aria-controls="tabPanelMain" aria-selected="true"><?= __('Basic data') ?></button>
										</li>

										<li class="nav-item" role="presentation">
											<button class="nav-link" id="tabNotes" data-bs-toggle="tab" data-bs-target="#tabPanelNotes" type="button" role="tab" aria-controls="tabPanelNotes" aria-selected="false"><?= __('Notes') ?></button>
										</li>
										<li class="nav-item" role="presentation">
											<button class="nav-link" id="tabJson" data-bs-toggle="tab" data-bs-target="#tabPanelJson" type="button" role="tab" aria-controls="tabPanelJson" aria-selected="false"><?= __('Json') ?></button>
										</li>

<?php /*
										<li class="nav-item" role="presentation">
											<button class="nav-link" id="tab-more" data-bs-toggle="tab" data-bs-target="#tab-panel-more" type="button" role="tab" aria-controls="tab-panel-more" aria-selected="false"><?= __('More') ?></button>
										</li>
*/ ?>

										<li class="nav-item dropdown">
											<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><?= __('Related tables') ?></a>
											<ul class="dropdown-menu">
<?php if (!empty($album->abbreviations)) : ?>
												<li><?= $this->Html->link(__('Abbreviations') . '...', ['controller' => 'Abbreviations', 'action' => 'index', 'parent', 'album', $album->id], ['class' => 'dropdown-item']) ?></li>
<?php endif ?>
<?php if (!empty($album->artists)) : ?>
												<li><?= $this->Html->link(__('Artists') . '...', ['controller' => 'Artists', 'action' => 'index', 'parent', 'album', $album->id], ['class' => 'dropdown-item']) ?></li>
<?php endif ?>
<?php if (!empty($album->companies)) : ?>
												<li><?= $this->Html->link(__('Companies') . '...', ['controller' => 'Companies', 'action' => 'index', 'parent', 'album', $album->id], ['class' => 'dropdown-item']) ?></li>
<?php endif ?>
<?php if (!empty($album->formats)) : ?>
												<li><?= $this->Html->link(__('Formats') . '...', ['controller' => 'Formats', 'action' => 'index', 'parent', 'album', $album->id], ['class' => 'dropdown-item']) ?></li>
<?php endif ?>
<?php if (!empty($album->genres)) : ?>
												<li><?= $this->Html->link(__('Genres') . '...', ['controller' => 'Genres', 'action' => 'index', 'parent', 'album', $album->id], ['class' => 'dropdown-item']) ?></li>
<?php endif ?>
<?php if (!empty($album->labels)) : ?>
												<li><?= $this->Html->link(__('Labels') . '...', ['controller' => 'Labels', 'action' => 'index', 'parent', 'album', $album->id], ['class' => 'dropdown-item']) ?></li>
<?php endif ?>
<?php if (!empty($album->languages)) : ?>
												<li><?= $this->Html->link(__('Languages') . '...', ['controller' => 'Languages', 'action' => 'index', 'parent', 'album', $album->id], ['class' => 'dropdown-item']) ?></li>
<?php endif ?>
<?php if (!empty($album->styles)) : ?>
												<li><?= $this->Html->link(__('Styles') . '...', ['controller' => 'Styles', 'action' => 'index', 'parent', 'album', $album->id], ['class' => 'dropdown-item']) ?></li>
<?php endif ?>
<?php if (!empty($album->users)) : ?>
												<li><?= $this->Html->link(__('Users') . '...', ['controller' => 'Users', 'action' => 'index', 'parent', 'album', $album->id], ['class' => 'dropdown-item']) ?></li>
<?php endif ?>
<?php if (!empty($album->albums_extraartists)) : ?>
												<li><?= $this->Html->link(__('Albums Extraartists') . '...', ['controller' => 'Albums Extraartists', 'action' => 'index', 'parent', 'album', $album->id], ['class' => 'dropdown-item']) ?></li>
<?php endif ?>
<?php if (!empty($album->identifiers)) : ?>
												<li><?= $this->Html->link(__('Identifiers') . '...', ['controller' => 'Identifiers', 'action' => 'index', 'parent', 'album', $album->id], ['class' => 'dropdown-item']) ?></li>
<?php endif ?>
<?php if (!empty($album->images)) : ?>
												<li><?= $this->Html->link(__('Images') . '...', ['controller' => 'Images', 'action' => 'index', 'parent', 'album', $album->id], ['class' => 'dropdown-item']) ?></li>
<?php endif ?>
<?php if (!empty($album->tracklists)) : ?>
												<li><?= $this->Html->link(__('Tracklists') . '...', ['controller' => 'Tracklists', 'action' => 'index', 'parent', 'album', $album->id], ['class' => 'dropdown-item']) ?></li>
<?php endif ?>
<?php if (!empty($album->videos)) : ?>
												<li><?= $this->Html->link(__('Videos') . '...', ['controller' => 'Videos', 'action' => 'index', 'parent', 'album', $album->id], ['class' => 'dropdown-item']) ?></li>
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
													<?= $album->id ?><!-- 0.a -->
												</div>
											</div>
<?php } ?>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Id') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($album->id) ?>

												</div>
											</div>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Ext Id') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($album->ext_id) ?>

												</div>
											</div>
											<div class="row"><!-- 1. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Country') ?>:</label>
												<div class="col-sm-10 p-1 link">
													<?= $album->hasValue('country') ? $this->Html->link($album->country->name, ['controller' => 'Countries', 'action' => 'view', $album->country->id]) : '' ?><span class="external-link-icon"><i class="fa fa-external-link" aria-hidden="true"></i></span>
												</div>
											</div>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Artists Sort') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($album->artists_sort) ?>

												</div>
											</div>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Name') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($album->name) ?>

												</div>
											</div>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Lowest Price') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($album->lowest_price) ?>

												</div>
											</div>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Laci Price') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($album->laci_price) ?>

												</div>
											</div>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Released Formatted') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($album->released_formatted) ?>

												</div>
											</div>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Estimated Weight') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($album->estimated_weight) ?>

												</div>
											</div>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Released') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($album->released) ?>

												</div>
											</div>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Url') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($album->url) ?>

												</div>
											</div>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Resource Url') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($album->resource_url) ?>

												</div>
											</div>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Master Url') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($album->master_url) ?>

												</div>
											</div>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Master Id') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($album->master_id) ?>

												</div>
											</div>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Url Src') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($album->url_src) ?>

												</div>
											</div>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Uri') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($album->uri) ?>

												</div>
											</div>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Thumb') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($album->thumb) ?>

												</div>
											</div>
											<div class="row"><!-- 3. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Year') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= $this->Number->format($album->year) ?><!-- 3.b -->
												</div>
											</div>
											<div class="row"><!-- 4. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Last Used') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($album->last_used) ?>

												</div>
											</div>
<?php /*
											<div class="row"><!-- 6. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Notes') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= $this->Text->autoParagraph(h($album->notes)) ?>

												</div>
											</div>
*/ ?>
<?php /*
											<div class="row"><!-- 6. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Json') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= $this->Text->autoParagraph(h($album->json)) ?>

												</div>
											</div>
*/ ?>
<?php if($config['show_counters']){ ?>
											<div class="row"><!-- counter helper -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('User Count') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= $this->Number->format($album->user_count) ?><!-- 3.b -->
												</div>
											</div>
<?php } ?>


										</div><!-- /.1.TAB -->
										
										<!-- TAB for: Notes text field -->
										<div class="tab-pane fade" id="tabPanelNotes" role="tabpanel" aria-labelledby="tabNotes" tabindex="0">
											<div class="row">
												<div class="col-sm-12">
													<div class="row">
														<div id="readMoreNotes" class="col-sm-12 p-2 text read-more">
															<?= $this->Text->autoParagraph($album->notes) ?>

														</div>
													</div>
												</div>
											</div>
										</div>
										<!-- /.TAB for: Notes text field-->
										
										<!-- TAB for: Json text field -->
										<div class="tab-pane fade" id="tabPanelJson" role="tabpanel" aria-labelledby="tabJson" tabindex="0">
											<div class="row">
												<div class="col-sm-12">
													<div class="row">
														<div id="readMoreJson" class="col-sm-12 p-2 text read-more">
															<?= $this->Text->autoParagraph($album->json) ?>

														</div>
													</div>
												</div>
											</div>
										</div>
										<!-- /.TAB for: Json text field-->
										

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
<?php if (!empty($album->abbreviations)): ?>
											<button class="nav-link active" id="nav-abbreviations-tab" data-bs-toggle="tab" data-bs-target="#nav-abbreviations" type="button" role="tab" aria-controls="nav-abbreviations" aria-selected="true">
												<?= __('Abbreviations') ?>
											</button>
<?php endif ?>
<?php if (!empty($album->artists)): ?>
											<button class="nav-link" id="nav-artists-tab" data-bs-toggle="tab" data-bs-target="#nav-artists" type="button" role="tab" aria-controls="nav-artists" aria-selected="true">
												<?= __('Artists') ?>
											</button>
<?php endif ?>
<?php if (!empty($album->companies)): ?>
											<button class="nav-link" id="nav-companies-tab" data-bs-toggle="tab" data-bs-target="#nav-companies" type="button" role="tab" aria-controls="nav-companies" aria-selected="true">
												<?= __('Companies') ?>
											</button>
<?php endif ?>
<?php if (!empty($album->formats)): ?>
											<button class="nav-link" id="nav-formats-tab" data-bs-toggle="tab" data-bs-target="#nav-formats" type="button" role="tab" aria-controls="nav-formats" aria-selected="true">
												<?= __('Formats') ?>
											</button>
<?php endif ?>
<?php if (!empty($album->genres)): ?>
											<button class="nav-link" id="nav-genres-tab" data-bs-toggle="tab" data-bs-target="#nav-genres" type="button" role="tab" aria-controls="nav-genres" aria-selected="true">
												<?= __('Genres') ?>
											</button>
<?php endif ?>
<?php if (!empty($album->labels)): ?>
											<button class="nav-link" id="nav-labels-tab" data-bs-toggle="tab" data-bs-target="#nav-labels" type="button" role="tab" aria-controls="nav-labels" aria-selected="true">
												<?= __('Labels') ?>
											</button>
<?php endif ?>
<?php if (!empty($album->languages)): ?>
											<button class="nav-link" id="nav-languages-tab" data-bs-toggle="tab" data-bs-target="#nav-languages" type="button" role="tab" aria-controls="nav-languages" aria-selected="true">
												<?= __('Languages') ?>
											</button>
<?php endif ?>
<?php if (!empty($album->styles)): ?>
											<button class="nav-link" id="nav-styles-tab" data-bs-toggle="tab" data-bs-target="#nav-styles" type="button" role="tab" aria-controls="nav-styles" aria-selected="true">
												<?= __('Styles') ?>
											</button>
<?php endif ?>
<?php if (!empty($album->users)): ?>
											<button class="nav-link" id="nav-users-tab" data-bs-toggle="tab" data-bs-target="#nav-users" type="button" role="tab" aria-controls="nav-users" aria-selected="true">
												<?= __('Users') ?>
											</button>
<?php endif ?>
<?php if (!empty($album->albums_extraartists)): ?>
											<button class="nav-link" id="nav-albums_extraartists-tab" data-bs-toggle="tab" data-bs-target="#nav-albums_extraartists" type="button" role="tab" aria-controls="nav-albums_extraartists" aria-selected="true">
												<?= __('Albums Extraartists') ?>
											</button>
<?php endif ?>
<?php if (!empty($album->identifiers)): ?>
											<button class="nav-link" id="nav-identifiers-tab" data-bs-toggle="tab" data-bs-target="#nav-identifiers" type="button" role="tab" aria-controls="nav-identifiers" aria-selected="true">
												<?= __('Identifiers') ?>
											</button>
<?php endif ?>
<?php if (!empty($album->images)): ?>
											<button class="nav-link" id="nav-images-tab" data-bs-toggle="tab" data-bs-target="#nav-images" type="button" role="tab" aria-controls="nav-images" aria-selected="true">
												<?= __('Images') ?>
											</button>
<?php endif ?>
<?php if (!empty($album->tracklists)): ?>
											<button class="nav-link" id="nav-tracklists-tab" data-bs-toggle="tab" data-bs-target="#nav-tracklists" type="button" role="tab" aria-controls="nav-tracklists" aria-selected="true">
												<?= __('Tracklists') ?>
											</button>
<?php endif ?>
<?php if (!empty($album->videos)): ?>
											<button class="nav-link" id="nav-videos-tab" data-bs-toggle="tab" data-bs-target="#nav-videos" type="button" role="tab" aria-controls="nav-videos" aria-selected="true">
												<?= __('Videos') ?>
											</button>
<?php endif ?>
										</div>
									</nav>
								</div>

							</div><!-- /card header -->
								
							<div class="card-body p-1 pb-0">

								<div class="tab-content" id="nav-tabContent">

<?php if (!empty($album->abbreviations)): ?>

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
												<?php foreach ($album->abbreviations as $abbreviations) : ?>

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
<?php if (!empty($album->artists)): ?>

									<div class="tab-pane fade p-0" id="nav-artists" role="tabpanel" aria-labelledby="nav-artists-tab" tabindex="0">

										<table class="table table-responsive-xl table-hover table-striped" style="">
											<thead class="thead-info">
												<tr>
<?php if($config['index_show_id']){ ?>
													<th class="number id"><?= __('Id') ?></th>
<?php } ?>
													<th class="string name"><?= __('Name') ?></th>
													<th class="please-change-type artistJoin"><?= __('ArtistJoin') ?></th>
													<th class="please-change-type anv"><?= __('Anv') ?></th>
													<th class="please-change-type tracks"><?= __('Tracks') ?></th>
													<th class="please-change-type resource-url"><?= __('Resource Url') ?></th>
													<th class="please-change-type resourceId"><?= __('ResourceId') ?></th>
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
												<?php foreach ($album->artists as $artists) : ?>

												<tr>
<?php if($config['index_show_id']){ ?>
													<td class="number id" value="<?= $artists->id ?>"><?= h($artists->id) ?></td>
<?php } ?>
													<td class="string name" value="<?= $artists->name ?>"><?= h($artists->name) ?></td>
													<td class="please-change-type artistJoin" value="<?= $artists->artistJoin ?>"><?= h($artists->artistJoin) ?></td>
													<td class="please-change-type anv" value="<?= $artists->anv ?>"><?= h($artists->anv) ?></td>
													<td class="please-change-type tracks" value="<?= $artists->tracks ?>"><?= h($artists->tracks) ?></td>
													<td class="please-change-type resource-url" value="<?= $artists->resource_url ?>"><?= h($artists->resource_url) ?></td>
													<td class="please-change-type resourceId" value="<?= $artists->resourceId ?>"><?= h($artists->resourceId) ?></td>
<?php if($config['index_show_pos']){ ?>
													<td class="number pos" value="<?= $artists->pos ?>"><?= h($artists->pos) ?></td>
<?php } ?>
<?php if($config['index_show_visible']){ ?>
													<td class="boolean visible" value="<?= $artists->visible ?>"><?= h($artists->visible) ?></td>
<?php } ?>
													<td class="please-change-type last-used" value="<?= $artists->last_used ?>"><?= h($artists->last_used) ?></td>
<?php if($config['index_show_created']){ ?>
													<td class="datetime created" value="<?= $artists->created ?>"><?= h($artists->created) ?></td>
<?php } ?>
<?php if($config['index_show_modified']){ ?>
													<td class="datetime modified" value="<?= $artists->modified ?>"><?= h($artists->modified) ?></td>
<?php } ?>
													<td class="actions">
														<?= $this->Html->link('<i class="fa fa-eye"></i>', ['controller' => 'Artists', 'action' => 'view', $artists->id], ["escape" => false, "role" => "button",  "class" => "btn btn-warning btn-sm", "data-toggle" => "tooltip", "data-placement" => "top", "title" => __('View this item'), "data-original-title" => ""]) ?><!-- view button -->
														<?= $this->Html->link('<i class="fa fa-edit"></i>', ['controller' => 'Artists', 'action' => 'edit', $artists->id], ["escape" => false, "role" => "button", "class" => "btn btn-primary btn-sm", "data-toggle" => "tooltip", "data-placement" => "top", "title" => __('Edit this item'), "data-original-title" => ""]) ?><!-- edit button -->
														<?= $this->Form->postLink('<i class="fa fa-times"></i>', ['controller' => 'Artists', 'action' => 'delete', $artists->id], ["escape" => false, "role" => "button", "class" => "btn btn-danger btn-sm", "data-toggle" =>"tooltip", "data-placement" => "top", "title" => __('Delete this item'), "data-original-title" => "", "confirm" => __("Are you sure you want to delete # {0}?", $artists->id)]) ?><!-- delete button -->
													</td>
												</tr>
												<?php endforeach ?>

											</tbody>
										</table>

									</div><!-- /tab pane -->
<?php endif ?>
<?php if (!empty($album->companies)): ?>

									<div class="tab-pane fade p-0" id="nav-companies" role="tabpanel" aria-labelledby="nav-companies-tab" tabindex="0">

										<table class="table table-responsive-xl table-hover table-striped" style="">
											<thead class="thead-info">
												<tr>
<?php if($config['index_show_id']){ ?>
													<th class="number id"><?= __('Id') ?></th>
<?php } ?>
													<th class="string name"><?= __('Name') ?></th>
													<th class="please-change-type entity-type"><?= __('Entity Type') ?></th>
													<th class="please-change-type catno"><?= __('Catno') ?></th>
													<th class="please-change-type resource-url"><?= __('Resource Url') ?></th>
													<th class="please-change-type ext-id"><?= __('Ext Id') ?></th>
													<th class="please-change-type entity-type-name"><?= __('Entity Type Name') ?></th>
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
												<?php foreach ($album->companies as $companies) : ?>

												<tr>
<?php if($config['index_show_id']){ ?>
													<td class="number id" value="<?= $companies->id ?>"><?= h($companies->id) ?></td>
<?php } ?>
													<td class="string name" value="<?= $companies->name ?>"><?= h($companies->name) ?></td>
													<td class="please-change-type entity-type" value="<?= $companies->entity_type ?>"><?= h($companies->entity_type) ?></td>
													<td class="please-change-type catno" value="<?= $companies->catno ?>"><?= h($companies->catno) ?></td>
													<td class="please-change-type resource-url" value="<?= $companies->resource_url ?>"><?= h($companies->resource_url) ?></td>
													<td class="please-change-type ext-id" value="<?= $companies->ext_id ?>"><?= h($companies->ext_id) ?></td>
													<td class="please-change-type entity-type-name" value="<?= $companies->entity_type_name ?>"><?= h($companies->entity_type_name) ?></td>
<?php if($config['index_show_pos']){ ?>
													<td class="number pos" value="<?= $companies->pos ?>"><?= h($companies->pos) ?></td>
<?php } ?>
<?php if($config['index_show_visible']){ ?>
													<td class="boolean visible" value="<?= $companies->visible ?>"><?= h($companies->visible) ?></td>
<?php } ?>
													<td class="please-change-type last-used" value="<?= $companies->last_used ?>"><?= h($companies->last_used) ?></td>
<?php if($config['index_show_created']){ ?>
													<td class="datetime created" value="<?= $companies->created ?>"><?= h($companies->created) ?></td>
<?php } ?>
<?php if($config['index_show_modified']){ ?>
													<td class="datetime modified" value="<?= $companies->modified ?>"><?= h($companies->modified) ?></td>
<?php } ?>
													<td class="actions">
														<?= $this->Html->link('<i class="fa fa-eye"></i>', ['controller' => 'Companies', 'action' => 'view', $companies->id], ["escape" => false, "role" => "button",  "class" => "btn btn-warning btn-sm", "data-toggle" => "tooltip", "data-placement" => "top", "title" => __('View this item'), "data-original-title" => ""]) ?><!-- view button -->
														<?= $this->Html->link('<i class="fa fa-edit"></i>', ['controller' => 'Companies', 'action' => 'edit', $companies->id], ["escape" => false, "role" => "button", "class" => "btn btn-primary btn-sm", "data-toggle" => "tooltip", "data-placement" => "top", "title" => __('Edit this item'), "data-original-title" => ""]) ?><!-- edit button -->
														<?= $this->Form->postLink('<i class="fa fa-times"></i>', ['controller' => 'Companies', 'action' => 'delete', $companies->id], ["escape" => false, "role" => "button", "class" => "btn btn-danger btn-sm", "data-toggle" =>"tooltip", "data-placement" => "top", "title" => __('Delete this item'), "data-original-title" => "", "confirm" => __("Are you sure you want to delete # {0}?", $companies->id)]) ?><!-- delete button -->
													</td>
												</tr>
												<?php endforeach ?>

											</tbody>
										</table>

									</div><!-- /tab pane -->
<?php endif ?>
<?php if (!empty($album->formats)): ?>

									<div class="tab-pane fade p-0" id="nav-formats" role="tabpanel" aria-labelledby="nav-formats-tab" tabindex="0">

										<table class="table table-responsive-xl table-hover table-striped" style="">
											<thead class="thead-info">
												<tr>
<?php if($config['index_show_id']){ ?>
													<th class="number id"><?= __('Id') ?></th>
<?php } ?>
													<th class="string name"><?= __('Name') ?></th>
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
												<?php foreach ($album->formats as $formats) : ?>

												<tr>
<?php if($config['index_show_id']){ ?>
													<td class="number id" value="<?= $formats->id ?>"><?= h($formats->id) ?></td>
<?php } ?>
													<td class="string name" value="<?= $formats->name ?>"><?= h($formats->name) ?></td>
<?php if($config['index_show_pos']){ ?>
													<td class="number pos" value="<?= $formats->pos ?>"><?= h($formats->pos) ?></td>
<?php } ?>
<?php if($config['index_show_visible']){ ?>
													<td class="boolean visible" value="<?= $formats->visible ?>"><?= h($formats->visible) ?></td>
<?php } ?>
													<td class="please-change-type last-used" value="<?= $formats->last_used ?>"><?= h($formats->last_used) ?></td>
<?php if($config['index_show_created']){ ?>
													<td class="datetime created" value="<?= $formats->created ?>"><?= h($formats->created) ?></td>
<?php } ?>
<?php if($config['index_show_modified']){ ?>
													<td class="datetime modified" value="<?= $formats->modified ?>"><?= h($formats->modified) ?></td>
<?php } ?>
													<td class="actions">
														<?= $this->Html->link('<i class="fa fa-eye"></i>', ['controller' => 'Formats', 'action' => 'view', $formats->id], ["escape" => false, "role" => "button",  "class" => "btn btn-warning btn-sm", "data-toggle" => "tooltip", "data-placement" => "top", "title" => __('View this item'), "data-original-title" => ""]) ?><!-- view button -->
														<?= $this->Html->link('<i class="fa fa-edit"></i>', ['controller' => 'Formats', 'action' => 'edit', $formats->id], ["escape" => false, "role" => "button", "class" => "btn btn-primary btn-sm", "data-toggle" => "tooltip", "data-placement" => "top", "title" => __('Edit this item'), "data-original-title" => ""]) ?><!-- edit button -->
														<?= $this->Form->postLink('<i class="fa fa-times"></i>', ['controller' => 'Formats', 'action' => 'delete', $formats->id], ["escape" => false, "role" => "button", "class" => "btn btn-danger btn-sm", "data-toggle" =>"tooltip", "data-placement" => "top", "title" => __('Delete this item'), "data-original-title" => "", "confirm" => __("Are you sure you want to delete # {0}?", $formats->id)]) ?><!-- delete button -->
													</td>
												</tr>
												<?php endforeach ?>

											</tbody>
										</table>

									</div><!-- /tab pane -->
<?php endif ?>
<?php if (!empty($album->genres)): ?>

									<div class="tab-pane fade p-0" id="nav-genres" role="tabpanel" aria-labelledby="nav-genres-tab" tabindex="0">

										<table class="table table-responsive-xl table-hover table-striped" style="">
											<thead class="thead-info">
												<tr>
<?php if($config['index_show_id']){ ?>
													<th class="number id"><?= __('Id') ?></th>
<?php } ?>
													<th class="string name"><?= __('Name') ?></th>
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
												<?php foreach ($album->genres as $genres) : ?>

												<tr>
<?php if($config['index_show_id']){ ?>
													<td class="number id" value="<?= $genres->id ?>"><?= h($genres->id) ?></td>
<?php } ?>
													<td class="string name" value="<?= $genres->name ?>"><?= h($genres->name) ?></td>
<?php if($config['index_show_pos']){ ?>
													<td class="number pos" value="<?= $genres->pos ?>"><?= h($genres->pos) ?></td>
<?php } ?>
<?php if($config['index_show_visible']){ ?>
													<td class="boolean visible" value="<?= $genres->visible ?>"><?= h($genres->visible) ?></td>
<?php } ?>
													<td class="please-change-type last-used" value="<?= $genres->last_used ?>"><?= h($genres->last_used) ?></td>
<?php if($config['index_show_created']){ ?>
													<td class="datetime created" value="<?= $genres->created ?>"><?= h($genres->created) ?></td>
<?php } ?>
<?php if($config['index_show_modified']){ ?>
													<td class="datetime modified" value="<?= $genres->modified ?>"><?= h($genres->modified) ?></td>
<?php } ?>
													<td class="actions">
														<?= $this->Html->link('<i class="fa fa-eye"></i>', ['controller' => 'Genres', 'action' => 'view', $genres->id], ["escape" => false, "role" => "button",  "class" => "btn btn-warning btn-sm", "data-toggle" => "tooltip", "data-placement" => "top", "title" => __('View this item'), "data-original-title" => ""]) ?><!-- view button -->
														<?= $this->Html->link('<i class="fa fa-edit"></i>', ['controller' => 'Genres', 'action' => 'edit', $genres->id], ["escape" => false, "role" => "button", "class" => "btn btn-primary btn-sm", "data-toggle" => "tooltip", "data-placement" => "top", "title" => __('Edit this item'), "data-original-title" => ""]) ?><!-- edit button -->
														<?= $this->Form->postLink('<i class="fa fa-times"></i>', ['controller' => 'Genres', 'action' => 'delete', $genres->id], ["escape" => false, "role" => "button", "class" => "btn btn-danger btn-sm", "data-toggle" =>"tooltip", "data-placement" => "top", "title" => __('Delete this item'), "data-original-title" => "", "confirm" => __("Are you sure you want to delete # {0}?", $genres->id)]) ?><!-- delete button -->
													</td>
												</tr>
												<?php endforeach ?>

											</tbody>
										</table>

									</div><!-- /tab pane -->
<?php endif ?>
<?php if (!empty($album->labels)): ?>

									<div class="tab-pane fade p-0" id="nav-labels" role="tabpanel" aria-labelledby="nav-labels-tab" tabindex="0">

										<table class="table table-responsive-xl table-hover table-striped" style="">
											<thead class="thead-info">
												<tr>
<?php if($config['index_show_id']){ ?>
													<th class="number id"><?= __('Id') ?></th>
<?php } ?>
													<th class="string name"><?= __('Name') ?></th>
													<th class="please-change-type entity-type"><?= __('Entity Type') ?></th>
													<th class="please-change-type catno"><?= __('Catno') ?></th>
													<th class="please-change-type resource-url"><?= __('Resource Url') ?></th>
													<th class="please-change-type ext-id"><?= __('Ext Id') ?></th>
													<th class="please-change-type entity-type-name"><?= __('Entity Type Name') ?></th>
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
												<?php foreach ($album->labels as $labels) : ?>

												<tr>
<?php if($config['index_show_id']){ ?>
													<td class="number id" value="<?= $labels->id ?>"><?= h($labels->id) ?></td>
<?php } ?>
													<td class="string name" value="<?= $labels->name ?>"><?= h($labels->name) ?></td>
													<td class="please-change-type entity-type" value="<?= $labels->entity_type ?>"><?= h($labels->entity_type) ?></td>
													<td class="please-change-type catno" value="<?= $labels->catno ?>"><?= h($labels->catno) ?></td>
													<td class="please-change-type resource-url" value="<?= $labels->resource_url ?>"><?= h($labels->resource_url) ?></td>
													<td class="please-change-type ext-id" value="<?= $labels->ext_id ?>"><?= h($labels->ext_id) ?></td>
													<td class="please-change-type entity-type-name" value="<?= $labels->entity_type_name ?>"><?= h($labels->entity_type_name) ?></td>
<?php if($config['index_show_pos']){ ?>
													<td class="number pos" value="<?= $labels->pos ?>"><?= h($labels->pos) ?></td>
<?php } ?>
<?php if($config['index_show_visible']){ ?>
													<td class="boolean visible" value="<?= $labels->visible ?>"><?= h($labels->visible) ?></td>
<?php } ?>
													<td class="please-change-type last-used" value="<?= $labels->last_used ?>"><?= h($labels->last_used) ?></td>
													<td class="please-change-type json" value="<?= $labels->json ?>"><?= h($labels->json) ?></td>
<?php if($config['index_show_created']){ ?>
													<td class="datetime created" value="<?= $labels->created ?>"><?= h($labels->created) ?></td>
<?php } ?>
<?php if($config['index_show_modified']){ ?>
													<td class="datetime modified" value="<?= $labels->modified ?>"><?= h($labels->modified) ?></td>
<?php } ?>
													<td class="actions">
														<?= $this->Html->link('<i class="fa fa-eye"></i>', ['controller' => 'Labels', 'action' => 'view', $labels->id], ["escape" => false, "role" => "button",  "class" => "btn btn-warning btn-sm", "data-toggle" => "tooltip", "data-placement" => "top", "title" => __('View this item'), "data-original-title" => ""]) ?><!-- view button -->
														<?= $this->Html->link('<i class="fa fa-edit"></i>', ['controller' => 'Labels', 'action' => 'edit', $labels->id], ["escape" => false, "role" => "button", "class" => "btn btn-primary btn-sm", "data-toggle" => "tooltip", "data-placement" => "top", "title" => __('Edit this item'), "data-original-title" => ""]) ?><!-- edit button -->
														<?= $this->Form->postLink('<i class="fa fa-times"></i>', ['controller' => 'Labels', 'action' => 'delete', $labels->id], ["escape" => false, "role" => "button", "class" => "btn btn-danger btn-sm", "data-toggle" =>"tooltip", "data-placement" => "top", "title" => __('Delete this item'), "data-original-title" => "", "confirm" => __("Are you sure you want to delete # {0}?", $labels->id)]) ?><!-- delete button -->
													</td>
												</tr>
												<?php endforeach ?>

											</tbody>
										</table>

									</div><!-- /tab pane -->
<?php endif ?>
<?php if (!empty($album->languages)): ?>

									<div class="tab-pane fade p-0" id="nav-languages" role="tabpanel" aria-labelledby="nav-languages-tab" tabindex="0">

										<table class="table table-responsive-xl table-hover table-striped" style="">
											<thead class="thead-info">
												<tr>
<?php if($config['index_show_id']){ ?>
													<th class="number id"><?= __('Id') ?></th>
<?php } ?>
													<th class="string name"><?= __('Name') ?></th>
													<th class="please-change-type short-name"><?= __('Short Name') ?></th>
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
												<?php foreach ($album->languages as $languages) : ?>

												<tr>
<?php if($config['index_show_id']){ ?>
													<td class="number id" value="<?= $languages->id ?>"><?= h($languages->id) ?></td>
<?php } ?>
													<td class="string name" value="<?= $languages->name ?>"><?= h($languages->name) ?></td>
													<td class="please-change-type short-name" value="<?= $languages->short_name ?>"><?= h($languages->short_name) ?></td>
<?php if($config['index_show_pos']){ ?>
													<td class="number pos" value="<?= $languages->pos ?>"><?= h($languages->pos) ?></td>
<?php } ?>
<?php if($config['index_show_visible']){ ?>
													<td class="boolean visible" value="<?= $languages->visible ?>"><?= h($languages->visible) ?></td>
<?php } ?>
													<td class="please-change-type last-used" value="<?= $languages->last_used ?>"><?= h($languages->last_used) ?></td>
<?php if($config['index_show_created']){ ?>
													<td class="datetime created" value="<?= $languages->created ?>"><?= h($languages->created) ?></td>
<?php } ?>
<?php if($config['index_show_modified']){ ?>
													<td class="datetime modified" value="<?= $languages->modified ?>"><?= h($languages->modified) ?></td>
<?php } ?>
													<td class="actions">
														<?= $this->Html->link('<i class="fa fa-eye"></i>', ['controller' => 'Languages', 'action' => 'view', $languages->id], ["escape" => false, "role" => "button",  "class" => "btn btn-warning btn-sm", "data-toggle" => "tooltip", "data-placement" => "top", "title" => __('View this item'), "data-original-title" => ""]) ?><!-- view button -->
														<?= $this->Html->link('<i class="fa fa-edit"></i>', ['controller' => 'Languages', 'action' => 'edit', $languages->id], ["escape" => false, "role" => "button", "class" => "btn btn-primary btn-sm", "data-toggle" => "tooltip", "data-placement" => "top", "title" => __('Edit this item'), "data-original-title" => ""]) ?><!-- edit button -->
														<?= $this->Form->postLink('<i class="fa fa-times"></i>', ['controller' => 'Languages', 'action' => 'delete', $languages->id], ["escape" => false, "role" => "button", "class" => "btn btn-danger btn-sm", "data-toggle" =>"tooltip", "data-placement" => "top", "title" => __('Delete this item'), "data-original-title" => "", "confirm" => __("Are you sure you want to delete # {0}?", $languages->id)]) ?><!-- delete button -->
													</td>
												</tr>
												<?php endforeach ?>

											</tbody>
										</table>

									</div><!-- /tab pane -->
<?php endif ?>
<?php if (!empty($album->styles)): ?>

									<div class="tab-pane fade p-0" id="nav-styles" role="tabpanel" aria-labelledby="nav-styles-tab" tabindex="0">

										<table class="table table-responsive-xl table-hover table-striped" style="">
											<thead class="thead-info">
												<tr>
<?php if($config['index_show_id']){ ?>
													<th class="number id"><?= __('Id') ?></th>
<?php } ?>
													<th class="string name"><?= __('Name') ?></th>
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
												<?php foreach ($album->styles as $styles) : ?>

												<tr>
<?php if($config['index_show_id']){ ?>
													<td class="number id" value="<?= $styles->id ?>"><?= h($styles->id) ?></td>
<?php } ?>
													<td class="string name" value="<?= $styles->name ?>"><?= h($styles->name) ?></td>
<?php if($config['index_show_pos']){ ?>
													<td class="number pos" value="<?= $styles->pos ?>"><?= h($styles->pos) ?></td>
<?php } ?>
<?php if($config['index_show_visible']){ ?>
													<td class="boolean visible" value="<?= $styles->visible ?>"><?= h($styles->visible) ?></td>
<?php } ?>
													<td class="please-change-type last-used" value="<?= $styles->last_used ?>"><?= h($styles->last_used) ?></td>
<?php if($config['index_show_created']){ ?>
													<td class="datetime created" value="<?= $styles->created ?>"><?= h($styles->created) ?></td>
<?php } ?>
<?php if($config['index_show_modified']){ ?>
													<td class="datetime modified" value="<?= $styles->modified ?>"><?= h($styles->modified) ?></td>
<?php } ?>
													<td class="actions">
														<?= $this->Html->link('<i class="fa fa-eye"></i>', ['controller' => 'Styles', 'action' => 'view', $styles->id], ["escape" => false, "role" => "button",  "class" => "btn btn-warning btn-sm", "data-toggle" => "tooltip", "data-placement" => "top", "title" => __('View this item'), "data-original-title" => ""]) ?><!-- view button -->
														<?= $this->Html->link('<i class="fa fa-edit"></i>', ['controller' => 'Styles', 'action' => 'edit', $styles->id], ["escape" => false, "role" => "button", "class" => "btn btn-primary btn-sm", "data-toggle" => "tooltip", "data-placement" => "top", "title" => __('Edit this item'), "data-original-title" => ""]) ?><!-- edit button -->
														<?= $this->Form->postLink('<i class="fa fa-times"></i>', ['controller' => 'Styles', 'action' => 'delete', $styles->id], ["escape" => false, "role" => "button", "class" => "btn btn-danger btn-sm", "data-toggle" =>"tooltip", "data-placement" => "top", "title" => __('Delete this item'), "data-original-title" => "", "confirm" => __("Are you sure you want to delete # {0}?", $styles->id)]) ?><!-- delete button -->
													</td>
												</tr>
												<?php endforeach ?>

											</tbody>
										</table>

									</div><!-- /tab pane -->
<?php endif ?>
<?php if (!empty($album->users)): ?>

									<div class="tab-pane fade p-0" id="nav-users" role="tabpanel" aria-labelledby="nav-users-tab" tabindex="0">

										<table class="table table-responsive-xl table-hover table-striped" style="">
											<thead class="thead-info">
												<tr>
<?php if($config['index_show_id']){ ?>
													<th class="number id"><?= __('Id') ?></th>
<?php } ?>
													<th class="please-change-type usergroup-id"><?= __('Usergroup Id') ?></th>
													<th class="string name"><?= __('Name') ?></th>
													<th class="please-change-type email"><?= __('Email') ?></th>
													<th class="please-change-type password"><?= __('Password') ?></th>
													<th class="please-change-type comment"><?= __('Comment') ?></th>
													<th class="please-change-type enabled"><?= __('Enabled') ?></th>
<?php if($config['index_show_visible']){ ?>
													<th class="boolean visible"><?= __('Visible') ?></th>
<?php } ?>
<?php if($config['index_show_pos']){ ?>
													<th class="number pos"><?= __('Pos') ?></th>
<?php } ?>
													<th class="please-change-type token"><?= __('Token') ?></th>
													<th class="please-change-type token-expire"><?= __('Token Expire') ?></th>
<?php if($config['index_show_counters']){ ?>
													<th class="number album-count"><?= __('Album Count') ?></th>
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
												<?php foreach ($album->users as $users) : ?>

												<tr>
<?php if($config['index_show_id']){ ?>
													<td class="number id" value="<?= $users->id ?>"><?= h($users->id) ?></td>
<?php } ?>
													<td class="please-change-type usergroup-id" value="<?= $users->usergroup_id ?>"><?= h($users->usergroup_id) ?></td>
													<td class="string name" value="<?= $users->name ?>"><?= h($users->name) ?></td>
													<td class="please-change-type email" value="<?= $users->email ?>"><?= h($users->email) ?></td>
													<td class="please-change-type password" value="<?= $users->password ?>"><?= h($users->password) ?></td>
													<td class="please-change-type comment" value="<?= $users->comment ?>"><?= h($users->comment) ?></td>
													<td class="please-change-type enabled" value="<?= $users->enabled ?>"><?= h($users->enabled) ?></td>
<?php if($config['index_show_visible']){ ?>
													<td class="boolean visible" value="<?= $users->visible ?>"><?= h($users->visible) ?></td>
<?php } ?>
<?php if($config['index_show_pos']){ ?>
													<td class="number pos" value="<?= $users->pos ?>"><?= h($users->pos) ?></td>
<?php } ?>
													<td class="please-change-type token" value="<?= $users->token ?>"><?= h($users->token) ?></td>
													<td class="please-change-type token-expire" value="<?= $users->token_expire ?>"><?= h($users->token_expire) ?></td>
<?php if($config['index_show_counters']){ ?>
													<td class="number album-count" value="<?= $users->album_count ?>"><?= h($users->album_count) ?></td>
<?php } ?>
<?php if($config['index_show_created']){ ?>
													<td class="datetime created" value="<?= $users->created ?>"><?= h($users->created) ?></td>
<?php } ?>
<?php if($config['index_show_modified']){ ?>
													<td class="datetime modified" value="<?= $users->modified ?>"><?= h($users->modified) ?></td>
<?php } ?>
													<td class="actions">
														<?= $this->Html->link('<i class="fa fa-eye"></i>', ['controller' => 'Users', 'action' => 'view', $users->id], ["escape" => false, "role" => "button",  "class" => "btn btn-warning btn-sm", "data-toggle" => "tooltip", "data-placement" => "top", "title" => __('View this item'), "data-original-title" => ""]) ?><!-- view button -->
														<?= $this->Html->link('<i class="fa fa-edit"></i>', ['controller' => 'Users', 'action' => 'edit', $users->id], ["escape" => false, "role" => "button", "class" => "btn btn-primary btn-sm", "data-toggle" => "tooltip", "data-placement" => "top", "title" => __('Edit this item'), "data-original-title" => ""]) ?><!-- edit button -->
														<?= $this->Form->postLink('<i class="fa fa-times"></i>', ['controller' => 'Users', 'action' => 'delete', $users->id], ["escape" => false, "role" => "button", "class" => "btn btn-danger btn-sm", "data-toggle" =>"tooltip", "data-placement" => "top", "title" => __('Delete this item'), "data-original-title" => "", "confirm" => __("Are you sure you want to delete # {0}?", $users->id)]) ?><!-- delete button -->
													</td>
												</tr>
												<?php endforeach ?>

											</tbody>
										</table>

									</div><!-- /tab pane -->
<?php endif ?>
<?php if (!empty($album->albums_extraartists)): ?>

									<div class="tab-pane fade p-0" id="nav-albums_extraartists" role="tabpanel" aria-labelledby="nav-albums_extraartists-tab" tabindex="0">

										<table class="table table-responsive-xl table-hover table-striped" style="">
											<thead class="thead-info">
												<tr>
<?php if($config['index_show_id']){ ?>
													<th class="number id"><?= __('Id') ?></th>
<?php } ?>
													<th class="please-change-type album-id"><?= __('Album Id') ?></th>
													<th class="please-change-type extraartist-id"><?= __('Extraartist Id') ?></th>
													<th class="please-change-type role"><?= __('Role') ?></th>
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
												<?php foreach ($album->albums_extraartists as $albumsExtraartists) : ?>

												<tr>
<?php if($config['index_show_id']){ ?>
													<td class="number id" value="<?= $albumsExtraartists->id ?>"><?= h($albumsExtraartists->id) ?></td>
<?php } ?>
													<td class="please-change-type album-id" value="<?= $albumsExtraartists->album_id ?>"><?= h($albumsExtraartists->album_id) ?></td>
													<td class="please-change-type extraartist-id" value="<?= $albumsExtraartists->extraartist_id ?>"><?= h($albumsExtraartists->extraartist_id) ?></td>
													<td class="please-change-type role" value="<?= $albumsExtraartists->role ?>"><?= h($albumsExtraartists->role) ?></td>
<?php if($config['index_show_pos']){ ?>
													<td class="number pos" value="<?= $albumsExtraartists->pos ?>"><?= h($albumsExtraartists->pos) ?></td>
<?php } ?>
<?php if($config['index_show_visible']){ ?>
													<td class="boolean visible" value="<?= $albumsExtraartists->visible ?>"><?= h($albumsExtraartists->visible) ?></td>
<?php } ?>
													<td class="please-change-type last-used" value="<?= $albumsExtraartists->last_used ?>"><?= h($albumsExtraartists->last_used) ?></td>
<?php if($config['index_show_created']){ ?>
													<td class="datetime created" value="<?= $albumsExtraartists->created ?>"><?= h($albumsExtraartists->created) ?></td>
<?php } ?>
<?php if($config['index_show_modified']){ ?>
													<td class="datetime modified" value="<?= $albumsExtraartists->modified ?>"><?= h($albumsExtraartists->modified) ?></td>
<?php } ?>
													<td class="actions">
														<?= $this->Html->link('<i class="fa fa-eye"></i>', ['controller' => 'AlbumsExtraartists', 'action' => 'view', $albumsExtraartists->id], ["escape" => false, "role" => "button",  "class" => "btn btn-warning btn-sm", "data-toggle" => "tooltip", "data-placement" => "top", "title" => __('View this item'), "data-original-title" => ""]) ?><!-- view button -->
														<?= $this->Html->link('<i class="fa fa-edit"></i>', ['controller' => 'AlbumsExtraartists', 'action' => 'edit', $albumsExtraartists->id], ["escape" => false, "role" => "button", "class" => "btn btn-primary btn-sm", "data-toggle" => "tooltip", "data-placement" => "top", "title" => __('Edit this item'), "data-original-title" => ""]) ?><!-- edit button -->
														<?= $this->Form->postLink('<i class="fa fa-times"></i>', ['controller' => 'AlbumsExtraartists', 'action' => 'delete', $albumsExtraartists->id], ["escape" => false, "role" => "button", "class" => "btn btn-danger btn-sm", "data-toggle" =>"tooltip", "data-placement" => "top", "title" => __('Delete this item'), "data-original-title" => "", "confirm" => __("Are you sure you want to delete # {0}?", $albumsExtraartists->id)]) ?><!-- delete button -->
													</td>
												</tr>
												<?php endforeach ?>

											</tbody>
										</table>

									</div><!-- /tab pane -->
<?php endif ?>
<?php if (!empty($album->identifiers)): ?>

									<div class="tab-pane fade p-0" id="nav-identifiers" role="tabpanel" aria-labelledby="nav-identifiers-tab" tabindex="0">

										<table class="table table-responsive-xl table-hover table-striped" style="">
											<thead class="thead-info">
												<tr>
<?php if($config['index_show_id']){ ?>
													<th class="number id"><?= __('Id') ?></th>
<?php } ?>
													<th class="please-change-type album-id"><?= __('Album Id') ?></th>
													<th class="please-change-type type"><?= __('Type') ?></th>
													<th class="please-change-type description"><?= __('Description') ?></th>
													<th class="please-change-type value"><?= __('Value') ?></th>
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
												<?php foreach ($album->identifiers as $identifiers) : ?>

												<tr>
<?php if($config['index_show_id']){ ?>
													<td class="number id" value="<?= $identifiers->id ?>"><?= h($identifiers->id) ?></td>
<?php } ?>
													<td class="please-change-type album-id" value="<?= $identifiers->album_id ?>"><?= h($identifiers->album_id) ?></td>
													<td class="please-change-type type" value="<?= $identifiers->type ?>"><?= h($identifiers->type) ?></td>
													<td class="please-change-type description" value="<?= $identifiers->description ?>"><?= h($identifiers->description) ?></td>
													<td class="please-change-type value" value="<?= $identifiers->value ?>"><?= h($identifiers->value) ?></td>
<?php if($config['index_show_pos']){ ?>
													<td class="number pos" value="<?= $identifiers->pos ?>"><?= h($identifiers->pos) ?></td>
<?php } ?>
<?php if($config['index_show_visible']){ ?>
													<td class="boolean visible" value="<?= $identifiers->visible ?>"><?= h($identifiers->visible) ?></td>
<?php } ?>
													<td class="please-change-type last-used" value="<?= $identifiers->last_used ?>"><?= h($identifiers->last_used) ?></td>
<?php if($config['index_show_created']){ ?>
													<td class="datetime created" value="<?= $identifiers->created ?>"><?= h($identifiers->created) ?></td>
<?php } ?>
<?php if($config['index_show_modified']){ ?>
													<td class="datetime modified" value="<?= $identifiers->modified ?>"><?= h($identifiers->modified) ?></td>
<?php } ?>
													<td class="actions">
														<?= $this->Html->link('<i class="fa fa-eye"></i>', ['controller' => 'Identifiers', 'action' => 'view', $identifiers->id], ["escape" => false, "role" => "button",  "class" => "btn btn-warning btn-sm", "data-toggle" => "tooltip", "data-placement" => "top", "title" => __('View this item'), "data-original-title" => ""]) ?><!-- view button -->
														<?= $this->Html->link('<i class="fa fa-edit"></i>', ['controller' => 'Identifiers', 'action' => 'edit', $identifiers->id], ["escape" => false, "role" => "button", "class" => "btn btn-primary btn-sm", "data-toggle" => "tooltip", "data-placement" => "top", "title" => __('Edit this item'), "data-original-title" => ""]) ?><!-- edit button -->
														<?= $this->Form->postLink('<i class="fa fa-times"></i>', ['controller' => 'Identifiers', 'action' => 'delete', $identifiers->id], ["escape" => false, "role" => "button", "class" => "btn btn-danger btn-sm", "data-toggle" =>"tooltip", "data-placement" => "top", "title" => __('Delete this item'), "data-original-title" => "", "confirm" => __("Are you sure you want to delete # {0}?", $identifiers->id)]) ?><!-- delete button -->
													</td>
												</tr>
												<?php endforeach ?>

											</tbody>
										</table>

									</div><!-- /tab pane -->
<?php endif ?>
<?php if (!empty($album->images)): ?>

									<div class="tab-pane fade p-0" id="nav-images" role="tabpanel" aria-labelledby="nav-images-tab" tabindex="0">

										<table class="table table-responsive-xl table-hover table-striped" style="">
											<thead class="thead-info">
												<tr>
<?php if($config['index_show_id']){ ?>
													<th class="number id"><?= __('Id') ?></th>
<?php } ?>
													<th class="please-change-type album-id"><?= __('Album Id') ?></th>
													<th class="string name"><?= __('Name') ?></th>
													<th class="please-change-type url"><?= __('Url') ?></th>
													<th class="please-change-type width"><?= __('Width') ?></th>
													<th class="please-change-type height"><?= __('Height') ?></th>
													<th class="please-change-type resource-url"><?= __('Resource Url') ?></th>
													<th class="please-change-type type"><?= __('Type') ?></th>
													<th class="please-change-type uri150"><?= __('Uri150') ?></th>
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
												<?php foreach ($album->images as $images) : ?>

												<tr>
<?php if($config['index_show_id']){ ?>
													<td class="number id" value="<?= $images->id ?>"><?= h($images->id) ?></td>
<?php } ?>
													<td class="please-change-type album-id" value="<?= $images->album_id ?>"><?= h($images->album_id) ?></td>
													<td class="string name" value="<?= $images->name ?>"><?= h($images->name) ?></td>
													<td class="please-change-type url" value="<?= $images->url ?>"><?= h($images->url) ?></td>
													<td class="please-change-type width" value="<?= $images->width ?>"><?= h($images->width) ?></td>
													<td class="please-change-type height" value="<?= $images->height ?>"><?= h($images->height) ?></td>
													<td class="please-change-type resource-url" value="<?= $images->resource_url ?>"><?= h($images->resource_url) ?></td>
													<td class="please-change-type type" value="<?= $images->type ?>"><?= h($images->type) ?></td>
													<td class="please-change-type uri150" value="<?= $images->uri150 ?>"><?= h($images->uri150) ?></td>
<?php if($config['index_show_pos']){ ?>
													<td class="number pos" value="<?= $images->pos ?>"><?= h($images->pos) ?></td>
<?php } ?>
<?php if($config['index_show_visible']){ ?>
													<td class="boolean visible" value="<?= $images->visible ?>"><?= h($images->visible) ?></td>
<?php } ?>
													<td class="please-change-type last-used" value="<?= $images->last_used ?>"><?= h($images->last_used) ?></td>
<?php if($config['index_show_created']){ ?>
													<td class="datetime created" value="<?= $images->created ?>"><?= h($images->created) ?></td>
<?php } ?>
<?php if($config['index_show_modified']){ ?>
													<td class="datetime modified" value="<?= $images->modified ?>"><?= h($images->modified) ?></td>
<?php } ?>
													<td class="actions">
														<?= $this->Html->link('<i class="fa fa-eye"></i>', ['controller' => 'Images', 'action' => 'view', $images->id], ["escape" => false, "role" => "button",  "class" => "btn btn-warning btn-sm", "data-toggle" => "tooltip", "data-placement" => "top", "title" => __('View this item'), "data-original-title" => ""]) ?><!-- view button -->
														<?= $this->Html->link('<i class="fa fa-edit"></i>', ['controller' => 'Images', 'action' => 'edit', $images->id], ["escape" => false, "role" => "button", "class" => "btn btn-primary btn-sm", "data-toggle" => "tooltip", "data-placement" => "top", "title" => __('Edit this item'), "data-original-title" => ""]) ?><!-- edit button -->
														<?= $this->Form->postLink('<i class="fa fa-times"></i>', ['controller' => 'Images', 'action' => 'delete', $images->id], ["escape" => false, "role" => "button", "class" => "btn btn-danger btn-sm", "data-toggle" =>"tooltip", "data-placement" => "top", "title" => __('Delete this item'), "data-original-title" => "", "confirm" => __("Are you sure you want to delete # {0}?", $images->id)]) ?><!-- delete button -->
													</td>
												</tr>
												<?php endforeach ?>

											</tbody>
										</table>

									</div><!-- /tab pane -->
<?php endif ?>
<?php if (!empty($album->tracklists)): ?>

									<div class="tab-pane fade p-0" id="nav-tracklists" role="tabpanel" aria-labelledby="nav-tracklists-tab" tabindex="0">

										<table class="table table-responsive-xl table-hover table-striped" style="">
											<thead class="thead-info">
												<tr>
<?php if($config['index_show_id']){ ?>
													<th class="number id"><?= __('Id') ?></th>
<?php } ?>
													<th class="please-change-type album-id"><?= __('Album Id') ?></th>
													<th class="please-change-type condition-id"><?= __('Condition Id') ?></th>
													<th class="string title"><?= __('Title') ?></th>
													<th class="please-change-type position"><?= __('Position') ?></th>
													<th class="please-change-type duration"><?= __('Duration') ?></th>
													<th class="please-change-type type"><?= __('Type') ?></th>
													<th class="please-change-type lyrics"><?= __('Lyrics') ?></th>
													<th class="please-change-type lyrics-checked-user-id"><?= __('Lyrics Checked User Id') ?></th>
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
												<?php foreach ($album->tracklists as $tracklists) : ?>

												<tr>
<?php if($config['index_show_id']){ ?>
													<td class="number id" value="<?= $tracklists->id ?>"><?= h($tracklists->id) ?></td>
<?php } ?>
													<td class="please-change-type album-id" value="<?= $tracklists->album_id ?>"><?= h($tracklists->album_id) ?></td>
													<td class="please-change-type condition-id" value="<?= $tracklists->condition_id ?>"><?= h($tracklists->condition_id) ?></td>
													<td class="string title" value="<?= $tracklists->title ?>"><?= h($tracklists->title) ?></td>
													<td class="please-change-type position" value="<?= $tracklists->position ?>"><?= h($tracklists->position) ?></td>
													<td class="please-change-type duration" value="<?= $tracklists->duration ?>"><?= h($tracklists->duration) ?></td>
													<td class="please-change-type type" value="<?= $tracklists->type ?>"><?= h($tracklists->type) ?></td>
													<td class="please-change-type lyrics" value="<?= $tracklists->lyrics ?>"><?= h($tracklists->lyrics) ?></td>
													<td class="please-change-type lyrics-checked-user-id" value="<?= $tracklists->lyrics_checked_user_id ?>"><?= h($tracklists->lyrics_checked_user_id) ?></td>
<?php if($config['index_show_pos']){ ?>
													<td class="number pos" value="<?= $tracklists->pos ?>"><?= h($tracklists->pos) ?></td>
<?php } ?>
<?php if($config['index_show_visible']){ ?>
													<td class="boolean visible" value="<?= $tracklists->visible ?>"><?= h($tracklists->visible) ?></td>
<?php } ?>
													<td class="please-change-type last-used" value="<?= $tracklists->last_used ?>"><?= h($tracklists->last_used) ?></td>
<?php if($config['index_show_created']){ ?>
													<td class="datetime created" value="<?= $tracklists->created ?>"><?= h($tracklists->created) ?></td>
<?php } ?>
<?php if($config['index_show_modified']){ ?>
													<td class="datetime modified" value="<?= $tracklists->modified ?>"><?= h($tracklists->modified) ?></td>
<?php } ?>
													<td class="actions">
														<?= $this->Html->link('<i class="fa fa-eye"></i>', ['controller' => 'Tracklists', 'action' => 'view', $tracklists->id], ["escape" => false, "role" => "button",  "class" => "btn btn-warning btn-sm", "data-toggle" => "tooltip", "data-placement" => "top", "title" => __('View this item'), "data-original-title" => ""]) ?><!-- view button -->
														<?= $this->Html->link('<i class="fa fa-edit"></i>', ['controller' => 'Tracklists', 'action' => 'edit', $tracklists->id], ["escape" => false, "role" => "button", "class" => "btn btn-primary btn-sm", "data-toggle" => "tooltip", "data-placement" => "top", "title" => __('Edit this item'), "data-original-title" => ""]) ?><!-- edit button -->
														<?= $this->Form->postLink('<i class="fa fa-times"></i>', ['controller' => 'Tracklists', 'action' => 'delete', $tracklists->id], ["escape" => false, "role" => "button", "class" => "btn btn-danger btn-sm", "data-toggle" =>"tooltip", "data-placement" => "top", "title" => __('Delete this item'), "data-original-title" => "", "confirm" => __("Are you sure you want to delete # {0}?", $tracklists->id)]) ?><!-- delete button -->
													</td>
												</tr>
												<?php endforeach ?>

											</tbody>
										</table>

									</div><!-- /tab pane -->
<?php endif ?>
<?php if (!empty($album->videos)): ?>

									<div class="tab-pane fade p-0" id="nav-videos" role="tabpanel" aria-labelledby="nav-videos-tab" tabindex="0">

										<table class="table table-responsive-xl table-hover table-striped" style="">
											<thead class="thead-info">
												<tr>
<?php if($config['index_show_id']){ ?>
													<th class="number id"><?= __('Id') ?></th>
<?php } ?>
													<th class="please-change-type album-id"><?= __('Album Id') ?></th>
													<th class="string name"><?= __('Name') ?></th>
													<th class="please-change-type url"><?= __('Url') ?></th>
													<th class="please-change-type embed"><?= __('Embed') ?></th>
													<th class="string title"><?= __('Title') ?></th>
													<th class="please-change-type description"><?= __('Description') ?></th>
													<th class="please-change-type duration"><?= __('Duration') ?></th>
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
												<?php foreach ($album->videos as $videos) : ?>

												<tr>
<?php if($config['index_show_id']){ ?>
													<td class="number id" value="<?= $videos->id ?>"><?= h($videos->id) ?></td>
<?php } ?>
													<td class="please-change-type album-id" value="<?= $videos->album_id ?>"><?= h($videos->album_id) ?></td>
													<td class="string name" value="<?= $videos->name ?>"><?= h($videos->name) ?></td>
													<td class="please-change-type url" value="<?= $videos->url ?>"><?= h($videos->url) ?></td>
													<td class="please-change-type embed" value="<?= $videos->embed ?>"><?= h($videos->embed) ?></td>
													<td class="string title" value="<?= $videos->title ?>"><?= h($videos->title) ?></td>
													<td class="please-change-type description" value="<?= $videos->description ?>"><?= h($videos->description) ?></td>
													<td class="please-change-type duration" value="<?= $videos->duration ?>"><?= h($videos->duration) ?></td>
<?php if($config['index_show_pos']){ ?>
													<td class="number pos" value="<?= $videos->pos ?>"><?= h($videos->pos) ?></td>
<?php } ?>
<?php if($config['index_show_visible']){ ?>
													<td class="boolean visible" value="<?= $videos->visible ?>"><?= h($videos->visible) ?></td>
<?php } ?>
													<td class="please-change-type last-used" value="<?= $videos->last_used ?>"><?= h($videos->last_used) ?></td>
<?php if($config['index_show_created']){ ?>
													<td class="datetime created" value="<?= $videos->created ?>"><?= h($videos->created) ?></td>
<?php } ?>
<?php if($config['index_show_modified']){ ?>
													<td class="datetime modified" value="<?= $videos->modified ?>"><?= h($videos->modified) ?></td>
<?php } ?>
													<td class="actions">
														<?= $this->Html->link('<i class="fa fa-eye"></i>', ['controller' => 'Videos', 'action' => 'view', $videos->id], ["escape" => false, "role" => "button",  "class" => "btn btn-warning btn-sm", "data-toggle" => "tooltip", "data-placement" => "top", "title" => __('View this item'), "data-original-title" => ""]) ?><!-- view button -->
														<?= $this->Html->link('<i class="fa fa-edit"></i>', ['controller' => 'Videos', 'action' => 'edit', $videos->id], ["escape" => false, "role" => "button", "class" => "btn btn-primary btn-sm", "data-toggle" => "tooltip", "data-placement" => "top", "title" => __('Edit this item'), "data-original-title" => ""]) ?><!-- edit button -->
														<?= $this->Form->postLink('<i class="fa fa-times"></i>', ['controller' => 'Videos', 'action' => 'delete', $videos->id], ["escape" => false, "role" => "button", "class" => "btn btn-danger btn-sm", "data-toggle" =>"tooltip", "data-placement" => "top", "title" => __('Delete this item'), "data-original-title" => "", "confirm" => __("Are you sure you want to delete # {0}?", $videos->id)]) ?><!-- delete button -->
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
