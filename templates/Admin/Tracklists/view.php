<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tracklist $tracklist
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
									<h3><i id="card-icon" class="fa fa-eye fa-spin"></i> <?= __('View') ?>: <?= __('Tracklist') ?></h3>
									<?= __('The data marked with <span class="fw-bold text-danger">*</span> must be provided!') ?>
								</div>
								<div class="float-end ms-5">
									<?= $this->Html->link('<span class="btn btn-outline-secondary mt-1 me-1"><i class="fa fa-times"></i></span>',
										["controller" => "Tracklists", "action" => "index", "_full" => true],
										["escape" => false, "role" => "button"]
									) ?>
								</div>

								<div class="form-tab float-end">
									<ul class="nav nav-tabs mt-1" id="myTab" role="tablist">
										<li class="nav-item" role="presentation">
											<button class="nav-link active" id="tab-first" data-bs-toggle="tab" data-bs-target="#tabPanelMain" type="button" role="tab" aria-controls="tabPanelMain" aria-selected="true"><?= __('Basic data') ?></button>
										</li>

										<li class="nav-item" role="presentation">
											<button class="nav-link" id="tabLyrics" data-bs-toggle="tab" data-bs-target="#tabPanelLyrics" type="button" role="tab" aria-controls="tabPanelLyrics" aria-selected="false"><?= __('Lyrics') ?></button>
										</li>

<?php /*
										<li class="nav-item" role="presentation">
											<button class="nav-link" id="tab-more" data-bs-toggle="tab" data-bs-target="#tab-panel-more" type="button" role="tab" aria-controls="tab-panel-more" aria-selected="false"><?= __('More') ?></button>
										</li>
*/ ?>

										<li class="nav-item dropdown">
											<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><?= __('Related tables') ?></a>
											<ul class="dropdown-menu">
<?php if (!empty($tracklist->extraartists_tracklists)) : ?>
												<li><?= $this->Html->link(__('Extraartists Tracklists') . '...', ['controller' => 'Extraartists Tracklists', 'action' => 'index', 'parent', 'tracklist', $tracklist->id], ['class' => 'dropdown-item']) ?></li>
<?php endif ?>
<?php if (!empty($tracklist->lyrics)) : ?>
												<li><?= $this->Html->link(__('Lyrics') . '...', ['controller' => 'Lyrics', 'action' => 'index', 'parent', 'tracklist', $tracklist->id], ['class' => 'dropdown-item']) ?></li>
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
													<?= $tracklist->id ?><!-- 0.a -->
												</div>
											</div>
<?php } ?>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Id') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($tracklist->id) ?>

												</div>
											</div>
											<div class="row"><!-- 1. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Album') ?>:</label>
												<div class="col-sm-10 p-1 link">
													<?= $tracklist->hasValue('album') ? $this->Html->link($tracklist->album->name, ['controller' => 'Albums', 'action' => 'view', $tracklist->album->id]) : '' ?><span class="external-link-icon"><i class="fa fa-external-link" aria-hidden="true"></i></span>
												</div>
											</div>
											<div class="row"><!-- 1. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Condition') ?>:</label>
												<div class="col-sm-10 p-1 link">
													<?= $tracklist->hasValue('condition') ? $this->Html->link($tracklist->condition->name, ['controller' => 'Conditions', 'action' => 'view', $tracklist->condition->id]) : '' ?><span class="external-link-icon"><i class="fa fa-external-link" aria-hidden="true"></i></span>
												</div>
											</div>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Title') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($tracklist->title) ?>

												</div>
											</div>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Position') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($tracklist->position) ?>

												</div>
											</div>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Duration') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($tracklist->duration) ?>

												</div>
											</div>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Type') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($tracklist->type) ?>

												</div>
											</div>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Lyrics Checked User Id') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($tracklist->lyrics_checked_user_id) ?>

												</div>
											</div>
											<div class="row"><!-- 4. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Last Used') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($tracklist->last_used) ?>

												</div>
											</div>
<?php /*
											<div class="row"><!-- 6. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Lyrics') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= $this->Text->autoParagraph(h($tracklist->lyrics)) ?>

												</div>
											</div>
*/ ?>

										</div><!-- /.1.TAB -->
										
										<!-- TAB for: Lyrics text field -->
										<div class="tab-pane fade" id="tabPanelLyrics" role="tabpanel" aria-labelledby="tabLyrics" tabindex="0">
											<div class="row">
												<div class="col-sm-12">
													<div class="row">
														<div id="readMoreLyrics" class="col-sm-12 p-2 text read-more">
															<?= $this->Text->autoParagraph($tracklist->lyrics) ?>

														</div>
													</div>
												</div>
											</div>
										</div>
										<!-- /.TAB for: Lyrics text field-->
										

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
<?php if (!empty($tracklist->extraartists_tracklists)): ?>
											<button class="nav-link active" id="nav-extraartists_tracklists-tab" data-bs-toggle="tab" data-bs-target="#nav-extraartists_tracklists" type="button" role="tab" aria-controls="nav-extraartists_tracklists" aria-selected="true">
												<?= __('Extraartists Tracklists') ?>
											</button>
