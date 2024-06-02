window.addEventListener('DOMContentLoaded', function() {
    const imageURL = document.getElementById('img-view').getAttribute('data-image-url');
    document.getElementById('img-view').style.backgroundImage = 'url("' + imageURL + '")';
});

        let dropArea = document.getElementById('drop-area');
        let inputFile = document.getElementById('file');
        let imageView = document.getElementById('img-view');
        inputFile.addEventListener('change',uploadImage);
        function uploadImage(){
                const file = inputFile.files[0];
                if(file.type.startsWith('image/')){
                    try{
                        let imgLink= URL.createObjectURL( inputFile.files[0]);
                        imageView.style.backgroundImage="url("+imgLink+")";
                        imageView.textContent="";
                        imageView.style.border=0;
                        console.log('entre aqui');
                    } catch (error) {
                        console.error('Error al crear el objeto de URL:', error);
                    
                    }
                    
                }else{
                    let img=document.getElementById('short-image');
                    img.src="./img/delete.svg";      
                    document.getElementById('p-file').innerText="Only image formatting is allowed, try again";
        
                }
        }

        dropArea.addEventListener("dragover",function(e){
            e.preventDefault();
        });
        dropArea.addEventListener("drop",function(e){
            e.preventDefault();
            inputFile.files= e.dataTransfer.files;
            uploadImage();
        });


