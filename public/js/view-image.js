// function showPreview(event) {
//   var input = event.target;
//   for (var i = 0; i < input.files.length; i++) {
//     let reader = new FileReader();
//     reader.onload = function() {
//       var dataURL = reader.result;
//       var img = document.createElement('img');
//       img.src = dataURL;
//       img.className = 'previewImg w-56 h-56 object-cover ';
//       var deleteButton = document.createElement('button');
//       deleteButton.innerHTML = 'Hapus';
//       deleteButton.className = 'deleteButton text-center text-white bg-red-600 p-2 rounded-md inline-block mx-auto';
//       var div = document.createElement('div');
//       div.appendChild(img);
//       div.appendChild(deleteButton);
//       deleteButton.addEventListener("click", function(){
//         deletePreview(div, input, i);
//       });

//       var previewContainer = document.getElementById('previewContainer');
//       previewContainer.appendChild(div);
//     };
//     reader.readAsDataURL(input.files[i]);
//   }
// }

// function deletePreview(div, input, index) {
//   var previewContainer = document.getElementById('previewContainer');
//   previewContainer.removeChild(div);
//   var files = Array.from(input.files); // membuat array dari file yang dipilih
//   files.splice(index, 1); // menghapus file dari array sesuai dengan index
//   input.value = ""; // reset value input file
//   for (var i = 0; i < files.length; i++) {
//     input.files.add(files[i]); // menambah kembali file yang belum dihapus
//   }
// }


var loadFile = function(event) {
  var imgCont = document.getElementById("previewContainer");
  console.log(event.target.files);
  for (let i = 0; i < event.target.files.length; i++) {
      var divElm = document.createElement('div');
      divElm.id = "rowdiv" + i;
      var spanElm = document.createElement('span');
      var image = document.createElement('img');
      image.src = URL.createObjectURL(event.target.files[i]);
      image.id = "output" + i;
      image.width = "200";
      spanElm.appendChild(image);
      var deleteImg = document.createElement('p');
      deleteImg.innerHTML = "x";
      deleteImg.onclick = function() {this.parentNode.remove()};
      divElm.appendChild(spanElm);
      divElm.appendChild(deleteImg);
      imgCont.appendChild(divElm);
  }
};



