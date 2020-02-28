<script src="{{ mix('js/vapor/app.js') }}" ></script>

Welcome to Vapor JS



    <input type="file" id="file" ref="file">
    <button onclick="uploadToS3()" type="button">Upload</button>

<script>
    function uploadToS3() {
        Vapor.store(document.getElementById('file'), {
            progress: progress => {
                this.uploadProgress = Math.round(progress * 100);
            }
        }).then(response => {
            let firstFile = document.getElementById('file').files[0];

            console.log({
                uuid: response.uuid,
                key: response.key,
                bucket: response.bucket,
                name: firstFile.name,
                content_type: firstFile.type,
            });
        }).catch(error => console.error(error));
    }
</script>
