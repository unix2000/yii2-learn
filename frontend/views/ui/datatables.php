<h1>datatables</h1>
<div class="uk-grid">
	<div class="uk-width-1-4"></div>
	<div class="uk-width-3-4">
		<table id="example" class="uk-table uk-table-hover uk-table-striped" cellspacing="0" width="99%">
			<thead>
				<tr>
					<th>ID</th>
					<th>中文名</th>
					<th>电子Email</th>
					<th>住址</th>
				</tr>
			</thead>
		</table>
	</div>
</div>

<?php
$js = <<< JS
	$('#example').DataTable({
		"processing": true,
        "serverSide": true,
        "ajax": '/ui/table-data',
		//object数据,加columns选项 
		"columns": [
            { "data": "id" },
            { "data": "name" },
            { "data": "email" },
            { "data": "address" }
        ],
		fixedHeader: {
            header: true, //参数无效
            footer: true
        },
		columnDefs: [ {
            orderable: false,
            className: 'select-checkbox',
            targets:   0
        } ],
        select: {
            style:    'os',
			blurable: true,
            selector: 'td:first-child'
        }
    });
JS;
$this->registerJs($js);