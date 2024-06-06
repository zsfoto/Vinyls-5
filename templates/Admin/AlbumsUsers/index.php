<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\AlbumsUser> $albumsUsers
 */
use Cake\Core\Configure;

$layoutAlbumsUsersLastId = -1;
if($session->check('Layout.AlbumsUsers.LastId')){
	$layoutAlbumsUsersLastId = $session->read('Layout.AlbumsUsers.LastId');
}

$global_config = (array) Configure::read('Theme.' . $prefix . '.config.template.index');
$local_config = [
	'show_id' 			=> true,
	'show_pos' 			=> false,
	'show_counters'		=> false,
	'action_db_click'	=> 'edit',	// none, edit or view
	// ... more config params in: \JeffAdmin5\config\jeffadmin5.php
];
$config = array_merge($global_config, $local_config);
?>
				<div class="albumsUsers index row">
						
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<div class="card">
							<div class="card-header">
							
								<div class="float-start">
									<h3><i id="card-icon" class="fa fa-table fa-spin"></i> <?= __('Table') ?>: <?= __('Albums Users') ?></h3>
									<div><?php
										if($config['action_db_click'] == 'edit'){
											echo __('Double clik to edit row');
										}
										if($config['action_db_click'] == 'view'){
											echo __('Double clik to view row');
										}
									?></div>
								</div>
								
								<div class="float-end">
									<!-- Paginator page links -->
									<?= $this->element('JeffAdmin5.paginator') ?>
									<!-- /.Pginator page links -->
								</div>
								
							</div>

<?php ####################################################################################################################################################### ?>
<?php ###################### CARD BODY ###################################################################################################################### ?>
<?php ####################################################################################################################################################### ?>

							<div class="card-body p-0 p-1">
								
								<table class="table table-responsive-xl table-hover table-striped mb-0 text-nowrap" style="">
									<thead class="thead-info">
										<tr>
											<th class="row-id-anchor"></th>
<?php if($config['show_id']){ ?>
											<th class="number id"><?= $this->Paginator->sort('id') ?></th>
<?php } ?>
											<th class="string user-id"><?= $this->Paginator->sort('user_id') ?></th><!-- H.0. -->
											<th class="string album-id"><?= $this->Paginator->sort('album_id') ?></th><!-- H.0. -->
											<th class="string condition-id"><?= $this->Paginator->sort('condition_id') ?></th><!-- H.0. -->
											<th class="string shelf-id"><?= $this->Paginator->sort('shelf_id') ?></th><!-- H.0. -->
											<th class="integer custom-serial-number"><?= $this->Paginator->sort('custom_serial_number') ?></th><!-- H.3. -->
											<th class="date last-play"><?= $this->Paginator->sort('last_play') ?></th><!-- H.1. -->
											<th class="integer disk-A-condition-id"><?= $this->Paginator->sort('disk_A_condition_id') ?></th><!-- H.3. -->
											<th class="integer disk-B-condition-id"><?= $this->Paginator->sort('disk_B_condition_id') ?></th><!-- H.3. -->
											<th class="integer disk-C-condition-id"><?= $this->Paginator->sort('disk_C_condition_id') ?></th><!-- H.3. -->
											<th class="integer disk-D-condition-id"><?= $this->Paginator->sort('disk_D_condition_id') ?></th><!-- H.3. -->
											<th class="integer disk-E-condition-id"><?= $this->Paginator->sort('disk_E_condition_id') ?></th><!-- H.3. -->
											<th class="integer disk-F-condition-id"><?= $this->Paginator->sort('disk_F_condition_id') ?></th><!-- H.3. -->
											<th class="integer disk-G-condition-id"><?= $this->Paginator->sort('disk_G_condition_id') ?></th><!-- H.3. -->
											<th class="integer disk-H-condition-id"><?= $this->Paginator->sort('disk_H_condition_id') ?></th><!-- H.3. -->
											<th class="boolean generic"><?= $this->Paginator->sort('generic') ?></th><!-- H.1. -->
											<th class="string name-from"><?= $this->Paginator->sort('name_from') ?></th><!-- H.1. -->
											<th class="string address-from"><?= $this->Paginator->sort('address_from') ?></th><!-- H.1. -->
											<th class="string phone-from"><?= $this->Paginator->sort('phone_from') ?></th><!-- H.1. -->
											<th class="string email-from"><?= $this->Paginator->sort('email_from') ?></th><!-- H.1. -->
											<th class="integer price-from"><?= $this->Paginator->sort('price_from') ?></th><!-- H.3. -->
											<th class="string name-sold"><?= $this->Paginator->sort('name_sold') ?></th><!-- H.1. -->
											<th class="string address-sold"><?= $this->Paginator->sort('address_sold') ?></th><!-- H.1. -->
											<th class="string phone-sold"><?= $this->Paginator->sort('phone_sold') ?></th><!-- H.1. -->
											<th class="string email-sold"><?= $this->Paginator->sort('email_sold') ?></th><!-- H.1. -->
											<th class="integer price-sold"><?= $this->Paginator->sort('price_sold') ?></th><!-- H.3. -->
											<th class="datetime last-used"><?= $this->Paginator->sort('last_used') ?></th><!-- H.1. -->
