<?php echo get_header(); ?>
<div class="row content">
	<div class="col-md-12">
		<div class="panel panel-default panel-table">
			<div class="panel-body panel-filter">
				<form role="form" id="filter-form" accept-charset="utf-8" method="GET" action="<?php echo current_url(); ?>">
					<div class="filter-bar">
						<div class="form-inline">
							<div class="row">
								<div class="col-md-3 pull-right text-right">
									<div class="form-group">
										<input type="text" name="filter_search" class="form-control input-sm" value="<?php echo $filter_search; ?>" placeholder="<?php echo lang('text_filter_search'); ?>" />&nbsp;&nbsp;&nbsp;
									</div>
									<a class="btn btn-grey" onclick="filterList();" title="<?php echo lang('text_search'); ?>"><i class="fa fa-search"></i></a>
								</div>

								<div class="col-md-8 pull-left">
									<div class="form-group">
										<select name="filter_status" class="form-control input-sm">
											<option value=""><?php echo lang('text_filter_status'); ?></option>
										<?php if ($filter_status == '1') { ?>
											<option value="1" <?php echo set_select('filter_status', '1', TRUE); ?> ><?php echo lang('text_enabled'); ?></option>
											<option value="0" <?php echo set_select('filter_status', '0'); ?> ><?php echo lang('text_disabled'); ?></option>
										<?php } else if ($filter_status == '0') { ?>
											<option value="1" <?php echo set_select('filter_status', '1'); ?> ><?php echo lang('text_enabled'); ?></option>
											<option value="0" <?php echo set_select('filter_status', '0', TRUE); ?> ><?php echo lang('text_disabled'); ?></option>
										<?php } else { ?>
											<option value="1" <?php echo set_select('filter_status', '1'); ?> ><?php echo lang('text_enabled'); ?></option>
											<option value="0" <?php echo set_select('filter_status', '0'); ?> ><?php echo lang('text_disabled'); ?></option>
										<?php } ?>
										</select>
									</div>
									<a class="btn btn-grey" onclick="filterList();" title="<?php echo lang('text_filter'); ?>"><i class="fa fa-filter"></i></a>&nbsp;
									<a class="btn btn-grey" href="<?php echo page_url(); ?>" title="<?php echo lang('text_clear'); ?>"><i class="fa fa-times"></i></a>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>

			<form role="form" id="list-form" accept-charset="utf-8" method="POST" action="<?php echo current_url(); ?>">
				<div class="table-responsive">
				<table class="table table-striped table-border">
					<thead>
						<tr>
							<th class="action">
								<div class="checkbox checkbox-primary">
									<input type="checkbox" id="checkbox-all" class="styled" onclick="$('input[name*=\'delete\']').prop('checked', this.checked);">
									<label for="checkbox-all"></label>
								</div>
							</th>
							<th class="sorter"><a class="sort" href="<?php echo $sort_table_name; ?>"><?php echo lang('column_name'); ?><i class="fa fa-sort-<?php echo ($sort_by == 'table_name') ? $order_by_active : $order_by; ?>"></i></a></th>
							<th class="sorter"><a class="sort" href="<?php echo $sort_min_capacity; ?>"><?php echo lang('column_min_capacity'); ?><i class="fa fa-sort-<?php echo ($sort_by == 'min_capacity') ? $order_by_active : $order_by; ?>"></i></a></th>
							<th class="sorter"><a class="sort" href="<?php echo $sort_max_capacity; ?>"><?php echo lang('column_capacity'); ?><i class="fa fa-sort-<?php echo ($sort_by == 'max_capacity') ? $order_by_active : $order_by; ?>"></i></a></th>
							<th><?php echo lang('column_status'); ?></th>
							<th class="id"><a class="sort" href="<?php echo $sort_table_id; ?>"><?php echo lang('column_id'); ?><i class="fa fa-sort-<?php echo ($sort_by == 'table_id') ? $order_by_active : $order_by; ?>"></i></a></th>
						</tr>
					</thead>
					<tbody>
						<?php if ($tables) {?>
						<?php foreach ($tables as $table) { ?>
						<tr>
							<td class="action">
								<div class="checkbox checkbox-primary">
									<input type="checkbox" class="styled" id="checkbox-<?php echo $table['table_id']; ?>" value="<?php echo $table['table_id']; ?>" name="delete[]" />
									<label for="checkbox-<?php echo $table['table_id']; ?>"></label>
								</div>
								<a class="btn btn-edit" title="<?php echo lang('text_edit'); ?>" href="<?php echo $table['edit']; ?>"><i class="fa fa-pencil"></i></a></td>
							<td class="sorter"><?php echo $table['table_name']; ?></td>
							<td class="sorter"><?php echo $table['min_capacity']; ?></td>
							<td class="sorter"><?php echo $table['max_capacity']; ?></td>
							<td><?php echo ($table['table_status'] == '1') ? lang('text_enabled') : lang('text_disabled'); ?></td>
							<td class="id"><?php echo $table['table_id']; ?></td>
						</tr>
						<?php } ?>
						<?php } else { ?>
						<tr>
							<td colspan="6"><?php echo lang('text_empty'); ?></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
				</div>
			</form>

			<div class="pagination-bar row">
				<div class="links col-sm-8"><?php echo $pagination['links']; ?></div>
				<div class="info col-sm-4"><?php echo $pagination['info']; ?></div>
			</div>
		</div>
	</div>
</div>
<?php echo get_footer(); ?>