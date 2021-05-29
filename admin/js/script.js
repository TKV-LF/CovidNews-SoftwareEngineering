$(document).ready(function(){
    $('#btn_search').click(function(){
        var search = $('#search_box').val();
        if(search!=""){
            $.ajax({
                type: 'POST',
                url: 'student/search_student.php',
                data: {
                    item:search
                },
                dataType: 'json',
                success:function(res){
                
                  $('#student_list').empty();
                  $('#student_list').append( "<tr>")
                  $('#student_list').append( "<td>"+res[0]['id']+"</td>")
                  $('#student_list').append( "<td>"+res[0]['name']+"</td>")
                  $('#student_list').append( "<td>"+res[0]['birthday']+"</td>")
                  $('#student_list').append( "<td>"+res[0]['phone']+"</td>")
                  $('#student_list').append( "<td>"+res[0]['class']+"</td>")
                  $('#student_list').append( "<td>"+res[0]['addres']+"</td>") 
                  $('#student_list').append( "<td>"+res[0]['email']+"</td>") 
                  $('#student_list').append( "<td>"+res[0]['status']+"</td>")                  
                  $('#student_list').append( '<td class="form-group"><a href="student/delete_hocvien.php?id='+res[0]['id']+'" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a></td>')
                  $('#student_list').append( "</tr>")
                }
              })
        }
    })
})