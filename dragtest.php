<div style='color:red'><b>ddddd</b></div>
<?php echo strip_tags("<div style='color:red'><b>ddddd</b></div>"); ?><!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://code.jquery.com/jquery-3.1.1.js" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA=" crossorigin="anonymous"></script>
	<style type="text/css">
		#drag{
    width:300px;
    height:100px;
    line-height:100px;
    border:5px dashed #CCC;

    font-family:Verdana;
    text-align:center;
}

	</style>
<body>

<div id="div">Drop here</div>
<div id="uploadPreview"></div>

</body>
</html>
<script type="text/javascript">
$('#div').on(
    'dragover',
    function(e) {
        e.preventDefault();
        e.stopPropagation();
    }
)
$('#div').on(
    'dragenter',
    function(e) {
        e.preventDefault();
        e.stopPropagation();
    }
)
$('#div').on(
    'drop',
    function(e){
        if(e.originalEvent.dataTransfer){
            if(e.originalEvent.dataTransfer.files.length) {
                e.preventDefault();
                e.stopPropagation();
                /*UPLOAD FILES HERE*/
                 if (this.disabled) return alert('File upload not supported!');
            		var F = e.originalEvent.dataTransfer.files;
            		if (F && F[0]) for (var i = 0; i < F.length; i++) readImage(F[i]);

               // upload(e.originalEvent.dataTransfer.files);
            }
        }
    }
);


	function readImage(file) {

            var reader = new FileReader();
            var image = new Image();

            reader.readAsDataURL(file);
            reader.onload = function(_file) {
                image.src = _file.target.result;              // url.createObjectURL(file);
                image.onload = function() {
                    var w = this.width,
                h = this.height,
                t = file.type,                           // ext only: // file.type.split('/')[1],
                n = file.name,
                s = ~ ~(file.size / 1024) + 'KB';
                    $('#uploadPreview').append('<img src="' + this.src + '"> ' + w + 'x' + h + ' ' + s + ' ' + t + ' ' + n + '<br>');
                };
                image.onerror = function() {
                    alert('Invalid file type: ' + file.type);
                };
            };

         }
        $("#choose").change(function(e) {
            if (this.disabled) return alert('File upload not supported!');
            var F = this.files;
            if (F && F[0]) for (var i = 0; i < F.length; i++) readImage(F[i]);
        });
</script>