<?php if($config['show_pos']){ ?>
											<th class="number pos"><?= $this->Paginator->sort('pos') ?></th>
<?php } ?>
<?php if($config['show_visible']){ ?>
											<th class="boolean visible"><?= $this->Paginator->sort('visible') ?></th>
<?php } ?>
<?php if($config['show_counters']){ ?>
											<th class="number counter play_count"><?= $this->Paginator->sort('play_count') ?></th><?php } ?>
<?php if($config['show_created'] || $config['show_modified']){ ?>

											<th class="datetime created modified">
												<?php 
													if($config['show_created']){ 
														echo $this->Paginator->sort('created');
													}
													if($config['show_created'] && $config['show_modified']){
														echo "&nbsp;/&nbsp;";
													}
													if($config['show_modified']){
														echo $this->Paginator->sort('modified');
													} ?>

											</th>
<?php } ?>
<?php if($config['show_button_view'] || $config['show_button_edit'] || $config['show_button_delete'] ){ ?>
											<th class="actions"><?= __('Actions') ?></th>
<?php } ?>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($albumsUsers as $albumsUser): ?>
<?php
	//$classLastVisited = ' class="last-visited"';	// later...
	//$classLastVisited = '';
?>

										<tr row-id="<?= $albumsUser->id ?>"<?php if($albumsUser->id == $layoutAlbumsUsersLastId){ echo 'class="table-tr-last-id"'; } ?>" prefix="<?= $prefix ?>" controller="<?= $controller ?>" action="<?= $action ?>" aria-expanded="true">
											<td class="row-id-anchor" value="<?= $albumsUser->id ?>"><a name="<?= $albumsUser->id ?>" class="anchor"></a></td>
