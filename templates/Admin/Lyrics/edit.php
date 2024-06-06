<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lyric $lyric
 * @var string[]|\Cake\Collection\CollectionInterface $tracklists
 */
?>
<?php
use Cake\Core\Configure;
use Cake\I18n\FrozenTime;

$this->Form->setTemplates(Configure::read('Templates.form'));
$this->assign('title', __('Edit') . ' ' . __('Lyric'));
?>
				<div id="form-row" class="lyrics row">
					<div class="col-xs-12 col-xl-10">
						<div class="card mb-3">
							<div class="card-header">

								<div class="float-start">
									<h3><i id="card-icon" class="fa fa-edit fa-spin"></i> <?= __('Edit') ?>: <?= __('Lyric') ?></h3>
									<?= __('The data marked with <span class="fw-bold text-danger">*</span> must be provided!') ?>
								</div>

								<div class="float-end ms-5">
									<?= $this->Html->link('<span class="btn btn-outline-secondary mt-1 me-1"><i class="fa fa-times"></i></span>',
										["controller" => "Lyrics", "action" => "index", "_full" => true],
										["escape" => false, "role" => "button"]
									); ?>

								</div>

								<div class="form-tab float-end">
									<ul class="nav nav-tabs mt-1" id="myTab" role="tablist">
										<li class="nav-item" role="presentation">
											<button class="nav-link active" id="tabMain" data-bs-toggle="tab" data-bs-target="#tabPanelMain" type="button" role="tab" aria-controls="tabPanelMain" aria-selected="true"><?= __('Basic data') ?></button>
										</li>

										<li class="nav-item" role="presentation">
											<button class="nav-link" id="tabLyric" data-bs-toggle="tab" data-bs-target="#tabPanelLyric" type="button" role="tab" aria-controls="tabPanelLyric" aria-selected="false"><?= __('Lyric') ?></button>
										</li>

