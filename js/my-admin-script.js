/*
Using WordPress Media Uploader System with plugin settings
Author: oneTarek
Author URI: http://onetarek.com
*/
jQuery(document).ready(function() {
 
    var formfield;
 
    /* user clicks button on custom field, runs below code that opens new window */
    jQuery('.upload-button').click(function() { 
        formfield = jQuery(this).prev('input'); //The input field that will hold the uploaded file url
        tb_show('','media-upload.php?TB_iframe=true');
 
        return false;
 
    });
    /*
	Please keep these line to use this code snipet in your project
	Developed by oneTarek http://onetarek.com
	*/
    //adding my custom function with Thick box close function tb_close() .
    window.old_tb_remove = window.tb_remove;
    window.tb_remove = function() {
        window.old_tb_remove(); // calls the tb_remove() of the Thickbox plugin
        formfield=null;
    };
 
    // user inserts file into post. only run custom if user started process using the above process
    // window.send_to_editor(html) is how wp would normally handle the received data
 
    window.original_send_to_editor = window.send_to_editor;
    window.send_to_editor = function(html){
        if (formfield) {
            fileurl = jQuery('img',html).attr('src');
            jQuery(formfield).val(fileurl);
            tb_remove();
        } else {
            window.original_send_to_editor(html);
        }
    };
 
});