<?php if($config['show_id']){ ?>
											<td class="number id" value="<?= $albumsUser->id ?>"><?= h($albumsUser->id) ?><a name="<?= $albumsUser->id ?>"></a></td>
<?php } ?>
											<td class="string link user-id" value="<?= $albumsUser->user_id ?>"><?= $albumsUser->hasValue('user') ? $this->Html->link($albumsUser->user->name, ['controller' => 'Users', 'action' => 'view', $albumsUser->user->id]) : '' ?><span class="external-link-icon"><i class="fa fa-external-link" aria-hidden="true"></i></span></td>
											<td class="string link album-id" value="<?= $albumsUser->album_id ?>"><?= $albumsUser->hasValue('album') ? $this->Html->link($albumsUser->album->name, ['controller' => 'Albums', 'action' => 'view', $albumsUser->album->id]) : '' ?><span class="external-link-icon"><i class="fa fa-external-link" aria-hidden="true"></i></span></td>
											<td class="string link condition-id" value="<?= $albumsUser->condition_id ?>"><?= $albumsUser->hasValue('condition') ? $this->Html->link($albumsUser->condition->name, ['controller' => 'Conditions', 'action' => 'view', $albumsUser->condition->id]) : '' ?><span class="external-link-icon"><i class="fa fa-external-link" aria-hidden="true"></i></span></td>
											<td class="string link shelf-id" value="<?= $albumsUser->shelf_id ?>"><?= $albumsUser->hasValue('shelf') ? $this->Html->link($albumsUser->shelf->name, ['controller' => 'Shelves', 'action' => 'view', $albumsUser->shelf->id]) : '' ?><span class="external-link-icon"><i class="fa fa-external-link" aria-hidden="true"></i></span></td>
											<td class="integer custom-serial-number" value="<?= $albumsUser->custom_serial_number ?>"><?= $this->Number->format($albumsUser->custom_serial_number, ['places' => 0, 'precision' => 0, 'before' => '', 'after' => '']) ?></td>
											<td class="date last-play" value="<?= $albumsUser->last_play ?>"><?= h($albumsUser->last_play) ?></td>
											<td class="integer disk-A-condition-id" value="<?= $albumsUser->disk_A_condition_id ?>"><?= $this->Number->format($albumsUser->disk_A_condition_id, ['places' => 0, 'precision' => 0, 'before' => '', 'after' => '']) ?></td>
											<td class="integer disk-B-condition-id" value="<?= $albumsUser->disk_B_condition_id ?>"><?= $this->Number->format($albumsUser->disk_B_condition_id, ['places' => 0, 'precision' => 0, 'before' => '', 'after' => '']) ?></td>
											<td class="integer disk-C-condition-id" value="<?= $albumsUser->disk_C_condition_id ?>"><?= $this->Number->format($albumsUser->disk_C_condition_id, ['places' => 0, 'precision' => 0, 'before' => '', 'after' => '']) ?></td>
											<td class="integer disk-D-condition-id" value="<?= $albumsUser->disk_D_condition_id ?>"><?= $this->Number->format($albumsUser->disk_D_condition_id, ['places' => 0, 'precision' => 0, 'before' => '', 'after' => '']) ?></td>
											<td class="integer disk-E-condition-id" value="<?= $albumsUser->disk_E_condition_id ?>"><?= $this->Number->format($albumsUser->disk_E_condition_id, ['places' => 0, 'precision' => 0, 'before' => '', 'after' => '']) ?></td>
											<td class="integer disk-F-condition-id" value="<?= $albumsUser->disk_F_condition_id ?>"><?= $this->Number->format($albumsUser->disk_F_condition_id, ['places' => 0, 'precision' => 0, 'before' => '', 'after' => '']) ?></td>
											<td class="integer disk-G-condition-id" value="<?= $albumsUser->disk_G_condition_id ?>"><?= $this->Number->format($albumsUser->disk_G_condition_id, ['places' => 0, 'precision' => 0, 'before' => '', 'after' => '']) ?></td>
											<td class="integer disk-H-condition-id" value="<?= $albumsUser->disk_H_condition_id ?>"><?= $this->Number->format($albumsUser->disk_H_condition_id, ['places' => 0, 'precision' => 0, 'before' => '', 'after' => '']) ?></td>
											<td class="boolean generic" value="<?= $albumsUser->generic ?>"><?= h($albumsUser->generic) ?></td>
											<td class="string name-from" value="<?= $albumsUser->name_from ?>"><?= h($albumsUser->name_from) ?></td>
											<td class="string address-from" value="<?= $albumsUser->address_from ?>"><?= h($albumsUser->address_from) ?></td>
											<td class="string phone-from" value="<?= $albumsUser->phone_from ?>"><?= h($albumsUser->phone_from) ?></td>
											<td class="string email-from" value="<?= $albumsUser->email_from ?>"><?= h($albumsUser->email_from) ?></td>
											<td class="integer price-from" value="<?= $albumsUser->price_from ?>"><?= $this->Number->format($albumsUser->price_from, ['places' => 0, 'precision' => 0, 'before' => '', 'after' => '']) ?></td>
											<td class="string name-sold" value="<?= $albumsUser->name_sold ?>"><?= h($albumsUser->name_sold) ?></td>
											<td class="string address-sold" value="<?= $albumsUser->address_sold ?>"><?= h($albumsUser->address_sold) ?></td>
											<td class="string phone-sold" value="<?= $albumsUser->phone_sold ?>"><?= h($albumsUser->phone_sold) ?></td>
											<td class="string email-sold" value="<?= $albumsUser->email_sold ?>"><?= h($albumsUser->email_sold) ?></td>
											<td class="integer price-sold" value="<?= $albumsUser->price_sold ?>"><?= $this->Number->format($albumsUser->price_sold, ['places' => 0, 'precision' => 0, 'before' => '', 'after' => '']) ?></td>
											<td class="datetime last-used" value="<?= $albumsUser->last_used ?>"><?= h($albumsUser->last_used) ?></td>
