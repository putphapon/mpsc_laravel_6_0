$(document).ready(function(){

    //delete_form
    $('.delete_form').on('submit', function(){
        if(confirm("ต้องการ ลบ ข้อมูลหรือไม่ ?")) {
            return true;
        } else {
            return false;
        }
    });


});