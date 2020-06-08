
 $('#calendar').datepicker({
    });

    !function ($) {
        $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
            $(this).find('em:first').toggleClass("glyphicon-minus");      
        }); 
        $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
    }(window.jQuery);

    $(window).on('resize', function () {
      if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
    })
    $(window).on('resize', function () {
      if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
    })

function ChangeToSlug()

{
    var title, slug;
 
    //Lấy text từ thẻ input title 
    title = document.getElementById("title-name").value;
 
    //Đổi chữ hoa thành chữ thường
    slug = title.toLowerCase();
 
    //Đổi ký tự có dấu thành không dấu
    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
    slug = slug.replace(/đ/gi, 'd');
    //Xóa các ký tự đặt biệt
    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
    //Đổi khoảng trắng thành ký tự gạch ngang
    slug = slug.replace(/ /gi, "-");
    //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
    //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
    slug = slug.replace(/\-\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-/gi, '-');
    slug = slug.replace(/\-\-/gi, '-');
    //Xóa các ký tự gạch ngang ở đầu và cuối
    slug = '@' + slug + '@';
    slug = slug.replace(/\@\-|\-\@|\@/gi, '');
    //In slug ra textbox có id “slug”
    document.getElementById('slug').value = slug;
}


function searchNews() {

  const inputSearch = document.getElementById('inputSearchNew');
  const tableContent = document.getElementById('tbody-news');

  search(inputSearch,tableContent);
}

function searchCustomer() {

  const inputSearch = document.getElementById('inputSearchCustomer');
  const tableContent = document.getElementById('list-customer');

  //searchPhone(inputSearch,tableContent);
  search(inputSearch,tableContent);
}


function searchProduct() {

  const inputSearch = document.getElementById('inputSearchProduct');
  const tableContent = document.getElementById('list-products');

  search(inputSearch,tableContent);
}



function search(inputSearch,tableContent) {

  var input, filter, table, tr, td, i, txtValue;

  input = inputSearch;
  filter = input.value.toUpperCase();

  table = tableContent;
  
 console.log('test',Number.isNaN(Number(filter)) );

  tr = table.getElementsByTagName("tr");

  for (i = 0; i < tr.length; i++) {

    if (Number.isNaN(Number(filter)) === true) {

        td = tr[i].getElementsByTagName("td")[1];

     } else {
       td = tr[i].getElementsByTagName("td")[3];
     }

    
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

function readURL(imageUpload,input) {
  if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        imageUpload.attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
  }
}
        
$("#filename").change(function () {
  const imageUpload = $('#img_upload');
  readURL(imageUpload,this);
});

$("#file-blog").change(function () {
  const imageUpload = $('#img_upload');
  readURL(imageUpload,this);
});

$("#chose-image-banner-1").change(function () {
  const imageUpload = $('#img_upload_banner_1');
  readURL(imageUpload,this);
});

$("#chose-image-banner-2").change(function () {
 const imageUpload = $('#img_upload_banner_2');
  readURL(imageUpload,this);
});

$("#chose-image-banner-3").change(function () {
  const imageUpload = $('#img_upload_banner_3');
  readURL(imageUpload,this);
});

$("#chose-image-banner-4").change(function () {
   const imageUpload = $('#img_upload_banner_4');
  readURL(imageUpload,this);
});


var inputs = document.querySelectorAll('.file-input')

for (var i = 0, len = inputs.length; i < len; i++) {
  customInput(inputs[i])
}

function customInput (el) {

  const fileInput = el.querySelector('[type="file"]')
  const label = el.querySelector('[data-js-label]')
  
  fileInput.onchange =
  fileInput.onmouseout = function () {
    if (!fileInput.value) return
    
    var value = fileInput.value.replace(/^.*[\\\/]/, '')
    el.className += ' -chosen'
    label.innerText = value
  }
}


$( function() {
  $( "#datepicker" ).datepicker({
    dateFormat: "dd-mm-yy"
    , duration: "fast"
  });
} );