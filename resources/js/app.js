import './bootstrap';
import '../css/app.css';

import Alpine from 'alpinejs';

const fileInputElement = document.getElementById("file-input");
const imagePreviewElement = document.getElementById("image-preview");

const reader = new FileReader();

if (fileInputElement && imagePreviewElement)
{
    reader.onload = e => {
        imagePreviewElement.src = e.target.result;
    }

    fileInputElement.addEventListener("change", input => {
        let file = input.target.files[0];
        return reader.readAsDataURL(file);
    });
}

window.Alpine = Alpine;
Alpine.start();
