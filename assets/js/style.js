/* Base_url */
var base_url = $('#base_url').val();

/* Create Menu */
$('#add_menu').on('click', function (e) {
	e.preventDefault();

	var menu = $('#menu').val();

	if (menu == '') {
		alert('Kolom menu masih kosong, harap diisi!');
	} else {
		var fd = new FormData();

		fd.append('menu', menu);

		$.ajax({
			url: base_url + 'create',
			type: 'post',
			data: fd,
			processData: false,
			contentType: false,
			dataType: 'json',
			success: function (data) {
				if (data.res == 'success') {
					$('#menuModal').modal('hide');
					$('#formRecordMenu')[0].reset();
					$('#tb_menu').DataTable().destroy();
					fetch_menu();
					Swal.fire({
						title: "Successfully!",
						text: data.message,
						icon: "success"
					});
				} else {
					toastr["error"](data.message);
					toastr.options = {
						"closeButton": true,
						"debug": false,
						"newestOnTop": false,
						"progressBar": true,
						"positionClass": "toast-top-right",
						"preventDuplicates": false,
						"onclick": null,
						"showDuration": "300",
						"hideDuration": "1000",
						"timeOut": "5000",
						"extendedTimeOut": "1000",
						"showEasing": "swing",
						"hideEasing": "linear",
						"showMethod": "fadeIn",
						"hideMethod": "fadeOut"
					}
				}
			}
		});
		$('#formRecordMenu')[0].reset();
	}
})


/* Fetch Menu */
function fetch_menu() {
	$.ajax({
		url: base_url + 'fetch_menu',
		type: 'post',
		dataType: 'json',
		success: function (data) {
			var i = "1";
			$('#tb_menu').DataTable({
				data: data.post,
				responsive: true,
				columns: [
					{
						data: "id",
						render: function (data, type, row, meta) {
							return i++;
						},
					},
					{ data: "menu" },
					{
						orderable: false,
						searchable: false,
						data: function (row, type, set) {
							return `
							<div class="btn-group" role="group">
								<a class="btn btn-sm btn-primary rounded-left" href="${base_url + 'menu/e_menu/'}${row.id}" >Edit</a>
								<button class="btn btn-sm btn-danger rounded-right" type="button" id="delete_menu" value="${row.id}">Delete</button>
							</div>
							`
						}
					},
				]
			})
		},
	});
};
fetch_menu();


$(document).on('click', '#delete_menu', function (e) {
	e.preventDefault();

	var del_id = $(this).attr("value");

	const swalWithBootstrapButtons = Swal.mixin({
		customClass: {
			confirmButton: "btn btn-success",
			cancelButton: "btn btn-danger mr-2"
		},
		buttonsStyling: false
	});
	swalWithBootstrapButtons.fire({
		title: "Are you sure?",
		text: "You won't be able to revert this!",
		icon: "warning",
		showCancelButton: true,
		confirmButtonText: "Yes, delete it!",
		cancelButtonText: "No, cancel!",
		reverseButtons: true
	}).then((result) => {
		if (result.isConfirmed) {
			$.ajax({
				url: base_url + 'delete_menu',
				type: 'post',
				dataType: 'json',
				data: {
					del_id: del_id
				},
				success: function (data) {
					if (data.res == 'success') {
						$('#tb_menu').DataTable().destroy();
						fetch_menu();

						swalWithBootstrapButtons.fire({
							title: "Success!",
							text: data.message,
							icon: "success"
						});
					}
				}
			})

		} else if (
			/* Read more about handling dismissals below */
			result.dismiss === Swal.DismissReason.cancel
		) {
			swalWithBootstrapButtons.fire({
				title: "Cancelled",
				text: "Your imaginary file is safe 😊",
				icon: "error"
			});
		}
	});
})

/* Single Update */
$(document).on('click', '#edit', function (e) {
	e.preventDefault();

	var edit_id = $(this).attr('value');

	$.ajax({
		url: base_url + 'edit_menu',
		type: "post",
		dataType: "json",
		data: {
			edit_id: edit_id
		},
		success: function (data) {
			$('#editMenuModal').modal('show');
			$('#edit_id').val(data.post.id);
			$('#edit_menu').val(data.post.menu);
		}

	})
})

/* Update Menu */
$(document).on('click', '#update_menu', function (e) {
	e.preventDefault();

	var edit_id = $('#edit_id').val();
	var edit_menu = $('#edit_menu').val();

	if (edit_id == '' || edit_menu == '') {
		alert('Mohon kolom menu di isi!');
	} else {
		$.ajax({
			url: base_url + 'updated_menu',
			type: 'post',
			dataType: 'json',
			data: {
				edit_id: edit_id,
				edit_menu: edit_menu
			},
			success: function (data) {
				if (data.res == 'success') {
					$('#editMenuModal').modal('hide');
					$('#EditForm')[0].reset();
					$('#tb_menu').DataTable().destroy();
					fetch_menu();
					Swal.fire({
						title: "Successfully!",
						text: data.message,
						icon: "success"
					});
				} else {
					toastr["error"](data.message);
					toastr.options = {
						"closeButton": true,
						"debug": false,
						"newestOnTop": false,
						"progressBar": true,
						"positionClass": "toast-top-right",
						"preventDuplicates": false,
						"onclick": null,
						"showDuration": "300",
						"hideDuration": "1000",
						"timeOut": "5000",
						"extendedTimeOut": "1000",
						"showEasing": "swing",
						"hideEasing": "linear",
						"showMethod": "fadeIn",
						"hideMethod": "fadeOut"
					}
				}
			}
		})
	}
})
