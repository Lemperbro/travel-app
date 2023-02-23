function showPreview(event) {
    var input = event.target;
    for (var i = 0; i < input.files.length; i++) {
      let reader = new FileReader();
      reader.onload = function() {
        var dataURL = reader.result;
        var img = document.createElement('img');
        img.src = dataURL;
        img.className = 'previewImg w-56 h-56 object-cover ';
        var deleteButton = document.createElement('button');
        deleteButton.innerHTML = 'Hapus';
        deleteButton.className = 'deleteButton text-center text-white bg-red-600 p-2 rounded-md inline-block mx-auto';
        var div = document.createElement('div');
        div.appendChild(img);
        div.appendChild(deleteButton);
        deleteButton.addEventListener("click", function(){
          deletePreview(div);
        });

        var previewContainer = document.getElementById('previewContainer');
        previewContainer.appendChild(div);
      };
      reader.readAsDataURL(input.files[i]);
    }
  }
  
  function deletePreview(img) {
    var input = document.getElementById('image');
    var previewContainer = document.getElementById('previewContainer');
    var index = Array.prototype.indexOf.call(previewContainer.childNodes, img); // Mendapatkan indeks elemen img
    previewContainer.removeChild(img);
    previewContainer.removeChild(previewContainer.childNodes[index]); // Menghapus elemen button yang sesuai
    input.files[index] = null; // Menghapus file dari daftar file yang dipilih
  }
  