<?php if($config['show_pos']){ ?>
											<td class="number pos" value="<?= $albumsUser->pos ?>"><?= h($albumsUser->pos) ?></td>
<?php } ?>
<?php if($config['show_visible']){ ?>
											<td class="boolean visible" value="<?= $albumsUser->visible ?>"><?= h($albumsUser->visible) ?></td>
<?php } ?>
<?php if($config['show_counters']){ ?>
											<td class="number counter play-count" value="<?= $albumsUser->play_count ?>"><?= h($albumsUser->play_count) ?></td><?php } ?>
<?php if($config['show_created'] || $config['show_modified']){ ?>
											<td class="datetime">
<?php if($config['show_created']){ ?>
												<span class="fw-bold"><?= h($albumsUser->created) ?></span>
<?php } ?>
<?php if($config['show_created'] && $config['show_modified']){ ?>
												<br>
<?php } ?>
<?php if($config['show_modified']){ ?>
												<span class="fw-normal"><?= h($albumsUser->modified) ?></span>
<?php } ?>
											</td>
<?php } ?>
<?php if($config['show_button_view'] || $config['show_button_edit'] || $config['show_button_delete'] ){ ?>

											<td class="actions">
<?php if($config['show_button_view']){ ?>
												<?= $this->Html->link('<i class="fa fa-eye"></i>', ['action' => 'view', $albumsUser->id], ['escape' => false, 'role' => 'button', 'class' => 'btn btn-warning btn-sm', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => __('View this item'), 'data-original-title' => __('View this item')]) ?>
<?php } ?>

<?php if($config['show_button_edit']){ ?>
												<?= $this->Html->link('<i class="fa fa-edit"></i>', ['action' => 'edit', $albumsUser->id], ['escape' => false, 'role' => 'button', 'class' => 'btn btn-primary btn-sm', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => __('Edit this item'), 'data-original-title' => __('Edit this item')]) ?>
<?php } ?>

<?php if($config['show_button_delete']){ ?>
												<?= $this->Form->postLink('', ['action' => 'delete', $albumsUser->id], ['class'=>'hide-postlink index-delete-button-class']) ?>
												<a href="javascript:;" class="btn btn-sm btn-danger postlink-delete" data-bs-tooltip="tooltip" data-bs-placement="top" title="<?= __("Delete this record!") ?>" text="<?= h($albumsUser->name) ?>" subText="<?= __("You will not be able to revert this!") ?>" confirmButtonText="<?= __("Yes, delete it!") ?>" cancelButtonText="<?= __("Cancel") ?>"><i class="fa fa-minus"></i></a>

<?php } ?>

											</td>
<?php } ?>
										</tr>
										<?php endforeach; ?>

									</tbody>
								</table>

							</div>
							<div class="card-footer text-center">
								<div class="float-start">
									<?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?>
								</div>								
								<div class="float-end mb-1">							
									<?= $this->element('jeffAdmin5.paginator') ?>
									
								</div>								
							</div>
						</div><!-- end card-->					
					</div>

				</div>			

	<?php
	if(isset($config['index_show_actions']) && $config['index_show_actions'] && isset($config['index_enable_delete']) && $config['index_enable_delete']){ 
		$this->Html->script(
			[
				'JeffAdmin5./assets/plugins/swettalert2/dist/sweetalert2.all.min',
			],
			['block' => 'scriptBottom']
		);
	}	
	?>

<?php $this->Html->scriptStart(['block' => 'javaScriptBottom']); ?>

	$(document).ready( function(){
		$('tr').dblclick( function(){
			let id = $(this).attr("row-id")
			window.location.href = '<?= $this->Url->build(['controller' => $controller, 'action' => $config['action_db_click']]) ?>/' + id;
		})

		// Fixing CakePhp's paginator numbers
		$('.page-link').each( function(){
			if($(this).text() == '1'){
				$(this).attr('href', $(this).attr('href') + '?page=1');
			}
		});
		
	})
<?php $this->Html->scriptEnd(); ?>



