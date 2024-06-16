document.addEventListener('DOMContentLoaded', function () {
    console.log('Start admin');
    // Check if wp.media is available
    if (typeof wp === 'undefined' || typeof wp.media === 'undefined') {
        console.error('wp.media is not available');
        return;
    }

    // Handle image upload
    const buttons = document.querySelectorAll('.upload_images_button');

    buttons.forEach((button) => {
        const targetInputId = button.getAttribute('data-target');
        const inputField = document.querySelector(targetInputId);
        const previewContainerId =
            'menu-item-image-previews-' + inputField.id.split('-').pop();
        const previewContainer = document.getElementById(previewContainerId);

        previewContainer &&
            updateRemoveButtonsHandler(previewContainer, inputField);

        button.addEventListener('click', function (event) {
            event.preventDefault();
            console.log('Clikk for picture');
            if (!previewContainer) {
                console.error(
                    `Preview container with id ${previewContainerId} not found.`
                );
                return;
            }
            if (!inputField) {
                console.error(
                    `Input field with id ${targetInputId} not found.`
                );
                return;
            }

            const customUploader = wp
                .media({
                    title: 'Select Images',
                    button: { text: 'Use these images' },
                    multiple: true,
                })
                .on('select', function () {
                    const attachments = customUploader
                        .state()
                        .get('selection')
                        .map((attachment) => attachment.toJSON());

                    const imageIds = attachments.map(
                        (attachment) => attachment.id
                    );

                    const existingIds = inputField.value
                        ? JSON.parse(inputField.value)
                        : [];
                    const allIds = existingIds.concat(imageIds);

                    inputField.value = JSON.stringify(allIds);
                    previewContainer.innerHTML = ''; // Clear previous images
                    allIds.forEach((id) => {
                        const imgDiv = document.createElement('div');
                        imgDiv.classList.add('menu-item-image-preview');
                        const wrapperDiv = document.createElement('div');
                        wrapperDiv.classList.add(
                            'menu-item-image-preview-wrapper'
                        );

                        const img = document.createElement('img');
                        img.src = wp.media.attachment(id).get('url'); // Fetch the URL using the attachment ID

                        const removeButton = document.createElement('button');
                        removeButton.classList.add(
                            'button',
                            'remove_image_button'
                        );
                        removeButton.textContent = 'X';
                        removeButton.setAttribute('data-image-id', id);

                        removeButton.addEventListener('click', function (e) {
                            e.preventDefault();
                            const idToRemove =
                                this.getAttribute('data-image-id');
                            const updatedIds = JSON.parse(
                                inputField.value
                            ).filter((imageId) => imageId != idToRemove);
                            inputField.value = JSON.stringify(updatedIds);
                            this.parentElement.remove();
                        });

                        imgDiv.appendChild(wrapperDiv);
                        wrapperDiv.appendChild(img);
                        wrapperDiv.appendChild(removeButton);
                        previewContainer.appendChild(imgDiv);
                    });

                    // Re-assign remove button events
                    updateRemoveButtonsHandler(previewContainer, inputField);
                })
                .open();
        });
    });

    function updateRemoveButtonsHandler(element, inputField) {
        const removeButtons = element.querySelectorAll('.remove_image_button');

        if (removeButtons.length > 0) {
            removeButtons.forEach((button) => {
                button.addEventListener('click', function (e) {
                    e.preventDefault();
                    const idToRemove = this.getAttribute('data-image-id');
                    const updatedIds = JSON.parse(inputField.value).filter(
                        (imageId) => imageId != idToRemove
                    );
                    inputField.value = JSON.stringify(updatedIds);
                    this.parentElement.remove();
                });
            });
        }
    }

    // Function to toggle custom fields based on depth and children
    function toggleCustomFields() {
        const menuItems = document.querySelectorAll('.menu-edit .menu-item');
        menuItems.forEach((item, index) => {
            const depth = parseInt(
                item?.className?.match(/menu-item-depth-(\d+)/)[1]
            );
            const hasChildren =
                index < menuItems.length - 1
                    ? menuItems[index + 1]?.className.includes(
                          'menu-item-depth-1'
                      )
                    : false;
            const customFields = item.querySelectorAll(
                '.field-custom, .my-admin-upload-button'
            );
            const customPictures = item.querySelector(
                '.menu-item-image-previews'
            );

            if (depth > 0 || !hasChildren) {
                if (customPictures) customPictures.style.display = 'none';
                customFields.length > 0 &&
                    customFields.forEach((field) => {
                        field.style.display = 'none';
                    });
            } else {
                if (customPictures) customPictures.style.display = 'flex';
                customFields.length > 0 &&
                    customFields.forEach((field) => {
                        field.style.display = 'block';
                    });
            }
        });
    }

    // Initial check
    toggleCustomFields();

    // Observe changes to the menu structure
    const menuContainer = document.querySelector('.menu-edit');
    if (menuContainer) {
        const observer = new MutationObserver(() => {
            toggleCustomFields();
        });

        observer.observe(menuContainer, {
            childList: true,
            subtree: true,
            attributes: true,
            attributeFilter: ['class'],
        });
    } else {
        console.error('.menu-edit not found.');
    }
});
