jQuery(document).ready(function($) {

	$('.a1').datepicker({ 
		dateFormat: 'yy-mm-dd',
		showButtonPanel: true,
		changeMonth: true,
		changeYear: true,
	});

	$('.a1').datepicker( "option", "showAnim",'drop');
	$('.a1').datepicker( "option", "yearRange", "1960:2040" );


	$('span#select-img').click(function(event) {
		$('#modal-image').modal();

		$('#modal-image').on('hide.bs.modal', function(event) {
			var Url = $('input#image').val();
			$('img#show-img').attr({
				'src': Url,
				'width': '150px',
				'height': '150px',
			});
		});		
	});

	$('a#delete-img').click(function(event) {
		$('input#image').val('');
		$('img#show-img').attr('src','');
	});
	
	$("#student-birthday").change(function(){
		
		var studentbirthday =  $("#student-birthday").val();
		var now  = $.datepicker.formatDate('yy-mm-dd', new Date());

		// alert(studentbirthday);
		//alert(now);
		// var today = $.datepicker.formatDate('yy-mm-dd', new Date())
		// var another_date = $("#student-birthday").val();

		// var startDate = parseDate(today).getTime();
		// var endDate = parseDate(another_date).getTime();
		 
		  if (studentbirthday > now) {
		    alert("Ngày sinh không thể lớn hơn ngày hiện tại");
		    $("#student-birthday").val('');
		  }
    });

    $(".dropdown-toggle").dropdown();


    // Trợ giúp khách hàng hiển thị ảnh lên
    $('button#button-img-help').click(function(event) {
    	$('#modal-image-help-student').modal();
    });
    // Trợ giúp khách hàng hiển thị ảnh lên form student-class
    $('button#button-img-help-student-class').click(function(event) {
    	$('#modal-image-help-studentclass').modal();
    });
    // Trợ giúp khách hàng hiển thị ảnh lên form study
    $('button#button-img-help-study').click(function(event) {
        $('#modal-image-help-study').modal();
    });

    // Form xếp lớp cho học sinh.Chọn năm sẽ Ajax ra lớp tương ứung
    $('#select-year-studentclass').change(function(event) {
    	var year_studentclass = $('#select-year-studentclass').val();
    	var href = $('#href').attr('href');
    	// alert(href);
    	$.ajax({
    		url: href,
    		type: 'GET',
    		data: {year_id: year_studentclass},
    		success:function(res){

                $('#studentclass-id_classroom').html(res);
                $('#study-id_classroom').html(res);
    			$('#conduct-id_classroom').html(res);

    		}
    	})

   	
    });

    // Chô phần search from xếp lớp học sinh
    $('#select-year-studentclass2').change(function(event) {
        var year_studentclass = $('#select-year-studentclass2').val();
        var href = $('#href').attr('href');
        // alert(href);
        $.ajax({
            url: href,
            type: 'GET',
            data: {year_id: year_studentclass},
            success:function(res){

                // $('#studentclass-id_classroom').html(res);
                $('#student_class_filter').html(res);
            }
        })
    });

     // Chô phần search from nhập điểm học sinh
    $('#select-year-studentclass3').change(function(event) {
        var year_studentclass = $('#select-year-studentclass3').val();
        var href = $('#href').attr('href');
        // alert(href);
        $.ajax({
            url: href,
            type: 'GET',
            data: {year_id: year_studentclass},
            success:function(res){

                // $('#studentclass-id_classroom').html(res);
                $('#study_class_filter').html(res);
                $('#study_class_filter2').html(res);
            }
        })
    });

    // Form tạo mới kết quả cho học sinh.Chọn khối sẽ ra môn học tương ứng
    $('#select-block-studentclass').change(function(event) {
        var block_subject = $('#select-block-studentclass').val();
        var href = $('#href2').attr('href');
        // alert(href);
        $.ajax({
            url: href,
            type: 'GET',
            data: {block_id: block_subject},
            success:function(res){

                $('#study-id_subject').html(res);
                $('#study_subject_filter').html(res);
            }
        })
    });

    // Form tạo mới kết quả cho học sinh.Chọn lớp sẽ render ra danh sách học sinh
    $('#study-id_classroom').change(function(event) {
        var class_room = $('#study-id_classroom').val();
        var href = $('#href3').attr('href');

        var href2 = $('#href2').attr('href'); // Chỗ này đến cái hàm actionGetallsubjectbyblock2 để xử lí việc lấy luôn phía dưới

        $.ajax({
            url: href,
            type: 'GET',
            data: {classroom_id: class_room},
            success:function(res){

                $('#study-id_student').html(res);
                // $('#conduct-id_student').html(res);   cái này cùa form dưới
            }
        })

        // Xử lí luôn việc lick vào lớp sẽ render ra ngay các môn học của khối chứa lớp đấy

         $.ajax({
            url: href2,
            type: 'GET',
            data: {classroom_id: class_room},
            success:function(res){
                $('#study-id_subject').html(res);
            }
        })


    });

    // Form tạo mới hạnh kiểm cho học sinh.Chọn lớp sẽ render ra danh sách học sinh
    $('#conduct-id_classroom').change(function(event) {
        var class_room = $('#conduct-id_classroom').val();
        var href = $('#href3').attr('href');

        $.ajax({
            url: href,
            type: 'GET',
            data: {classroom_id: class_room},
            success:function(res){

                // $('#study-id_student').html(res);  cái này của cái trên
                $('#conduct-id_student').html(res);
            }
        })
    });

    //Xử lí phần tính điểm tự động
    $('a#tinh-diem-tu-dong').click(function(event) {
        var class_submit = $('#study_class_filter2').val();
        var term_submit = $('#select-term-study').val();
        if(class_submit == ''){
            alert('Bạn cần phải chọn lớp muốn tính điểm');
            return false;
        }else if(term_submit == ''){
            alert('Bạn cần phải chọn kì học');
            return false;
        } else {
            if (confirm("Xác nhận : Bạn có muốn thực hiện tính điểm trung bình tự động không?\n\nBạn hãy chắc chắn rằng đã có đủ thông tin về điểm của tất cả học sinh trong lớp mà bạn muốn tính !")) {
                var href = $('a#tinh-diem-tu-dong').attr('href');
                href = href +"&class_submit="+class_submit+"&term_submit="+term_submit;
                $('a#tinh-diem-tu-dong').attr("href",href);
                return true;
            }
            return false;
        }
    });

    // Xử lý phần tính điểm cả năm
    $('a#tinh-tong-ket-ca-nam').click(function(event) {
        var class_submit = $('#study_class_filter2').val();
        if(class_submit == ''){
            alert('Bạn cần phải chọn lớp muốn tính điểm tổng kết');
            return false;
        }else {
            if (confirm("Xác nhận : Bạn có muốn thực hiện tính điểm tổng kết tự động không?\n\nBạn hãy chắc chắn rằng đã có đủ thông tin về điểm của tất cả học sinh trong lớp mà bạn muốn tính !")) {
                var href = $('a#tinh-tong-ket-ca-nam').attr('href');
                href = href +"&class_submit="+class_submit;
                $('a#tinh-tong-ket-ca-nam').attr("href",href);
                return true;
            }
            return false;
        }
    });

    // Sử lý phần báo cáo điểm tổng kết theo lớp
    $('a#thong-ke-diem-tong-ket-theo-lop').click(function(event) {
        var class_submit = $('#study_class_filter2').val();
        if(class_submit == ''){
            alert('Bạn cần phải chọn lớp muốn tính điểm tổng kết');
            return false;
        }else {
            if (confirm("Xác nhận : Bạn có muốn thực hiện xuất báo cáo cho lớp đã chọn không?\n\nBạn hãy chắc chắn rằng đã có đủ thông tin về điểm tổng của tất cả học sinh trong lớp mà bạn muốn tính !")) {
                var href = $('a#thong-ke-diem-tong-ket-theo-lop').attr('href');
                href = href +"&class_submit="+class_submit;
                $('a#thong-ke-diem-tong-ket-theo-lop').attr("href",href);
                return true;
            }
            return false;
        }
    });

});

