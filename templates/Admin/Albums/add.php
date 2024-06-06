<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Album $album
 * @var \Cake\Collection\CollectionInterface|string[] $countries
 * @var \Cake\Collection\CollectionInterface|string[] $abbreviations
 * @var \Cake\Collection\CollectionInterface|string[] $artists
 * @var \Cake\Collection\CollectionInterface|string[] $companies
 * @var \Cake\Collection\CollectionInterface|string[] $formats
 * @var \Cake\Collection\CollectionInterface|string[] $genres
 * @var \Cake\Collection\CollectionInterface|string[] $labels
 * @var \Cake\Collection\CollectionInterface|string[] $languages
 * @var \Cake\Collection\CollectionInterface|string[] $styles
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<?php
use Cake\Core\Configure;
use Cake\I18n\FrozenTime;

$this->Form->setTemplates(Configure::read('Templates.form'));
$this->assign('title', __('Add') . ' ' . __('Album'));
?>
				<div id="form-row" class="albums row">
					<div class="col-xs-12 col-xl-10">
						<div class="card mb-3">
							<div class="card-header">

								<div class="float-start">
									<h3><i id="card-icon" class="fa fa-plus fa-spin"></i> <?= __('Add') ?>: <?= __('Album') ?></h3>
									<?= __('The data marked with <span class="fw-bold text-danger">*</span> must be provided!') ?>
								</div>

								<div class="float-end ms-5">
									<?= $this->Html->link('<span class="btn btn-outline-secondary mt-1 me-1"><i class="fa fa-times"></i></span>',
										["controller" => "Albums", "action" => "index", "_full" => true],
										["escape" => false, "role" => "button"]
									); ?>

								</div>

								<div class="form-tab float-end">
									<ul class="nav nav-tabs mt-1" id="myTab" role="tablist">
										<li class="nav-item" role="presentation">
											<button class="nav-link active" id="tabMain" data-bs-toggle="tab" data-bs-target="#tabPanelMain" type="button" role="tab" aria-controls="tabPanelMain" aria-selected="true"><?= __('Basic data') ?></button>
										</li>

										<li class="nav-item" role="presentation">
											<button class="nav-link" id="tabNotes" data-bs-toggle="tab" data-bs-target="#tabPanelNotes" type="button" role="tab" aria-controls="tabPanelNotes" aria-selected="false"><?= __('Notes') ?></button>
										</li>

										<li class="nav-item" role="presentation">
											<button class="nav-link" id="tabJson" data-bs-toggle="tab" data-bs-target="#tabPanelJson" type="button" role="tab" aria-controls="tabPanelJson" aria-selected="false"><?= __('Json') ?></button>
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

							<?= $this->Form->create($album, ['id' => 'main-form']) ?>
							
								<?php //= $this->Form->control('_csrfToken', ['name' => '_csrfToken', 'type' => 'hidden', 'value' => $this->request->getAttribute('csrfToken')] ) ?>

								<div class="card-body">
								
									<div class="tab-content" id="tabContent">
										
										<div class="tab-pane fade show active" id="tabPanelMain" role="tabpanel" aria-labelledby="tabMain" tabindex="0">

											<!-- 2. STRING: ext_id: string  required -->
											<div class="mb-3 form-group row text required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end required" for="ext-id"><?= __('Ext Id') ?>:</label>
												<div class="col-md-9">
													<?= $this->Form->control('ext_id', ['label' => __('Ext Id'), 'placeholder' => __('Ext Id'), 'class' => 'form-control', 'empty' => false]); ?>

												</div>
											</div>

											<!-- 1. SELECT: country_id: integer  required -->
											<div class="mb-3 form-group row select required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end required" for="country-id"><?= __('Country Id') ?>:</label>
												<div class="col-md-4">
													<?= $this->Form->control('country_id', ['options' => $countries, 'placeholder' => __('Country Id'), 'class' => 'form-control select2', 'data-live-search' => false, 'data-container' => 'body', 'data-size' => '6', 'empty' => false]);	?>

												</div>
											</div>

											<!-- 2. STRING: artists_sort: string  required -->
											<div class="mb-3 form-group row text required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end required" for="artists-sort"><?= __('Artists Sort') ?>:</label>
												<div class="col-md-9">
													<?= $this->Form->control('artists_sort', ['label' => __('Artists Sort'), 'placeholder' => __('Artists Sort'), 'class' => 'form-control', 'empty' => false]); ?>

												</div>
											</div>

											<!-- 2. STRING: name: string  required -->
											<div class="mb-3 form-group row text required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end required" for="name"><?= __('Name') ?>:</label>
												<div class="col-md-9">
													<?= $this->Form->control('name', ['label' => __('Name'), 'placeholder' => __('Name'), 'class' => 'form-control', 'empty' => false, 'autofocus' => true]); ?>

												</div>
											</div>

											<!-- 3. INTEGER: year: integer  required -->
											<div class="mb-3 form-group row number required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end required" for="year"><?= __('Year') ?>:</label>
												<div class="col-xs-12 col-sm-12 col-md-5 col-lg-4 col-xl-4 col-xxl-4">
													<?= $this->Form->control('year', ['class' => 'form-control', 'placeholder' => __('Year'), 'data-decimals' => '0', 'min' => '0', 'max' => '999999999999', 'step' => '1', 'empty' => false]); ?>

												</div>
											</div>

											<!-- 2. STRING: lowest_price: string  required -->
											<div class="mb-3 form-group row text required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end required" for="lowest-price"><?= __('Lowest Price') ?>:</label>
												<div class="col-md-9">
													<?= $this->Form->control('lowest_price', ['label' => __('Lowest Price'), 'placeholder' => __('Lowest Price'), 'class' => 'form-control', 'empty' => false]); ?>

												</div>
											</div>

											<!-- 2. STRING: laci_price: string  required -->
											<div class="mb-3 form-group row text required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end required" for="laci-price"><?= __('Laci Price') ?>:</label>
												<div class="col-md-9">
													<?= $this->Form->control('laci_price', ['label' => __('Laci Price'), 'placeholder' => __('Laci Price'), 'class' => 'form-control', 'empty' => false]); ?>

												</div>
											</div>

											<!-- 2. STRING: released_formatted: string  required -->
											<div class="mb-3 form-group row text required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end required" for="released-formatted"><?= __('Released Formatted') ?>:</label>
												<div class="col-md-9">
													<?= $this->Form->control('released_formatted', ['label' => __('Released Formatted'), 'placeholder' => __('Released Formatted'), 'class' => 'form-control', 'empty' => false]); ?>

												</div>
											</div>

											<!-- 2. STRING: estimated_weight: string  required -->
											<div class="mb-3 form-group row text required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end required" for="estimated-weight"><?= __('Estimated Weight') ?>:</label>
												<div class="col-md-9">
													<?= $this->Form->control('estimated_weight', ['label' => __('Estimated Weight'), 'placeholder' => __('Estimated Weight'), 'class' => 'form-control', 'empty' => false]); ?>

												</div>
											</div>

											<!-- 2. STRING: released: string  required -->
											<div class="mb-3 form-group row text required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end required" for="released"><?= __('Released') ?>:</label>
												<div class="col-md-9">
													<?= $this->Form->control('released', ['label' => __('Released'), 'placeholder' => __('Released'), 'class' => 'form-control', 'empty' => false]); ?>

												</div>
											</div>

											<!-- 2. STRING: url: string  required -->
											<div class="mb-3 form-group row text required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end required" for="url"><?= __('Url') ?>:</label>
												<div class="col-md-9">
													<?= $this->Form->control('url', ['label' => __('Url'), 'placeholder' => __('Url'), 'class' => 'form-control', 'empty' => false]); ?>

												</div>
											</div>

											<!-- 2. STRING: resource_url: string  required -->
											<div class="mb-3 form-group row text required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end required" for="resource-url"><?= __('Resource Url') ?>:</label>
												<div class="col-md-9">
													<?= $this->Form->control('resource_url', ['label' => __('Resource Url'), 'placeholder' => __('Resource Url'), 'class' => 'form-control', 'empty' => false]); ?>

												</div>
											</div>

											<!-- 2. STRING: master_url: string  required -->
											<div class="mb-3 form-group row text required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end required" for="master-url"><?= __('Master Url') ?>:</label>
												<div class="col-md-9">
													<?= $this->Form->control('master_url', ['label' => __('Master Url'), 'placeholder' => __('Master Url'), 'class' => 'form-control', 'empty' => false]); ?>

												</div>
											</div>

											<!-- 2. STRING: master_id: string  required -->
											<div class="mb-3 form-group row text required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end required" for="master-id"><?= __('Master Id') ?>:</label>
												<div class="col-md-9">
													<?= $this->Form->control('master_id', ['label' => __('Master Id'), 'placeholder' => __('Master Id'), 'class' => 'form-control', 'empty' => false]); ?>

												</div>
											</div>

											<!-- 2. STRING: url_src: string  required -->
											<div class="mb-3 form-group row text required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end required" for="url-src"><?= __('Url Src') ?>:</label>
												<div class="col-md-9">
													<?= $this->Form->control('url_src', ['label' => __('Url Src'), 'placeholder' => __('Url Src'), 'class' => 'form-control', 'empty' => false]); ?>

												</div>
											</div>

											<!-- 2. STRING: uri: string  required -->
											<div class="mb-3 form-group row text required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end required" for="uri"><?= __('Uri') ?>:</label>
												<div class="col-md-9">
													<?= $this->Form->control('uri', ['label' => __('Uri'), 'placeholder' => __('Uri'), 'class' => 'form-control', 'empty' => false]); ?>

												</div>
											</div>

											<!-- 2. STRING: thumb: string  required -->
											<div class="mb-3 form-group row text required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end required" for="thumb"><?= __('Thumb') ?>:</label>
												<div class="col-md-9">
													<?= $this->Form->control('thumb', ['label' => __('Thumb'), 'placeholder' => __('Thumb'), 'class' => 'form-control', 'empty' => false]); ?>

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

											<!-- 9. MULTISELECT: abbreviations -->
											<div class="mb-3 form-group row select">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end" for="abbreviations"><?= __('Abbreviations') ?>:</label>
												<div class="col-md-9">
													<?= $this->Form->control('abbreviations._ids', ['class' => 'form-control', 'placeholder' => __('Abbreviations'), 'options' => $abbreviations, 'data-live-search' => false, 'data-actions-box' => false, 'data-container' => 'body', 'data-size' => '6']); ?>
												</div>
											</div>

											<!-- 9. MULTISELECT: artists -->
											<div class="mb-3 form-group row select">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end" for="artists"><?= __('Artists') ?>:</label>
												<div class="col-md-9">
													<?= $this->Form->control('artists._ids', ['class' => 'form-control', 'placeholder' => __('Artists'), 'options' => $artists, 'data-live-search' => false, 'data-actions-box' => false, 'data-container' => 'body', 'data-size' => '6']); ?>
												</div>
											</div>

											<!-- 9. MULTISELECT: companies -->
											<div class="mb-3 form-group row select">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end" for="companies"><?= __('Companies') ?>:</label>
												<div class="col-md-9">
													<?= $this->Form->control('companies._ids', ['class' => 'form-control', 'placeholder' => __('Companies'), 'options' => $companies, 'data-live-search' => false, 'data-actions-box' => false, 'data-container' => 'body', 'data-size' => '6']); ?>
												</div>
											</div>

											<!-- 9. MULTISELECT: formats -->
											<div class="mb-3 form-group row select">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end" for="formats"><?= __('Formats') ?>:</label>
												<div class="col-md-9">
													<?= $this->Form->control('formats._ids', ['class' => 'form-control', 'placeholder' => __('Formats'), 'options' => $formats, 'data-live-search' => false, 'data-actions-box' => false, 'data-container' => 'body', 'data-size' => '6']); ?>
												</div>
											</div>

											<!-- 9. MULTISELECT: genres -->
											<div class="mb-3 form-group row select">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end" for="genres"><?= __('Genres') ?>:</label>
												<div class="col-md-9">
													<?= $this->Form->control('genres._ids', ['class' => 'form-control', 'placeholder' => __('Genres'), 'options' => $genres, 'data-live-search' => false, 'data-actions-box' => false, 'data-container' => 'body', 'data-size' => '6']); ?>
												</div>
											</div>

											<!-- 9. MULTISELECT: labels -->
											<div class="mb-3 form-group row select">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end" for="labels"><?= __('Labels') ?>:</label>
												<div class="col-md-9">
													<?= $this->Form->control('labels._ids', ['class' => 'form-control', 'placeholder' => __('Labels'), 'options' => $labels, 'data-live-search' => false, 'data-actions-box' => false, 'data-container' => 'body', 'data-size' => '6']); ?>
												</div>
											</div>

											<!-- 9. MULTISELECT: languages -->
											<div class="mb-3 form-group row select">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end" for="languages"><?= __('Languages') ?>:</label>
												<div class="col-md-9">
													<?= $this->Form->control('languages._ids', ['class' => 'form-control', 'placeholder' => __('Languages'), 'options' => $languages, 'data-live-search' => false, 'data-actions-box' => false, 'data-container' => 'body', 'data-size' => '6']); ?>
												</div>
											</div>

											<!-- 9. MULTISELECT: styles -->
											<div class="mb-3 form-group row select">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end" for="styles"><?= __('Styles') ?>:</label>
												<div class="col-md-9">
													<?= $this->Form->control('styles._ids', ['class' => 'form-control', 'placeholder' => __('Styles'), 'options' => $styles, 'data-live-search' => false, 'data-actions-box' => false, 'data-container' => 'body', 'data-size' => '6']); ?>
												</div>
											</div>

											<!-- 9. MULTISELECT: users -->
											<div class="mb-3 form-group row select">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end" for="users"><?= __('Users') ?>:</label>
												<div class="col-md-9">
													<?= $this->Form->control('users._ids', ['class' => 'form-control', 'placeholder' => __('Users'), 'options' => $users, 'data-live-search' => false, 'data-actions-box' => false, 'data-container' => 'body', 'data-size' => '6']); ?>
												</div>
											</div>

										</div><!-- /.tabPanelMain -->
										
										
										<!-- TabPanel: tabPanelNotes -->
										<!-- 10. TEXT: notes: text  required -->
										<div class="tab-pane fade" id="tabPanelNotes" role="tabpanel" aria-labelledby="tabNotes" tabindex="0">
											<div class="row mb-3">
												<div class="col-sm-12">
													<?= $this->Form->control('notes', ['id' => 'notes', 'label' => false, 'class' => 'summernote', 'empty' => false]); ?>

												</div>
											</div>
										</div><!-- /.TabPanel: tabPanelNotes -->

										<!-- TabPanel: tabPanelJson -->
										<!-- 10. TEXT: json: text  required -->
										<div class="tab-pane fade" id="tabPanelJson" role="tabpanel" aria-labelledby="tabJson" tabindex="0">
											<div class="row mb-3">
												<div class="col-sm-12">
													<?= $this->Form->control('json', ['id' => 'json', 'label' => false, 'class' => 'summernote', 'empty' => false]); ?>

												</div>
											</div>
										</div><!-- /.TabPanel: tabPanelJson -->

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
										["controller" => "Albums", "action" => "index", "_full" => true],
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
	jeffAdminInitSummerNote('notes', 400, '<?= __("Here you can write the note") ?>...') // Init SummerNote for notes.
	jeffAdminInitSummerNote('json', 400, '<?= __("Here you can write the note") ?>...') // Init SummerNote for json.
	jeffAdminInitDateTimePicker('last-used')
	jeffAdminInitICheck('icheckbox_flat-blue');

	$(document).ready( function(){
		$('#button-submit').click( function(){
			$('#main-form').submit();
		});			
	});			

<?php $this->Html->scriptEnd(['block' => 'javaScriptBottom']); ?>
