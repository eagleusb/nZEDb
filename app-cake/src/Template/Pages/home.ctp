<?php
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;

//$this->extend('/Common/view');

$this->assign('title', 'Home');
$this->set('statusbar', '');
//$cell = $this->cell('Statusbar::display', []);
//$this->assign('statusbar', $cell->render());


?>
<?php //var_dump($cell->items) ?>

<div class="columns large-12 text-center">
		<p>Find out more about <?= $this->Html->link('nZEDb', 'http://nzedb.com') ?></a></p>
	</div>