<?php /*
										<li class="nav-item" role="presentation">
											<button class="nav-link" id="tabSecond" data-bs-toggle="tab" data-bs-target="#tabPanelSecond" type="button" role="tab" aria-controls="tabPanelSecond" aria-selected="false"><?= __('Memo') ?></button>
										</li>
										<li class="nav-item" role="presentation">
											<button class="nav-link" id="tabMore" data-bs-toggle="tab" data-bs-target="#tabPanelMore" type="button" role="tab" aria-controls="tabPanelMore" aria-selected="false"><?= __('More') ?></button>
										</li>
*/ ?>

									</ul>
								</div>

							</div>

							<?= $this->Form->create($lyric, ['id' => 'main-form']) ?>
							
								<?php //= $this->Form->control('_csrfToken', ['name' => '_csrfToken', 'type' => 'hidden', 'value' => $this->request->getAttribute('csrfToken')] ) ?>

								<div class="card-body">
								
									<div class="tab-content" id="tabContent">
										
										<div class="tab-pane fade show active" id="tabPanelMain" role="tabpanel" aria-labelledby="tabMain" tabindex="0">

											<!-- 1. SELECT: tracklist_id: string  required -->
											<div class="mb-3 form-group row select required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end required" for="tracklist-id"><?= __('Tracklist Id') ?>:</label>
												<div class="col-md-4">
													<?= $this->Form->control('tracklist_id', ['options' => $tracklists, 'placeholder' => __('Tracklist Id'), 'class' => 'form-control select2', 'data-live-search' => false, 'data-container' => 'body', 'data-size' => '6', 'empty' => false]);	?>

												</div>
											</div>

											<!-- 2. STRING: httpGetUrl: string  required -->
											<div class="mb-3 form-group row text required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end required" for="httpGetUrl"><?= __('HttpGetUrl') ?>:</label>
												<div class="col-md-9">
													<?= $this->Form->control('httpGetUrl', ['label' => __('HttpGetUrl'), 'placeholder' => __('HttpGetUrl'), 'class' => 'form-control', 'empty' => false]); ?>

												</div>
											</div>

											<!-- 2. STRING: TrackId: string  required -->
											<div class="mb-3 form-group row text required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end required" for="TrackId"><?= __('TrackId') ?>:</label>
												<div class="col-md-9">
													<?= $this->Form->control('TrackId', ['label' => __('TrackId'), 'placeholder' => __('TrackId'), 'class' => 'form-control', 'empty' => false]); ?>

												</div>
											</div>

											<!-- 2. STRING: LyricChecksum: string  required -->
											<div class="mb-3 form-group row text required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end required" for="LyricChecksum"><?= __('LyricChecksum') ?>:</label>
												<div class="col-md-9">
													<?= $this->Form->control('LyricChecksum', ['label' => __('LyricChecksum'), 'placeholder' => __('LyricChecksum'), 'class' => 'form-control', 'empty' => false]); ?>

												</div>
											</div>

											<!-- 2. STRING: LyricId: string  required -->
											<div class="mb-3 form-group row text required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end required" for="LyricId"><?= __('LyricId') ?>:</label>
												<div class="col-md-9">
													<?= $this->Form->control('LyricId', ['label' => __('LyricId'), 'placeholder' => __('LyricId'), 'class' => 'form-control', 'empty' => false]); ?>

												</div>
											</div>

											<!-- 2. STRING: LyricSong: string  required -->
											<div class="mb-3 form-group row text required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end required" for="LyricSong"><?= __('LyricSong') ?>:</label>
												<div class="col-md-9">
													<?= $this->Form->control('LyricSong', ['label' => __('LyricSong'), 'placeholder' => __('LyricSong'), 'class' => 'form-control', 'empty' => false]); ?>

												</div>
											</div>

											<!-- 2. STRING: LyricArtist: string  required -->
											<div class="mb-3 form-group row text required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end required" for="LyricArtist"><?= __('LyricArtist') ?>:</label>
												<div class="col-md-9">
													<?= $this->Form->control('LyricArtist', ['label' => __('LyricArtist'), 'placeholder' => __('LyricArtist'), 'class' => 'form-control', 'empty' => false]); ?>

												</div>
											</div>

											<!-- 2. STRING: LyricUrl: string  required -->
											<div class="mb-3 form-group row text required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end required" for="LyricUrl"><?= __('LyricUrl') ?>:</label>
												<div class="col-md-9">
													<?= $this->Form->control('LyricUrl', ['label' => __('LyricUrl'), 'placeholder' => __('LyricUrl'), 'class' => 'form-control', 'empty' => false]); ?>

												</div>
											</div>

											<!-- 2. STRING: LyricCovertArtUrl: string  required -->
											<div class="mb-3 form-group row text required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end required" for="LyricCovertArtUrl"><?= __('LyricCovertArtUrl') ?>:</label>
												<div class="col-md-9">
													<?= $this->Form->control('LyricCovertArtUrl', ['label' => __('LyricCovertArtUrl'), 'placeholder' => __('LyricCovertArtUrl'), 'class' => 'form-control', 'empty' => false]); ?>

												</div>
											</div>

											<!-- 2. STRING: LyricRank: string  required -->
											<div class="mb-3 form-group row text required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end required" for="LyricRank"><?= __('LyricRank') ?>:</label>
												<div class="col-md-9">
													<?= $this->Form->control('LyricRank', ['label' => __('LyricRank'), 'placeholder' => __('LyricRank'), 'class' => 'form-control', 'empty' => false]); ?>

												</div>
											</div>

											<!-- 2. STRING: LyricCorrectUrl: string  required -->
											<div class="mb-3 form-group row text required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end required" for="LyricCorrectUrl"><?= __('LyricCorrectUrl') ?>:</label>
												<div class="col-md-9">
													<?= $this->Form->control('LyricCorrectUrl', ['label' => __('LyricCorrectUrl'), 'placeholder' => __('LyricCorrectUrl'), 'class' => 'form-control', 'empty' => false]); ?>

												</div>
											</div>

											<!-- 3. INTEGER: pos: integer  required -->
											<div class="mb-3 form-group row number required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end required" for="pos"><?= __('Pos') ?>:</label>
												<div class="col-xs-12 col-sm-12 col-md-5 col-lg-4 col-xl-4 col-xxl-4">
													<?= $this->Form->control('pos', ['class' => 'form-control', 'placeholder' => __('Pos'), 'data-decimals' => '0', 'min' => '0', 'max' => '999999999999', 'step' => '1', 'empty' => false]); ?>

												</div>
											</div>

											<!-- 7. BOOLEAN: visible: boolean  required -->
											<div class="mb-3 form-group row checkbox">
												<div class="col-sm-2 col-form-label required"></div>
												<div class="col-sm-10">
													<?= $this->Form->control('visible', ['empty' => false]); ?>

												</div>
											</div>

											<!-- 4. DATETIME: last_used: datetime  required -->
											<div class="mb-3 row required">
												<label class="pt-2 col-form-label col-md-2 pt-1 text-start text-md-end required" for="last-used"><?= __('Last Used') ?>:</label>
												<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xl-4 col-xxl-4">
													<div class="form-group datetime">
														<div class="input-group last-used" id="last-used" data-target-input="nearest">
															<?= $this->Form->control('last_used', ['type' => 'text', 'placeholder' => __('Last Used'), 'class' => 'form-control', 'empty' => false]); ?>

															<div class="input-group-append" data-target="#last-used" data-toggle="last-used">
																<div class="input-group-text"><i class="fa fa-calendar"></i></div>
															</div>
														</div>
													</div>
												</div>
											</div>

										</div><!-- /.tabPanelMain -->
										
										
										<!-- TabPanel: tabPanelLyric -->
										<!-- 10. TEXT: Lyric: text  required -->
										<div class="tab-pane fade" id="tabPanelLyric" role="tabpanel" aria-labelledby="tabLyric" tabindex="0">
											<div class="row mb-3">
												<div class="col-sm-12">
													<?= $this->Form->control('Lyric', ['id' => 'Lyric', 'label' => false, 'class' => 'summernote', 'empty' => false]); ?>

												</div>
											</div>
										</div><!-- /.TabPanel: tabPanelLyric -->

