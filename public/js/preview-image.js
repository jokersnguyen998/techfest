/**
 * Preview image before upload
 */
 function readURL(input, targetTag) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            targetTag.attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    } else {
        targetTag.attr('src', '');
        targetTag.css('display', 'none');
    }
}