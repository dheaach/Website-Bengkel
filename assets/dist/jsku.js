
//hapus
	$('.tombol-hapus').on('click', function(e) {

		e.preventDefault();
		const href = $(this).attr('href');

		Swal.fire({
  			title: 'Apakah anda yakin?',
  			text: "Ingin menghapus data!",
  			type: 'warning',
  			showCancelButton: true,
  			confirmButtonColor: '#3085d6',
  			cancelButtonColor: '#d33',
  			confirmButtonText: 'Hapus Data!'
		}).then((result) => {
  			if (result.value) {
    			document.location.href = href;
            Swal.fire(
              'Terhapus!',
              'Data anda telah berhasil dihapus!',
              'success'
            )
 		  	}
		})

	});