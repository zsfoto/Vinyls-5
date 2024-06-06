<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\AlbumsUsersAbbreviation> $albumsUsersAbbreviations
 */
use Cake\Core\Configure;

$layoutAlbumsUsersAbbreviationsLastId = -1;
if($session->check('Layout.AlbumsUsersAbbreviations.LastId')){
	$layoutAlbumsUsersAbbreviationsLastId = $session->read('Layout.AlbumsUsersAbbreviations.LastId');
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
				<div class="albumsUsersAbbreviations index row">
						
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<div class="card">
							<div class="card-header">
							
								<div class="float-start">
									<h3><i id="card-icon" class="fa fa-table fa-spin"></i> <?= __('Table') ?>: <?= __('Albums Users Abbreviations') ?></h3>
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
											<th class="string albums-user-id"><?= $this->Paginator->sort('albums_user_id') ?></th><!-- H.0. -->
											<th class="string abbreviation-id"><?= $this->Paginator->sort('abbreviation_id') ?></th><!-- H.0. -->
											<th class="datetime last-used"><?= $this->Paginator->sort('last_used') ?></th><!-- H.1. -->
<?php if($config['show_pos']){ ?>
											<th class="number pos"><?= $this->Paginator->sort('pos') ?></th>
<?php } ?>
<?php if($config['show_visible']){ ?>
											<th class="boolean visible"><?= $this->Paginator->sort('visible') ?></th>
<?php } ?>
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
										<?php foreach ($albumsUsersAbbreviations as $albumsUsersAbbreviation): ?>
<?php
	//$classLastVisited = ' class="last-visited"';	// later...
	//$classLastVisited = '';
?>

										<tr row-id="<?= $albumsUsersAbbreviation->id ?>"<?php if($albumsUsersAbbreviation->id == $layoutAlbumsUsersAbbreviationsLastId){ echo 'class="table-tr-last-id"'; } ?>" prefix="<?= $prefix ?>" controller="<?= $controller ?>" action="<?= $action ?>" aria-expanded="true">
											<td class="row-id-anchor" value="<?= $albumsUsersAbbreviation->id ?>"><a name="<?= $albumsUsersAbbreviation->id ?>" class="anchor"></a></td>
<?php if($config['show_id']){ ?>
											<td class="number id" value="<?= $albumsUsersAbbreviation->id ?>"><?= h($albumsUsersAbbreviation->id) ?><a name="<?= $albumsUsersAbbreviation->id ?>"></a></td>
<?php } ?>
											<td class="string link albums-user-id" value="<?= $albumsUsersAbbreviation->albums_user_id ?>"><?= $albumsUsersAbbreviation->hasValue('albums_user') ? $this->Html->link($albumsUsersAbbreviation->albums_user->id, ['controller' => 'AlbumsUsers', 'action' => 'view', $albumsUsersAbbreviation->albums_user->id]) : '' ?><span class="external-link-icon"><i class="fa fa-external-link" aria-hidden="true"></i></span></td>
											<td class="string link abbreviation-id" value="<?= $albumsUsersAbbreviation->abbreviation_id ?>"><?= $albumsUsersAbbreviation->hasValue('abbreviation') ? $this->Html->link($albumsUsersAbbreviation->abbreviation->name, ['controller' => 'Abbreviations', 'action' => 'view', $albumsUsersAbbreviation->abbreviation->id]) : '' ?><span class="external-link-icon"><i class="fa fa-external-link" aria-hidden="true"></i></span></td>
											<td class="datetime last-used" value="<?= $albumsUsersAbbreviation->last_used ?>"><?= h($albumsUsersAbbreviation->last_used) ?></td>
<?php if($config['show_pos']){ ?>
											<td class="number pos" value="<?= $albumsUsersAbbreviation->pos ?>"><?= h($albumsUsersAbbreviation->pos) ?></td>
<?php } ?>
<?php if($config['show_visible']){ ?>
											<td class="boolean visible" value="<?= $albumsUsersAbbreviation->visible ?>"><?= h($albumsUsersAbbreviation->visible) ?></td>
<?php } ?>
<?php if($config['show_created'] || $config['show_modified']){ ?>
											<td class="datetime">
<?php if($config['show_created']){ ?>
												<span class="fw-bold"><?= h($albumsUsersAbbreviation->created) ?></span>
<?php } ?>
<?php if($config['show_created'] && $config['show_modified']){ ?>
												<br>
<?php } ?>
<?php if($config['show_modified']){ ?>
												<span class="fw-normal"><?= h($albumsUsersAbbreviation->modified) ?></span>
<?php } ?>
											</td>
<?php } ?>
<?php if($config['show_button_view'] || $config['show_button_edit'] || $config['show_button_delete'] ){ ?>

											<td class="actions">
<?php if($config['show_button_view']){ ?>
												<?= $this->Html->link('<i class="fa fa-eye"></i>', ['action' => 'view', $albumsUsersAbbreviation->id], ['escape' => false, 'role' => 'button', 'class' => 'btn btn-warning btn-sm', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => __('View this item'), 'data-original-title' => __('View this item')]) ?>
<?php } ?>

<?php if($config['show_button_edit']){ ?>
												<?= $this->Html->link('<i class="fa fa-edit"></i>', ['action' => 'edit', $albumsUsersAbbreviation->id], ['escape' => false, 'role' => 'button', 'class' => 'btn btn-primary btn-sm', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => __('Edit this item'), 'data-original-title' => __('Edit this item')]) ?>
<?php } ?>

<?php if($config['show_button_delete']){ ?>
												<?= $this->Form->postLink('', ['action' => 'delete', $albumsUsersAbbreviation->id], ['class'=>'hide-postlink index-delete-button-class']) ?>
												<a href="javascript:;" class="btn btn-sm btn-danger postlink-delete" data-bs-tooltip="tooltip" data-bs-placement="top" title="<?= __("Delete this record!") ?>" text="<?= h($albumsUsersAbbreviation->name) ?>" subText="<?= __("You will not be able to revert this!") ?>" confirmButtonText="<?= __("Yes, delete it!") ?>" cancelButtonText="<?= __("Cancel") ?>"><i class="fa fa-minus"></i></a>

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



