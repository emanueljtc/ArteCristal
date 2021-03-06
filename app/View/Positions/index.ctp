
<div>


		<div id="page-wrapper">

				<div class="container-fluid">
						<!-- Page Heading -->
						<div class="row">
								<div class="col-lg-12">
									<marquee loop="1" SCROLLAMOUNT="25" behavior = "slide" direction="left">
												<Titulo>
														<h3>Lista de Cargos</h3><hr>
												</Titulo>
										</marquee>
										<ol class="breadcrumb">
												<li>
														<i class="fa fa-dashboard"></i>  <a href="index.html">Inicio</a>
												</li>
												<li class="active">
														<i class="fa fa-table"></i> Lista de Cargos</li>
										</ol>
								</div>
						</div>

<!-- /.row -->

						<div class="row">
								<div class="col-lg-12">

										<div class="table-responsive">
												<table class="table table-bordered table-hover">
														<thead>
																<tr>
			<th><?php echo $this->Paginator->sort('cargo'); ?></th>
			<th><?php echo $this->Paginator->sort('horas trabajadas'); ?></th>
			<th><?php echo $this->Paginator->sort('valor de la Hora'); ?></th>
			<th><?php echo $this->Paginator->sort('Salario Diario'); ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($positions as $position): ?>
	<tr>

		<td><?php echo h($position['Position']['position']); ?>&nbsp;</td>
		<td><?php echo h($position['Position']['hour_worked']); ?>&nbsp;Horas</td>
		<td><?php echo h($position['Position']['time_value']); ?>&nbsp;bs</td>
		<td><?php echo h($position['Position']['daily_salary']); ?>&nbsp;bs</td>
		<td class="actions">
			<?php echo $this->Html->link(__(''), array('action' => 'view', $position['Position']['id']), array('class' => 'glyphicon glyphicon-search')); ?>
			<?php echo $this->Html->link(__(''), array('action' => 'edit', $position['Position']['id']), array('class' => 'glyphicon glyphicon-edit')); ?>
			<?php echo $this->Form->postLink('<i class="fa fa-trash-o fa-fw"></i> ' . __(''), array('action' => 'delete', $position['Position']['id']), array('escape' => false), __('Seguro quieres eliminar este Cargo?', $position['Position']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
</div>
								</div>


						</div>
						<!-- /.bloque -->

				</div>
				<!-- /.contenedor-->

		</div>
		<!-- /#page-wrapper -->

</div>
	<center>
				<paginador><!-- etiqueta personalidad-->
						<?php echo $this->element('paginador');?>
				</paginador>
				</center>
</div>

<div class="btn-group btn-group-justified">

				<?php echo $this->Html->link(__('Añadir Cargo'), array('action' => 'add'), array('class' => 'btn btn-info')); ?>
				<?php echo $this->Html->link(__('Exportar Lista Cargos'), array('action' => 'lista_pdf' , $position['Position']['id'], 'ext' => 'pdf' ), array('class' => 'btn btn-danger')); ?>
				<?php echo $this->Html->link(__('Nuevo Personal'), array('controller' => 'personals', 'action' => 'add'), array('class' => 'btn btn-primary')); ?>
</div>
