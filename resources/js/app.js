import './bootstrap';
function browseImage() {
    document.getElementById('fileInput').click();
}

document.getElementById('fileInput').addEventListener('change', function() {
    document.getElementById('imageUploadForm').submit();
});