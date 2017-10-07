<!DOCTYPE html>
<html>
<head>
	<title>Data Administrasi</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class="content">
	    <div class="container-fluid">
	        <div class="row">
	            <div class="col-md-12">
	                <div class="card">
	                    <div class="card-content">
	                        <h4 class="card-title">Data Administrasi Indonesia</h4>
	                        
	                        <div class="table-responsive">
	                            <table id="Data" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
	                                <thead>
	                                    <tr id="table-head">
	                                        <th>Desa</th>
	                                        <th>Kecamatan</th>
	                                        <th>Kabupaten</th>
	                                        <th>Provinsi</th>
	                                        <th class="disabled-sorting text-right" width="7%"></th>
	                                    </tr>
	                                </thead>
	                                <tbody>
	                                    <!-- list data -->
	                                </tbody>
	                            </table>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"
			  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
			  crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#Data').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [],
        "pagingType": "full_numbers",
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],
        "oLanguage": {
            "sSearch": "<i class='fa fa-search fa-fw'></i> Pencarian : ",
            "sLengthMenu": "_MENU_ &nbsp;&nbsp;Data Perhalaman",
            "sInfo": "Menampilkan _START_ s/d _END_ dari _TOTAL_ data",
            "sInfoFiltered": "(filtered dari _MAX_ total data)",
            "oPaginate": {
                "sFirst": "Awal",
                "sLast": "Terakhir",
                "sNext": "Selanjutnya",
                "sPrevious": "Sebelumnya"
            },
            "sZeroRecords": "Data tidak ditemukan",
            "sEmptyTable": "Data kosong"
        },
        responsive: true,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Cari",
        },
        // Load data pake Ajax source
        "ajax": {
            "url": '<?=base_url()?>Home/ListData',
            "type": "POST",
            error: function(){
                $(".my-grid-error").html("");
                $("#my-grid").append('<tbody class="my-grid-error"><tr><td colspan="6">Error processing</td></tr></tbody>');
                $("#my-grid_processing").css("display","none");
            }
        },

        //set properties datatablenya
        "columnDefs": [
        {
            "targets": [ 0 ],
            "orderable": true,
        },
        ],

    });
 });
</script>
</html>