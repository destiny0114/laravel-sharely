@props(["avatar" => "/images/default_avatar.png"])

<div class="w-24 h-24 relative {{ $attributes }}">
    <div class="w-full h-full overflow-hidden rounded-full">
        <img class="w-full h-full object-fill" id="image-preview" src="{{ $avatar }}" alt="avatar">
    </div>

    <div class="absolute top-16 -right-4 p-1 z-10 bg-gray-200 rounded-full shadow-lg hover:bg-gray-300 transition ease-in-out duration-150">
        <label for="file-input" class="cursor-pointer">
            <svg
                style="width: 1.5rem; height: 1.5rem;vertical-align: middle;fill: currentColor;overflow: hidden;"
                viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M347.6 699c1.6 0 3.2-0.2 4.8-0.4L486.9 675c1.6-0.3 3.1-1 4.2-2.2l339.1-339.1c3.1-3.1 3.1-8.2 0-11.3l-133-133c-1.5-1.5-3.5-2.3-5.7-2.3s-4.2 0.8-5.7 2.3l-339 339c-1.2 1.2-1.9 2.6-2.2 4.2L321 667.2c-1.5 8.9 1.2 17.5 7.5 23.8 5.3 5.2 11.9 8 19.1 8z m53.9-139.5l290.2-290.1 58.6 58.6-290.2 290.1-71.1 12.6 12.5-71.2zM739 827H284c-19.9 0-36-16.1-36-36s16.1-36 36-36h455c19.9 0 36 16.1 36 36s-16.1 36-36 36z"/>
            </svg>
        </label>
        <input id="file-input" name="avatar" type="file" class="hidden"/>
    </div>
</div>


