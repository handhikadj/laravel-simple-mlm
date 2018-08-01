(function(){

	$(window).on('load', function(){
        $('#forminline').hide();
        $('#showloader').hide();
        $('#showloaderautocomp').hide();
        $('#showboxdelete').fadeOut(1750);
        $('#minda-table_filter').addClass('underline-wrapper');
        $('#minda-table_filter input').addClass('borb-1');
        $('#minda-table_filter label').append('<span class="input-cari"></span>');
	});

	$(function() {

		$( "#tabs" ).tabs({
			hide: { effect: "slide", duration: 300},
			show: { effect: "slide",
						direction: "right",
						duration: 300}
		});

		$('#tambahModal').on('show.bs.modal', function (e) {
	   		$('#showloader').hide();
	  	});

		var table = $('#minda-table').DataTable({
			processing: true,
			serverSide: true,
			ajax: "/datatableApi",
			columns: [
			    {data: 'no_peserta', name: 'pesertas.no_peserta', orderable: false, searchable: false },
			    {data: 'nama_peserta', name: 'pesertas.nama_peserta'},
			    {data: 'nama_promotor', name: 'promotors.nama_promotor'},
			    {data: 'action', name: 'action', orderable: false, searchable: false },
			],
			language: {
				"sProcessing":   "<i class='fas fa-spinner fa-spin fa-5x'></i>",
				"sLengthMenu":   "Tampilkan _MENU_ entri",
				"sZeroRecords":  "Tidak ditemukan data yang sesuai",
				"sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
				"sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 entri",
				"sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",

				"sInfoPostFix":  "",
				"sSearch":       "Cari:",
				"sUrl":          "",
				"oPaginate": {
					"sFirst":    "Pertama",
					"sPrevious": '<i class="fas fa-angle-double-left fa-lg"></i>',
					"sNext":     '<i class="fas fa-angle-double-right fa-lg"></i>',
					"sLast":     "Terakhir"
				}
			},
			searchDelay: 500,
		});

		$('#tambahModal').on('hidden.bs.modal', function(event) {
			$('#id').val('');
			$('#nama_forpromotor').val('');
			$('#nama_peserta').val('');
			$('#nama_angktpromotor').val('');
			$('#errorsangkatpromotor').text('');
			$('#nama_angktpromotor').removeClass('wrong-data-tab animated flash').addClass('borb-1');
			$('#errorspromotor').removeClass('animated fadeIn').text('');
			$('#errorsangkatpromotor').removeClass('animated fadeIn').text('');
			$('#nama_forpromotor').removeClass('wrong-data-tab animated flash').addClass('borb-1');
		});

		$('#form-tambahpeserta').on('submit', function (e) {
			e.preventDefault();
			$('#tabs').fadeOut('500');

			$.ajax({
	            url : 'peserta',
	            method : 'POST',
	            data: new FormData($(this)[0]),
	            contentType: false,
	            processData: false,
	            success : function(data) {
	                $('#showloader').show('500');

					setTimeout(function(){
	                	$('#showloader').fadeOut('500');
	                }, 500);
	                table.ajax.reload();
	                setTimeout(function(){
	            		$('#tambahModal').modal('hide');
	            		$(".modal-backdrop").remove();                	
	            		$('#tabs').show();
		                swal({
		                    title: 'Success!',
		                    text: 'Berhasil',
		                    type: 'success',
		                    timer: '2000',
		                    animation: false,
		                    customClass: 'animated fadeIn'
		                })
	                }, 550);
	            },
	            error : function(data){
	                $('#tabs').show();
	                $('#nama_forpromotor').removeClass('borb-1').addClass('wrong-data-tab animated flash');
	            	var message = data.responseJSON.errors.nama_promotor[0];
	            	$('#errorspromotor').addClass('animated fadeIn').text(message);
	            }
        	}); // end of ajax

        	return false;
		});

		$('#form-tambahpromotor').on('submit', function (e) {
			e.preventDefault();

			$('#tabs').fadeOut('500');

			$.ajax({
	            url : 'promotor',
	            method : 'POST',
	            data: new FormData($(this)[0]),
	            contentType: false,
	            processData: false,
	            success : function(data) {
	            	$('#showloader').show('500');

					setTimeout(function(){
	                	$('#showloader').fadeOut('500');
	                }, 500);
	                table.ajax.reload();
	                setTimeout(function(){
	            		$('#tambahModal').modal('hide');
	            		$(".modal-backdrop").remove();                	
	            		$('#tabs').show();
		                swal({
		                    title: 'Success!',
		                    text: 'Berhasil',
		                    type: 'success',
		                    timer: '2000',
		                    animation: false,
		                    customClass: 'animated fadeIn'
		                })
	                }, 550);
	            },
	            error : function(data){
	            	$('#tabs').show();
	            	$('#nama_angktpromotor').removeClass('borb-1').addClass('wrong-data-tab animated flash');
	            	var message = data.responseJSON.errors.nama_angktpromotor[0];
	            	$('#errorsangkatpromotor').addClass('animated fadeIn').text(message);
	            }
        	}); // end of ajax
		});

		$('#minda-table').on('click', '.getdata', function(event) {
			/* Act on the event */
			event.preventDefault();

			$('.formtambahupdate').removeAttr('id', 'form-tambah').attr('id', 'form-update');
			$('.modal-header h3').text('Update Peserta');

			var 	id = $(this).attr('rel');
			
			$('#showboxdelete').fadeIn('100');
			$.ajax({
				url: "promotor" + '/' + id + "/edit",
				method : "GET",
				dataType: "JSON",
				success: function(data) {
					$('#id').val(id);
					$('#showboxdelete').fadeOut('100');
					$('#tambahModal').modal('show');
					$.each(data, function(index, val){
						$('#nama_promotor').val(val.nama_promotor);
						$('#nama_peserta').val(val.nama_peserta);
					});
				},
				error : function() {
					setTimeout(function(){
		                swal({
		                    title: 'Oops...',
		                    text: 'Terjadi Error',
		                    type: 'error',
		                    animation: false,
		                    customClass: 'animated tada'
	                	})
	                }, 120);
				}
			});
		});

		$('#minda-table').on('click', '.deletedata', function(event) {
			/* Act on the event */
			event.preventDefault();

			var  id = $(this).attr('rel'),
					csrf_token	= $('meta[name="csrf-token"]').attr('content');
			swal({				
				title: 'Ingin menghapus data?',
				type: 'warning',
				showCancelButton: true,
				cancelButtonColor: '#ddd',
				confirmButtonColor: '#3085d6',
				confirmButtonText: 'Hapus',
				showLoaderOnConfirm: true,
				preConfirm: function() {
					return $.ajax({
						url : "peserta/" + id,
						method : "POST",
						data : {'_method' : 'DELETE', '_token' : csrf_token},
						success : function(data) {
							table.ajax.reload();
							setTimeout(function() {
								swal({
									title: 'Success!',
				                    text: 'Berhasil',
				                    type: 'success',
				                    timer: '2000',
				                    animation: false,
				                    customClass: 'animated fadeIn'
								})
							}, 150);
						},
						error : function (data) {
							swal({
								title: 'Oops...',
			                    text: 'Terjadi Error',
			                    type: 'error',
			                    animation: false,
			                    customClass: 'animated tada'
							})
						}
					});						
				}
			});
		});

		var valpromotor = $("#nama_forpromotor");

		valpromotor.autocomplete({
			classes: {
				"ui-autocomplete" : "ui-my-class"
			},
			source: function(request, response){
				$.ajax({
                    url: 'caripromotor/' +  valpromotor.val(),
                    type: 'get',
                    dataType: "json",         
                    success: function(data) {
	                    response( $.map (data, function( item ) {
                    		return { 
                    			label: item.nama_promotor, 
                    			value: item.nama_promotor,
                    			id:  item.id
                    		}
	                    }));
                    },
                    error: function() {
                    	swal({
							title: 'Oops...',
		                    text: 'Terjadi Error',
		                    type: 'error',
		                    animation: false,
		                    customClass: 'animated tada'
						})
                    }
              	});
			},
			minLength: 2,
			select: function(event, ui) {
				$('#id').val(ui.item.id)
			},
			response: function(event, ui) {
				var regex = new RegExp(/^ [a-zA-z\s]+$/);
				if (regex.test(event.target.value)) {
					var noResult2 = { value:"", label:"Kata Mengandung Spasi di Depannya" };
					ui.content.push(noResult2);
				}
				if (!ui.content.length) {
					var noResult = { value:"", label:"Nama Promotor Tidak Ditemukan" };
					ui.content.push(noResult);
				}

				
			}
		});

		var valangkatpromotor = $("#nama_angktpromotor");

		valangkatpromotor.autocomplete({
			classes: {
				"ui-autocomplete" : "ui-my-class"
			},
			source: function(request, response){
				$.ajax({
                    url: 'caripeserta/' +  valangkatpromotor.val(),
                    type: 'get',
                    dataType: "json",         
                    success: function(data) {
	                    response( $.map (data, function( item ) {
                    		return { 
                    			label: item.nama_peserta, 
                    			value: item.nama_peserta,
                    		}
	                    }));
                    },
                    error: function() {
                    	swal({
							title: 'Oops...',
		                    text: 'Terjadi Error',
		                    type: 'error',
		                    animation: false,
		                    customClass: 'animated tada'
						})
                    }
              	});
			},
			minLength: 2,
			response: function(event, ui) {
				var regex = new RegExp(/^ [a-zA-z\s]+$/);
				if (regex.test(event.target.value)) {
					var noResult2 = { value:"", label:"Kata Mengandung Spasi di Depannya" };
					ui.content.push(noResult2);
				}
				if (!ui.content.length) {
					var noResult = { value:"", label:"Nama Peserta Tidak Ditemukan" };
					ui.content.push(noResult);
				}
			}
		});


	});
	// end of document ready

})(); 
// end of IIFE