<?php /*											
										<div class="tab-pane fade" id="tabPanelMore" role="tabpanel" aria-labelledby="tabMore" tabindex="0">
											<h3>More content come here...</h3>

										</div><!-- /.N.TAB -->
*/ ?>

									</div><!-- /.TAB PANEL -->
										
								</div>

								<div class="card-footer text-center">
									<?= $this->Form->button('<span class="btn-label"><i class="fa fa-save"></i></span>' . __('Save'), ["escapeTitle" => false, "type" => "submit", "class" => "btn btn-primary me-4"]) ?>
									
									<?= $this->Html->link('<span class="btn-label"><i class="fa fa-arrow-up"></i></span>' . __("Cancel"),
										["controller" => "Lyrics", "action" => "index", "_full" => true],
										["escape" => false, "role" => "button", "class" => "btn btn-outline-secondary"]
									); ?>
									
								</div>

							<?= $this->Form->end() ?>

						</div><!-- end card-->
                    </div>


				</div>			


<?php
	$this->Html->css(
		[
			"jeffAdmin5./assets/plugins/tempus-dominus-6.0.0/dist/css/tempus-dominus.min",
			"jeffAdmin5./assets/plugins/summernote-0.8.18-dist/summernote-lite.min",
			"jeffAdmin5./assets/plugins/bootstrap-select-main/docs/docs/dist/css/bootstrap-select.min",
			"jeffAdmin5./assets/plugins/icheck-1.0.3/skins/all",

			// "jeffAdmin5./assets/plugins/select2-4.1.0-rc.0/dist/css/select2.min",	// If you want to use Select 2, but it's not finish!!!
			// "jeffAdmin5./assets/css/select2-bootstrap-5-theme.min",					// If you want to use Select 2, but it's not finish!!!
		],
		['block' => true]);


	$this->Html->script(
		[
			"jeffAdmin5./assets/js/popper",
			"jeffAdmin5./assets/plugins/tempus-dominus-6.0.0/dist/js/tempus-dominus.min",	// Must be loaded the popper.js !!
			"jeffAdmin5./assets/plugins/bootstrap-input-spinner-bs-5/src/bootstrap-input-spinner",
			"jeffAdmin5./assets/plugins/summernote-0.8.18-dist/summernote-lite.min",
			"jeffAdmin5./assets/plugins/summernote-0.8.18-dist/lang/summernote-hu-HU",
			//'jeffAdmin5./assets/plugins/jReadMore-master/dist/read-more.min',
			"jeffAdmin5./assets/plugins/bootstrap-select-main/docs/docs/dist/js/bootstrap-select.min",
			"jeffAdmin5./assets/plugins/bootstrap-select-main/docs/docs/dist/js/i18n/defaults-hu_HU.min",
			"jeffAdmin5./assets/plugins/icheck-1.0.3/icheck.min",
			
			//'jeffAdmin5./assets/plugins/select2-4.1.0-rc.0/dist/js/select2.full.min',	// If you want to use Select 2, but it's not finish!!!
			//'jeffAdmin5./assets/plugins/select2-4.1.0-rc.0/dist/js/i18n/hu',			// If you want to use Select 2, but it's not finish!!!
		],
		['block' => 'scriptBottom']
	); ?>
		
<?php
	// SELECT: https://developer.snapappointments.com/bootstrap-select/examples/
?>

<?php $this->Html->scriptStart(['block' => 'javaScriptBottom']); ?>

	jeffAdminInitSelectPicker()
	jeffAdminInitInputSpinner()
	jeffAdminInitSummerNote('Lyric', 400, '<?= __("Here you can write the note") ?>...') // Init SummerNote for Lyric.
	jeffAdminInitDateTimePicker('last_used'<?= $lyric->last_used !== null ? ", '" . $lyric->last_used->format('Y-m-d H:i:s') . "'" : "" ?>)
	jeffAdminInitICheck('icheckbox_flat-blue');

	$(document).ready( function(){
		$('#button-submit').click( function(){
			$('#main-form').submit();
		});			
	});			

<?php $this->Html->scriptEnd(['block' => 'javaScriptBottom']); ?>
