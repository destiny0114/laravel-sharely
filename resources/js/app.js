import './bootstrap';
import '../css/app.css';

import Alpine from 'alpinejs';

const fileInputElement = document.getElementById("file-input");
const fileChosenElement = document.getElementById("file-chosen");
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

if (fileInputElement && fileChosenElement)
{
    const defauitLabelText = "No file selected";

    fileChosenElement.textContent = defauitLabelText;

    fileInputElement.addEventListener("change", input => {
        fileChosenElement.style.display = "block";
        fileChosenElement.textContent = input.target.files[0].name;
    });}

window.Alpine = Alpine;
Alpine.start();
