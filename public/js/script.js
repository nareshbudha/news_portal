function previewFeaturedImage(event) {
    const input = event.target;
    const featuredImagePreviewContainer = document.getElementById(
        "featuredImagePreviewContainer"
    );
    const featuredImagePreview = document.getElementById(
        "featuredImagePreview"
    );

    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function (e) {
            featuredImagePreview.src = e.target.result;
            featuredImagePreview.style.display = "block";
            featuredImagePreviewContainer.style.display = "block";
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function removeFeaturedImage() {
    const featuredImagePreview = document.getElementById(
        "featuredImagePreview"
    );
    featuredImagePreview.src = "";
    featuredImagePreview.style.display = "none";
    document.getElementById("featuredImagePreviewContainer").style.display =
        "none";
    document.getElementById("featured_image").value = "";
}

function previewLogoImage(event) {
    const input = event.target;
    const logoImagePreviewContainer = document.getElementById(
        "logoImagePreviewContainer"
    );
    const logoImagePreview = document.getElementById("logoImagePreview");

    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function (e) {
            logoImagePreview.src = e.target.result;
            logoImagePreview.style.display = "block";
            logoImagePreviewContainer.style.display = "block";
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function removeLogoImage() {
    const logoImagePreview = document.getElementById("logoImagePreview");
    logoImagePreview.src = "";
    logoImagePreview.style.display = "none";
    document.getElementById("logoImagePreviewContainer").style.display = "none";
    document.getElementById("logo").value = "";
}

function previewImage(event) {
    const input = event.target;
    const ImagePreviewContainer = document.getElementById(
        "ImagePreviewContainer"
    );
    const ImagePreview = document.getElementById("ImagePreview");

    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function (e) {
            ImagePreview.src = e.target.result;
            ImagePreview.style.display = "block";
            ImagePreviewContainer.style.display = "block";
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function removeImage() {
    const ImagePreview = document.getElementById("ImagePreview");
    ImagePreview.src = "";
    ImagePreview.style.display = "none";
    document.getElementById("ImagePreviewContainer").style.display = "none";
    document.getElementById("logo").value = "";
}

function previewImage1(event) {
    const input = event.target;
    const Image1PreviewContainer = document.getElementById(
        "Image1PreviewContainer"
    );
    const Image1Preview = document.getElementById("Image1Preview");
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function (e) {
            Image1Preview.src = e.target.result;
            Image1Preview.style.display = "block";
            Image1PreviewContainer.style.display = "block";
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function removeImage() {
    const Image1Preview = document.getElementById("Image1Preview");
    Image1Preview.src = "";
    Image1Preview.style.display = "none";
    document.getElementById("Image1PreviewContainer").style.display = "none";
    document.getElementById("logo").value = "";
}
let imagesArray = [];

function previewImages(event) {
    const input = event.target;
    const imagePreviewContainer = document.getElementById(
        "imagePreviewContainer"
    );
    imagePreviewContainer.innerHTML = "";

    imagesArray = [];

    if (input.files) {
        Array.from(input.files).forEach((file, index) => {
            const reader = new FileReader();
            reader.onload = function (e) {
                const imageWrapper = document.createElement("div");
                imageWrapper.classList.add("relative", "inline-block");

                const img = document.createElement("img");
                img.src = e.target.result;
                img.classList.add("rounded-md", "bg-gray-200", "p-1");
                img.width = 100;

                const removeButton = document.createElement("button");
                removeButton.classList.add(
                    "absolute",
                    "top-1",
                    "right-1",
                    "bg-red-500",
                    "text-white",
                    "rounded-full",
                    "p-1"
                );
                removeButton.innerHTML = "&#10006;";
                removeButton.onclick = function () {
                    removeImage(index);
                };

                imageWrapper.appendChild(img);
                imageWrapper.appendChild(removeButton);
                imagePreviewContainer.appendChild(imageWrapper);
            };
            reader.readAsDataURL(file);

            imagesArray.push(file);
        });
    }
}

function removeImage(index) {
    imagesArray.splice(index, 1);
    const imagePreviewContainer = document.getElementById(
        "imagePreviewContainer"
    );
    imagePreviewContainer.innerHTML = "";

    imagesArray.forEach((file, i) => {
        const reader = new FileReader();
        reader.onload = function (e) {
            const imageWrapper = document.createElement("div");
            imageWrapper.classList.add("relative", "inline-block");

            const img = document.createElement("img");
            img.src = e.target.result;
            img.classList.add("rounded-md", "bg-gray-200", "p-1");
            img.width = 100;

            const removeButton = document.createElement("button");
            removeButton.classList.add(
                "absolute",
                "top-1",
                "right-1",
                "bg-red-500",
                "text-white",
                "rounded-full",
                "p-1"
            );
            removeButton.innerHTML = "&#10006;";
            removeButton.onclick = function () {
                removeImage(i);
            };

            imageWrapper.appendChild(img);
            imageWrapper.appendChild(removeButton);
            imagePreviewContainer.appendChild(imageWrapper);
        };
        reader.readAsDataURL(file);
    });
}

document.querySelector("form").onsubmit = function (event) {
    const formData = new FormData(this);

    imagesArray.forEach((file) => {
        formData.append(`images[]`, file);
    });
};