<?php endif ?>
<?php if (!empty($tracklist->lyrics)): ?>
											<button class="nav-link" id="nav-lyrics-tab" data-bs-toggle="tab" data-bs-target="#nav-lyrics" type="button" role="tab" aria-controls="nav-lyrics" aria-selected="true">
												<?= __('Lyrics') ?>
											</button>
<?php endif ?>
										</div>
									</nav>
								</div>

							</div><!-- /card header -->
								
							<div class="card-body p-1 pb-0">

								<div class="tab-content" id="nav-tabContent">

<?php if (!empty($tracklist->extraartists_tracklists)): ?>

									<div class="tab-pane fade show active p-0" id="nav-extraartists_tracklists" role="tabpanel" aria-labelledby="nav-extraartists_tracklists-tab" tabindex="0">

										<table class="table table-responsive-xl table-hover table-striped" style="">
											<thead class="thead-info">
												<tr>
<?php if($config['index_show_id']){ ?>
													<th class="number id"><?= __('Id') ?></th>
<?php } ?>
													<th class="please-change-type tracklist-id"><?= __('Tracklist Id') ?></th>
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
												<?php foreach ($tracklist->extraartists_tracklists as $extraartistsTracklists) : ?>

												<tr>
<?php if($config['index_show_id']){ ?>
													<td class="number id" value="<?= $extraartistsTracklists->id ?>"><?= h($extraartistsTracklists->id) ?></td>
<?php } ?>
													<td class="please-change-type tracklist-id" value="<?= $extraartistsTracklists->tracklist_id ?>"><?= h($extraartistsTracklists->tracklist_id) ?></td>
													<td class="please-change-type extraartist-id" value="<?= $extraartistsTracklists->extraartist_id ?>"><?= h($extraartistsTracklists->extraartist_id) ?></td>
													<td class="please-change-type role" value="<?= $extraartistsTracklists->role ?>"><?= h($extraartistsTracklists->role) ?></td>
<?php if($config['index_show_pos']){ ?>
													<td class="number pos" value="<?= $extraartistsTracklists->pos ?>"><?= h($extraartistsTracklists->pos) ?></td>
<?php } ?>
<?php if($config['index_show_visible']){ ?>
													<td class="boolean visible" value="<?= $extraartistsTracklists->visible ?>"><?= h($extraartistsTracklists->visible) ?></td>
<?php } ?>
													<td class="please-change-type last-used" value="<?= $extraartistsTracklists->last_used ?>"><?= h($extraartistsTracklists->last_used) ?></td>
<?php if($config['index_show_created']){ ?>
													<td class="datetime created" value="<?= $extraartistsTracklists->created ?>"><?= h($extraartistsTracklists->created) ?></td>
<?php } ?>
<?php if($config['index_show_modified']){ ?>
													<td class="datetime modified" value="<?= $extraartistsTracklists->modified ?>"><?= h($extraartistsTracklists->modified) ?></td>
<?php } ?>
													<td class="actions">
														<?= $this->Html->link('<i class="fa fa-eye"></i>', ['controller' => 'ExtraartistsTracklists', 'action' => 'view', $extraartistsTracklists->id], ["escape" => false, "role" => "button",  "class" => "btn btn-warning btn-sm", "data-toggle" => "tooltip", "data-placement" => "top", "title" => __('View this item'), "data-original-title" => ""]) ?><!-- view button -->
														<?= $this->Html->link('<i class="fa fa-edit"></i>', ['controller' => 'ExtraartistsTracklists', 'action' => 'edit', $extraartistsTracklists->id], ["escape" => false, "role" => "button", "class" => "btn btn-primary btn-sm", "data-toggle" => "tooltip", "data-placement" => "top", "title" => __('Edit this item'), "data-original-title" => ""]) ?><!-- edit button -->
														<?= $this->Form->postLink('<i class="fa fa-times"></i>', ['controller' => 'ExtraartistsTracklists', 'action' => 'delete', $extraartistsTracklists->id], ["escape" => false, "role" => "button", "class" => "btn btn-danger btn-sm", "data-toggle" =>"tooltip", "data-placement" => "top", "title" => __('Delete this item'), "data-original-title" => "", "confirm" => __("Are you sure you want to delete # {0}?", $extraartistsTracklists->id)]) ?><!-- delete button -->
													</td>
												</tr>
												<?php endforeach ?>

											</tbody>
										</table>

									</div><!-- /tab pane -->
<?php endif ?>
<?php if (!empty($tracklist->lyrics)): ?>

									<div class="tab-pane fade p-0" id="nav-lyrics" role="tabpanel" aria-labelledby="nav-lyrics-tab" tabindex="0">

										<table class="table table-responsive-xl table-hover table-striped" style="">
											<thead class="thead-info">
												<tr>
