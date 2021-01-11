// $(document).ready(function () {
//     $('#category_id_hihi').click(function () {
//         //var category_id = $(this).attr('data-id');
//         //console.log(category_id);
//         var category_id = this.value;
//
//         //Gọi ajax sử dụng jQuery
//         $.ajax({
//             //đường dẫn mvc xử lý ajax
//             url: 'index.php?controller=product&action=addParent',
//             // phương thức gửi dữ liệu
//             method: 'GET',
//             // dữ liệu gửi lên
//             data: {
//                 category_id: category_id
//             },
//             // nơi nhận kết quả trả về từ url, tất cả dữ liệu
//             //đó đc lưu trong tham số data của hàm
//             success: function(data) {
//                 console.log(data);
//             }
//         });
//     });
// });

$(document).ready(function () {

  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        $('#img-preview').attr('src', e.target.result).show();
      }
      reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
  }


    //Chọn file thì sẽ show ảnh thumbnail lên
    $('input[type=file]').change(function () {
        readURL(this);
    });

  CKEDITOR.replace('description', {
    //đường dẫn đến file ckfinder.html của ckfinder
    filebrowserBrowseUrl: 'assets/ckfinder/ckfinder.html',
    //đường dẫn đến file connector.php của ckfinder
    filebrowserUploadUrl: 'assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
  });

    CKEDITOR.replace('summary', {
        //đường dẫn đến file ckfinder.html của ckfinder
        filebrowserBrowseUrl: 'assets/ckfinder/ckfinder.html',
        //đường dẫn đến file connector.php của ckfinder
        filebrowserUploadUrl: 'assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
    });

});