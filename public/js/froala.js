var editor = new FroalaEditor('#isi', {



  contentStyles: {
    'ol': 'list-style-type: decimal;',
    // Tambahkan definisi CSS lain sesuai kebutuhan Anda
  },


  // Konfigurasi unggah gambar
  imageUploadURL: '/upload_image_froala',
  imageUploadParams: {
    _token: $('meta[name="csrf-token"]').attr('content')
  },
  imageUploadMethod: 'POST'

});