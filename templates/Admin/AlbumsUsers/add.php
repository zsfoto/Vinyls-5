<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AlbumsUser $albumsUser
 * @var \Cake\Collection\CollectionInterface|string[] $users
 * @var \Cake\Collection\CollectionInterface|string[] $albums
 * @var \Cake\Collection\CollectionInterface|string[] $conditions
 * @var \Cake\Collection\CollectionInterface|string[] $shelves
 * @var \Cake\Collection\CollectionInterface|string[] $abbreviations
 */
?>
<?php
use Cake\Core\Configure;
use Cake\I18n\FrozenTime;

$this->Form->setTemplates(Configure::read('Templates.form'));
$this->assign('title', __('Add') . ' ' . __('Albums User'));
?>
				<div id="form-row" class="albumsUsers row">
					<div class="col-xs-12 col-xl-10">
						<div class="card mb-3">
							<div class="card-header">

								<div class="float-start">
									<h3><i id="card-icon" class="fa fa-plus fa-spin"></i> <?= __('Add') ?>: <?= __('Albums User') ?></h3>
									<?= __('The data marked with <span class="fw-bold text-danger">*</span> must be provided!') ?>
								</div>

								<div class="float-end ms-5">
									<?= $this->Html->link('<span class="btn btn-outline-secondary mt-1 me-1"><i class="fa fa-times"></i></span>',
										["controller" => "Albums Users", "action" => "index", "_full" => true],
										["escape" => false, "role" => "button"]
									); ?>

								</div>

								<div class="form-tab float-end">
									<ul class="nav nav-tabs mt-1" id="myTab" role="tablist">
										<li class="nav-item" role="presentation">
											<button class="nav-link active" id="tabMain" data-bs-toggle="tab" data-bs-target="#tabPanelMain" type="button" role="tab" aria-controls="tabPanelMain" aria-selected="true"><?= __('Basic data') ?></button>
										</li>

										<li class="nav-item" role="presentation">
											<button class="nav-link" id="tabComment" data-bs-toggle="tab" data-bs-target="#tabPanelComment" type="button" role="tab" aria-controls="tabPanelComment" aria-selected="false"><?= __('Comment') ?></button>
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

							<?= $this->Form->create($albumsUser, ['id' => 'main-form']) ?>
							
								<?php //= $this->Form->control('_csrfToken', ['name' => '_csrfToken', 'type' => 'hidden', 'value' => $this->request->getAttribute('csrfToken')] ) ?>

								<div class="card-body">
								
									<div class="tab-content" id="tabContent">
										
										<div class="tab-pane fade show active" id="tabPanelMain" role="tabpanel" aria-labelledby="tabMain" tabindex="0">

											<!-- 1. SELECT: user_id: string  required -->
											<div class="mb-3 form-group row select required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end required" for="user-id"><?= __('User Id') ?>:</label>
												<div class="col-md-4">
													<?= $this->Form->control('user_id', ['options' => $users, 'placeholder' => __('User Id'), 'class' => 'form-control select2', 'data-live-search' => false, 'data-container' => 'body', 'data-size' => '6', 'empty' => false]);	?>

												</div>
											</div>

											<!-- 1. SELECT: album_id: string  required -->
											<div class="mb-3 form-group row select required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end required" for="album-id"><?= __('Album Id') ?>:</label>
												<div class="col-md-4">
													<?= $this->Form->control('album_id', ['options' => $albums, 'placeholder' => __('Album Id'), 'class' => 'form-control select2', 'data-live-search' => false, 'data-container' => 'body', 'data-size' => '6', 'empty' => false]);	?>

												</div>
											</div>

											<!-- 1. SELECT: condition_id: integer  required -->
											<div class="mb-3 form-group row select required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end required" for="condition-id"><?= __('Condition Id') ?>:</label>
												<div class="col-md-4">
													<?= $this->Form->control('condition_id', ['options' => $conditions, 'placeholder' => __('Condition Id'), 'class' => 'form-control select2', 'data-live-search' => false, 'data-container' => 'body', 'data-size' => '6', 'empty' => false]);	?>

												</div>
											</div>

											<!-- 1. SELECT: shelf_id: integer  required -->
											<div class="mb-3 form-group row select required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end required" for="shelf-id"><?= __('Shelf Id') ?>:</label>
												<div class="col-md-4">
													<?= $this->Form->control('shelf_id', ['options' => $shelves, 'placeholder' => __('Shelf Id'), 'class' => 'form-control select2', 'data-live-search' => false, 'data-container' => 'body', 'data-size' => '6', 'empty' => false]);	?>

												</div>
											</div>

											<!-- 3. INTEGER: custom_serial_number: integer  required -->
											<div class="mb-3 form-group row number required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end required" for="custom-serial-number"><?= __('Custom Serial Number') ?>:</label>
												<div class="col-xs-12 col-sm-12 col-md-5 col-lg-4 col-xl-4 col-xxl-4">
													<?= $this->Form->control('custom_serial_number', ['class' => 'form-control', 'placeholder' => __('Custom Serial Number'), 'data-decimals' => '0', 'min' => '0', 'max' => '999999999999', 'step' => '1', 'empty' => false]); ?>

												</div>
											</div>

											<!-- 5. DATE: last_play: date  -->
											<div class="mb-3 row required">
												<label class="pt-2 col-form-label col-md-2 pt-1 text-start text-md-end" for="last-play"><?= __('Last Play') ?>:</label>
												<div class="col-xs-12 col-sm-12 col-md-5 col-lg-4 col-xl-4 col-xxl-4">
													<div class="form-group date">
														<div class="input-group last-play" id="last-play" data-target-input="nearest">
															<?= $this->Form->control('last_play', ['type' => 'text', 'placeholder' => __('Last Play'), 'class' => 'form-control', 'empty' => true]); ?>

															<div class="input-group-append" data-target="#last-play" data-toggle="last-play">
																<div class="input-group-text"><i class="fa fa-calendar"></i></div>
															</div>
														</div>
													</div>
												</div>
											</div>

											<!-- 3. INTEGER: disk_A_condition_id: integer  required -->
											<div class="mb-3 form-group row number required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end required" for="disk-A-condition-id"><?= __('Disk A Condition Id') ?>:</label>
												<div class="col-xs-12 col-sm-12 col-md-5 col-lg-4 col-xl-4 col-xxl-4">
													<?= $this->Form->control('disk_A_condition_id', ['class' => 'form-control', 'placeholder' => __('Disk A Condition Id'), 'data-decimals' => '0', 'min' => '0', 'max' => '999999999999', 'step' => '1', 'empty' => false]); ?>

												</div>
											</div>

											<!-- 3. INTEGER: disk_B_condition_id: integer  required -->
											<div class="mb-3 form-group row number required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end required" for="disk-B-condition-id"><?= __('Disk B Condition Id') ?>:</label>
												<div class="col-xs-12 col-sm-12 col-md-5 col-lg-4 col-xl-4 col-xxl-4">
													<?= $this->Form->control('disk_B_condition_id', ['class' => 'form-control', 'placeholder' => __('Disk B Condition Id'), 'data-decimals' => '0', 'min' => '0', 'max' => '999999999999', 'step' => '1', 'empty' => false]); ?>

												</div>
											</div>

											<!-- 3. INTEGER: disk_C_condition_id: integer  required -->
											<div class="mb-3 form-group row number required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end required" for="disk-C-condition-id"><?= __('Disk C Condition Id') ?>:</label>
												<div class="col-xs-12 col-sm-12 col-md-5 col-lg-4 col-xl-4 col-xxl-4">
													<?= $this->Form->control('disk_C_condition_id', ['class' => 'form-control', 'placeholder' => __('Disk C Condition Id'), 'data-decimals' => '0', 'min' => '0', 'max' => '999999999999', 'step' => '1', 'empty' => false]); ?>

												</div>
											</div>

											<!-- 3. INTEGER: disk_D_condition_id: integer  required -->
											<div class="mb-3 form-group row number required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end required" for="disk-D-condition-id"><?= __('Disk D Condition Id') ?>:</label>
												<div class="col-xs-12 col-sm-12 col-md-5 col-lg-4 col-xl-4 col-xxl-4">
													<?= $this->Form->control('disk_D_condition_id', ['class' => 'form-control', 'placeholder' => __('Disk D Condition Id'), 'data-decimals' => '0', 'min' => '0', 'max' => '999999999999', 'step' => '1', 'empty' => false]); ?>

												</div>
											</div>

											<!-- 3. INTEGER: disk_E_condition_id: integer  required -->
											<div class="mb-3 form-group row number required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end required" for="disk-E-condition-id"><?= __('Disk E Condition Id') ?>:</label>
												<div class="col-xs-12 col-sm-12 col-md-5 col-lg-4 col-xl-4 col-xxl-4">
													<?= $this->Form->control('disk_E_condition_id', ['class' => 'form-control', 'placeholder' => __('Disk E Condition Id'), 'data-decimals' => '0', 'min' => '0', 'max' => '999999999999', 'step' => '1', 'empty' => false]); ?>

												</div>
											</div>

											<!-- 3. INTEGER: disk_F_condition_id: integer  required -->
											<div class="mb-3 form-group row number required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end required" for="disk-F-condition-id"><?= __('Disk F Condition Id') ?>:</label>
												<div class="col-xs-12 col-sm-12 col-md-5 col-lg-4 col-xl-4 col-xxl-4">
													<?= $this->Form->control('disk_F_condition_id', ['class' => 'form-control', 'placeholder' => __('Disk F Condition Id'), 'data-decimals' => '0', 'min' => '0', 'max' => '999999999999', 'step' => '1', 'empty' => false]); ?>

												</div>
											</div>

											<!-- 3. INTEGER: disk_G_condition_id: integer  required -->
											<div class="mb-3 form-group row number required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end required" for="disk-G-condition-id"><?= __('Disk G Condition Id') ?>:</label>
												<div class="col-xs-12 col-sm-12 col-md-5 col-lg-4 col-xl-4 col-xxl-4">
													<?= $this->Form->control('disk_G_condition_id', ['class' => 'form-control', 'placeholder' => __('Disk G Condition Id'), 'data-decimals' => '0', 'min' => '0', 'max' => '999999999999', 'step' => '1', 'empty' => false]); ?>

												</div>
											</div>

											<!-- 3. INTEGER: disk_H_condition_id: integer  required -->
											<div class="mb-3 form-group row number required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end required" for="disk-H-condition-id"><?= __('Disk H Condition Id') ?>:</label>
												<div class="col-xs-12 col-sm-12 col-md-5 col-lg-4 col-xl-4 col-xxl-4">
													<?= $this->Form->control('disk_H_condition_id', ['class' => 'form-control', 'placeholder' => __('Disk H Condition Id'), 'data-decimals' => '0', 'min' => '0', 'max' => '999999999999', 'step' => '1', 'empty' => false]); ?>

												</div>
											</div>

											<!-- 7. BOOLEAN: generic: boolean  required -->
											<div class="mb-3 form-group row checkbox">
												<div class="col-sm-2 col-form-label required"></div>
												<div class="col-sm-10">
													<?= $this->Form->control('generic', ['empty' => false]); ?>

												</div>
											</div>

											<!-- 2. STRING: name_from: string  required -->
											<div class="mb-3 form-group row text required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end required" for="name-from"><?= __('Name From') ?>:</label>
												<div class="col-md-9">
													<?= $this->Form->control('name_from', ['label' => __('Name From'), 'placeholder' => __('Name From'), 'class' => 'form-control', 'empty' => false]); ?>

												</div>
											</div>

											<!-- 2. STRING: address_from: string  required -->
											<div class="mb-3 form-group row text required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end required" for="address-from"><?= __('Address From') ?>:</label>
												<div class="col-md-9">
													<?= $this->Form->control('address_from', ['label' => __('Address From'), 'placeholder' => __('Address From'), 'class' => 'form-control', 'empty' => false]); ?>

												</div>
											</div>

											<!-- 2. STRING: phone_from: string  required -->
											<div class="mb-3 form-group row text required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end required" for="phone-from"><?= __('Phone From') ?>:</label>
												<div class="col-md-9">
													<?= $this->Form->control('phone_from', ['label' => __('Phone From'), 'placeholder' => __('Phone From'), 'class' => 'form-control', 'empty' => false]); ?>

												</div>
											</div>

											<!-- 2. STRING: email_from: string  required -->
											<div class="mb-3 form-group row text required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end required" for="email-from"><?= __('Email From') ?>:</label>
												<div class="col-md-9">
													<?= $this->Form->control('email_from', ['label' => __('Email From'), 'placeholder' => __('Email From'), 'class' => 'form-control', 'empty' => false]); ?>

												</div>
											</div>

											<!-- 3. INTEGER: price_from: integer  required -->
											<div class="mb-3 form-group row number required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end required" for="price-from"><?= __('Price From') ?>:</label>
												<div class="col-xs-12 col-sm-12 col-md-5 col-lg-4 col-xl-4 col-xxl-4">
													<?= $this->Form->control('price_from', ['class' => 'form-control', 'placeholder' => __('Price From'), 'data-decimals' => '0', 'min' => '0', 'max' => '999999999999', 'step' => '1', 'empty' => false]); ?>

												</div>
											</div>

											<!-- 2. STRING: name_sold: string  required -->
											<div class="mb-3 form-group row text required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end required" for="name-sold"><?= __('Name Sold') ?>:</label>
												<div class="col-md-9">
													<?= $this->Form->control('name_sold', ['label' => __('Name Sold'), 'placeholder' => __('Name Sold'), 'class' => 'form-control', 'empty' => false]); ?>

												</div>
											</div>

											<!-- 2. STRING: address_sold: string  required -->
											<div class="mb-3 form-group row text required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end required" for="address-sold"><?= __('Address Sold') ?>:</label>
												<div class="col-md-9">
													<?= $this->Form->control('address_sold', ['label' => __('Address Sold'), 'placeholder' => __('Address Sold'), 'class' => 'form-control', 'empty' => false]); ?>

												</div>
											</div>

											<!-- 2. STRING: phone_sold: string  required -->
											<div class="mb-3 form-group row text required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end required" for="phone-sold"><?= __('Phone Sold') ?>:</label>
												<div class="col-md-9">
													<?= $this->Form->control('phone_sold', ['label' => __('Phone Sold'), 'placeholder' => __('Phone Sold'), 'class' => 'form-control', 'empty' => false]); ?>

												</div>
											</div>

											<!-- 2. STRING: email_sold: string  required -->
											<div class="mb-3 form-group row text required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end required" for="email-sold"><?= __('Email Sold') ?>:</label>
												<div class="col-md-9">
													<?= $this->Form->control('email_sold', ['label' => __('Email Sold'), 'placeholder' => __('Email Sold'), 'class' => 'form-control', 'empty' => false]); ?>

												</div>
											</div>

											<!-- 3. INTEGER: price_sold: integer  required -->
											<div class="mb-3 form-group row number required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end required" for="price-sold"><?= __('Price Sold') ?>:</label>
												<div class="col-xs-12 col-sm-12 col-md-5 col-lg-4 col-xl-4 col-xxl-4">
													<?= $this->Form->control('price_sold', ['class' => 'form-control', 'placeholder' => __('Price Sold'), 'data-decimals' => '0', 'min' => '0', 'max' => '999999999999', 'step' => '1', 'empty' => false]); ?>

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

										</div><!-- /.tabPanelMain -->
										
										
										<!-- TabPanel: tabPanelComment -->
										<!-- 10. TEXT: comment: text  required -->
										<div class="tab-pane fade" id="tabPanelComment" role="tabpanel" aria-labelledby="tabComment" tabindex="0">
											<div class="row mb-3">
												<div class="col-sm-12">
													<?= $this->Form->control('comment', ['id' => 'comment', 'label' => false, 'class' => 'summernote', 'empty' => false]); ?>

												</div>
											</div>
										</div><!-- /.TabPanel: tabPanelComment -->

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
										["controller" => "Albums Users", "action" => "index", "_full" => true],
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
	jeffAdminInitSummerNote('comment', 400, '<?= __("Here you can write the note") ?>...') // Init SummerNote for comment.
	jeffAdminInitDatePicker('last_play')
	jeffAdminInitDateTimePicker('last_used')
	jeffAdminInitICheck('icheckbox_flat-blue');

	$(document).ready( function(){
		$('#button-submit').click( function(){
			$('#main-form').submit();
		});			
	});			

<?php $this->Html->scriptEnd(['block' => 'javaScriptBottom']); ?>
