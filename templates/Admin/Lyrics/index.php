<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Lyric> $lyrics
 */
use Cake\Core\Configure;

$layoutLyricsLastId = -1;
if($session->check('Layout.Lyrics.LastId')){
	$layoutLyricsLastId = $session->read('Layout.Lyrics.LastId');
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
				<div class="lyrics index row">
						
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<div class="card">
							<div class="card-header">
							
								<div class="float-start">
									<h3><i id="card-icon" class="fa fa-table fa-spin"></i> <?= __('Table') ?>: <?= __('Lyrics') ?></h3>
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
											<th class="string tracklist-id"><?= $this->Paginator->sort('tracklist_id') ?></th><!-- H.0. -->
											<th class="string httpGetUrl"><?= $this->Paginator->sort('httpGetUrl') ?></th><!-- H.1. -->
											<th class="string TrackId"><?= $this->Paginator->sort('TrackId') ?></th><!-- H.1. -->
											<th class="string LyricChecksum"><?= $this->Paginator->sort('LyricChecksum') ?></th><!-- H.1. -->
											<th class="string LyricId"><?= $this->Paginator->sort('LyricId') ?></th><!-- H.1. -->
											<th class="string LyricSong"><?= $this->Paginator->sort('LyricSong') ?></th><!-- H.1. -->
											<th class="string LyricArtist"><?= $this->Paginator->sort('LyricArtist') ?></th><!-- H.1. -->
											<th class="string LyricUrl"><?= $this->Paginator->sort('LyricUrl') ?></th><!-- H.1. -->
											<th class="string LyricCovertArtUrl"><?= $this->Paginator->sort('LyricCovertArtUrl') ?></th><!-- H.1. -->
											<th class="string LyricRank"><?= $this->Paginator->sort('LyricRank') ?></th><!-- H.1. -->
											<th class="string LyricCorrectUrl"><?= $this->Paginator->sort('LyricCorrectUrl') ?></th><!-- H.1. -->
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
										<?php foreach ($lyrics as $lyric): ?>
<?php
	//$classLastVisited = ' class="last-visited"';	// later...
	//$classLastVisited = '';
?>

										<tr row-id="<?= $lyric->id ?>"<?php if($lyric->id == $layoutLyricsLastId){ echo 'class="table-tr-last-id"'; } ?>" prefix="<?= $prefix ?>" controller="<?= $controller ?>" action="<?= $action ?>" aria-expanded="true">
											<td class="row-id-anchor" value="<?= $lyric->id ?>"><a name="<?= $lyric->id ?>" class="anchor"></a></td>
<?php if($config['show_id']){ ?>
											<td class="number id" value="<?= $lyric->id ?>"><?= h($lyric->id) ?><a name="<?= $lyric->id ?>"></a></td>
<?php } ?>
											<td class="string link tracklist-id" value="<?= $lyric->tracklist_id ?>"><?= $lyric->hasValue('tracklist') ? $this->Html->link($lyric->tracklist->title, ['controller' => 'Tracklists', 'action' => 'view', $lyric->tracklist->id]) : '' ?><span class="external-link-icon"><i class="fa fa-external-link" aria-hidden="true"></i></span></td>
											<td class="string httpGetUrl" value="<?= $lyric->httpGetUrl ?>"><?= h($lyric->httpGetUrl) ?></td>
											<td class="string TrackId" value="<?= $lyric->TrackId ?>"><?= h($lyric->TrackId) ?></td>
											<td class="string LyricChecksum" value="<?= $lyric->LyricChecksum ?>"><?= h($lyric->LyricChecksum) ?></td>
											<td class="string LyricId" value="<?= $lyric->LyricId ?>"><?= h($lyric->LyricId) ?></td>
											<td class="string LyricSong" value="<?= $lyric->LyricSong ?>"><?= h($lyric->LyricSong) ?></td>
											<td class="string LyricArtist" value="<?= $lyric->LyricArtist ?>"><?= h($lyric->LyricArtist) ?></td>
											<td class="string LyricUrl" value="<?= $lyric->LyricUrl ?>"><?= h($lyric->LyricUrl) ?></td>
											<td class="string LyricCovertArtUrl" value="<?= $lyric->LyricCovertArtUrl ?>"><?= h($lyric->LyricCovertArtUrl) ?></td>
											<td class="string LyricRank" value="<?= $lyric->LyricRank ?>"><?= h($lyric->LyricRank) ?></td>
											<td class="string LyricCorrectUrl" value="<?= $lyric->LyricCorrectUrl ?>"><?= h($lyric->LyricCorrectUrl) ?></td>
											<td class="datetime last-used" value="<?= $lyric->last_used ?>"><?= h($lyric->last_used) ?></td>
<?php if($config['show_pos']){ ?>
											<td class="number pos" value="<?= $lyric->pos ?>"><?= h($lyric->pos) ?></td>
<?php } ?>
<?php if($config['show_visible']){ ?>
											<td class="boolean visible" value="<?= $lyric->visible ?>"><?= h($lyric->visible) ?></td>
<?php } ?>
<?php if($config['show_created'] || $config['show_modified']){ ?>
											<td class="datetime">
<?php if($config['show_created']){ ?>
												<span class="fw-bold"><?= h($lyric->created) ?></span>
<?php } ?>
<?php if($config['show_created'] && $config['show_modified']){ ?>
												<br>
<?php } ?>
<?php if($config['show_modified']){ ?>
												<span class="fw-normal"><?= h($lyric->modified) ?></span>
<?php } ?>
											</td>
<?php } ?>
<?php if($config['show_button_view'] || $config['show_button_edit'] || $config['show_button_delete'] ){ ?>

											<td class="actions">
<?php if($config['show_button_view']){ ?>
												<?= $this->Html->link('<i class="fa fa-eye"></i>', ['action' => 'view', $lyric->id], ['escape' => false, 'role' => 'button', 'class' => 'btn btn-warning btn-sm', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => __('View this item'), 'data-original-title' => __('View this item')]) ?>
<?php } ?>

<?php if($config['show_button_edit']){ ?>
												<?= $this->Html->link('<i class="fa fa-edit"></i>', ['action' => 'edit', $lyric->id], ['escape' => false, 'role' => 'button', 'class' => 'btn btn-primary btn-sm', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => __('Edit this item'), 'data-original-title' => __('Edit this item')]) ?>
<?php } ?>

<?php if($config['show_button_delete']){ ?>
												<?= $this->Form->postLink('', ['action' => 'delete', $lyric->id], ['class'=>'hide-postlink index-delete-button-class']) ?>
												<a href="javascript:;" class="btn btn-sm btn-danger postlink-delete" data-bs-tooltip="tooltip" data-bs-placement="top" title="<?= __("Delete this record!") ?>" text="<?= h($lyric->name) ?>" subText="<?= __("You will not be able to revert this!") ?>" confirmButtonText="<?= __("Yes, delete it!") ?>" cancelButtonText="<?= __("Cancel") ?>"><i class="fa fa-minus"></i></a>

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