<?php if($config['index_show_id']){ ?>
													<th class="number id"><?= __('Id') ?></th>
<?php } ?>
													<th class="please-change-type tracklist-id"><?= __('Tracklist Id') ?></th>
													<th class="please-change-type httpGetUrl"><?= __('HttpGetUrl') ?></th>
													<th class="please-change-type TrackId"><?= __('TrackId') ?></th>
													<th class="please-change-type LyricChecksum"><?= __('LyricChecksum') ?></th>
													<th class="please-change-type LyricId"><?= __('LyricId') ?></th>
													<th class="please-change-type LyricSong"><?= __('LyricSong') ?></th>
													<th class="please-change-type LyricArtist"><?= __('LyricArtist') ?></th>
													<th class="please-change-type LyricUrl"><?= __('LyricUrl') ?></th>
													<th class="please-change-type LyricCovertArtUrl"><?= __('LyricCovertArtUrl') ?></th>
													<th class="please-change-type LyricRank"><?= __('LyricRank') ?></th>
													<th class="please-change-type LyricCorrectUrl"><?= __('LyricCorrectUrl') ?></th>
													<th class="please-change-type Lyric"><?= __('Lyric') ?></th>
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
												<?php foreach ($tracklist->lyrics as $lyrics) : ?>

												<tr>
<?php if($config['index_show_id']){ ?>
													<td class="number id" value="<?= $lyrics->id ?>"><?= h($lyrics->id) ?></td>
<?php } ?>
													<td class="please-change-type tracklist-id" value="<?= $lyrics->tracklist_id ?>"><?= h($lyrics->tracklist_id) ?></td>
													<td class="please-change-type httpGetUrl" value="<?= $lyrics->httpGetUrl ?>"><?= h($lyrics->httpGetUrl) ?></td>
													<td class="please-change-type TrackId" value="<?= $lyrics->TrackId ?>"><?= h($lyrics->TrackId) ?></td>
													<td class="please-change-type LyricChecksum" value="<?= $lyrics->LyricChecksum ?>"><?= h($lyrics->LyricChecksum) ?></td>
													<td class="please-change-type LyricId" value="<?= $lyrics->LyricId ?>"><?= h($lyrics->LyricId) ?></td>
													<td class="please-change-type LyricSong" value="<?= $lyrics->LyricSong ?>"><?= h($lyrics->LyricSong) ?></td>
													<td class="please-change-type LyricArtist" value="<?= $lyrics->LyricArtist ?>"><?= h($lyrics->LyricArtist) ?></td>
													<td class="please-change-type LyricUrl" value="<?= $lyrics->LyricUrl ?>"><?= h($lyrics->LyricUrl) ?></td>
													<td class="please-change-type LyricCovertArtUrl" value="<?= $lyrics->LyricCovertArtUrl ?>"><?= h($lyrics->LyricCovertArtUrl) ?></td>
													<td class="please-change-type LyricRank" value="<?= $lyrics->LyricRank ?>"><?= h($lyrics->LyricRank) ?></td>
													<td class="please-change-type LyricCorrectUrl" value="<?= $lyrics->LyricCorrectUrl ?>"><?= h($lyrics->LyricCorrectUrl) ?></td>
													<td class="please-change-type Lyric" value="<?= $lyrics->Lyric ?>"><?= h($lyrics->Lyric) ?></td>
<?php if($config['index_show_pos']){ ?>
													<td class="number pos" value="<?= $lyrics->pos ?>"><?= h($lyrics->pos) ?></td>
<?php } ?>
<?php if($config['index_show_visible']){ ?>
													<td class="boolean visible" value="<?= $lyrics->visible ?>"><?= h($lyrics->visible) ?></td>
<?php } ?>
													<td class="please-change-type last-used" value="<?= $lyrics->last_used ?>"><?= h($lyrics->last_used) ?></td>
<?php if($config['index_show_created']){ ?>
													<td class="datetime created" value="<?= $lyrics->created ?>"><?= h($lyrics->created) ?></td>
<?php } ?>
<?php if($config['index_show_modified']){ ?>
													<td class="datetime modified" value="<?= $lyrics->modified ?>"><?= h($lyrics->modified) ?></td>
<?php } ?>
													<td class="actions">
														<?= $this->Html->link('<i class="fa fa-eye"></i>', ['controller' => 'Lyrics', 'action' => 'view', $lyrics->id], ["escape" => false, "role" => "button",  "class" => "btn btn-warning btn-sm", "data-toggle" => "tooltip", "data-placement" => "top", "title" => __('View this item'), "data-original-title" => ""]) ?><!-- view button -->
														<?= $this->Html->link('<i class="fa fa-edit"></i>', ['controller' => 'Lyrics', 'action' => 'edit', $lyrics->id], ["escape" => false, "role" => "button", "class" => "btn btn-primary btn-sm", "data-toggle" => "tooltip", "data-placement" => "top", "title" => __('Edit this item'), "data-original-title" => ""]) ?><!-- edit button -->
														<?= $this->Form->postLink('<i class="fa fa-times"></i>', ['controller' => 'Lyrics', 'action' => 'delete', $lyrics->id], ["escape" => false, "role" => "button", "class" => "btn btn-danger btn-sm", "data-toggle" =>"tooltip", "data-placement" => "top", "title" => __('Delete this item'), "data-original-title" => "", "confirm" => __("Are you sure you want to delete # {0}?", $lyrics->id)]) ?><!-- delete button -->
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
